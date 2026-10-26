<?php
/* =========================================================
   DATABASE (SQLite via PDO) — tabel dibuat & disinkronkan
   otomatis dari cms/crud_config.php
========================================================= */
require_once __DIR__ . '/crud_config.php';
require_once __DIR__ . '/backup.php';

// Lindungi folder data dari akses langsung lewat web (Apache). Nginx: lihat README.
function cms_protect_dir(string $dir): void
{
    if (!is_file($dir . '/.htaccess')) {
        @file_put_contents($dir . '/.htaccess', "# Data CMS: tidak boleh diakses langsung\n<IfModule mod_authz_core.c>\n  Require all denied\n</IfModule>\n<IfModule !mod_authz_core.c>\n  Order allow,deny\n  Deny from all\n</IfModule>\n");
    }
    if (!is_file($dir . '/index.html')) @file_put_contents($dir . '/index.html', '<!doctype html><title>403</title>');
}

function db(): PDO
{
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    if (!extension_loaded('pdo_sqlite')) {
        http_response_code(500);
        exit('<!doctype html><meta charset="utf-8"><body style="font:16px/1.6 system-ui;max-width:640px;margin:8vh auto;padding:0 16px">'
           . '<h2>Ekstensi PHP <code>pdo_sqlite</code> belum aktif</h2>'
           . '<p>CMS memerlukan SQLite. Aktifkan <code>pdo_sqlite</code> dan <code>sqlite3</code> di php.ini, lalu restart server.</p>'
           . '<p><b>Laragon:</b> klik kanan ikon Laragon &rarr; PHP &rarr; Extensions &rarr; centang <code>pdo_sqlite</code> dan <code>sqlite3</code>. '
           . 'Atau di php.ini hapus tanda <code>;</code> pada <code>extension=pdo_sqlite</code> dan <code>extension=sqlite3</code>.</p>'
           . '<p>PHP yang dipakai: <code>' . htmlspecialchars(PHP_BINARY ?: PHP_VERSION, ENT_QUOTES) . '</code><br>php.ini: <code>' . htmlspecialchars((string)php_ini_loaded_file(), ENT_QUOTES) . '</code></p></body>');
    }
    $dir = dirname(DB_PATH);
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    cms_protect_dir($dir);

    // File database hilang (mis. folder terhapus saat update)? Pulihkan dari cadangan, jangan mulai dari nol.
    $restoredFrom = is_file(DB_PATH) ? null : cms_auto_restore();

    $pdo = new PDO('sqlite:' . DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA busy_timeout = 5000');

    cms_install($pdo);
    if ($restoredFrom) meta_set($pdo, 'auto_restored', $restoredFrom . ' @ ' . date('Y-m-d H:i'));
    return $pdo;
}

function meta_get(PDO $pdo, string $k): ?string
{
    $st = $pdo->prepare('SELECT v FROM meta WHERE k = ?');
    $st->execute([$k]);
    $v = $st->fetchColumn();
    return $v === false ? null : (string)$v;
}

function meta_set(PDO $pdo, string $k, string $v): void
{
    $pdo->prepare('INSERT OR REPLACE INTO meta (k, v) VALUES (?, ?)')->execute([$k, $v]);
}

function cms_install(PDO $pdo): void
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS meta (k TEXT PRIMARY KEY, v TEXT)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS settings (k TEXT PRIMARY KEY, v TEXT)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password_hash TEXT NOT NULL,
        created_at TEXT)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS auth_tokens (
        selector TEXT PRIMARY KEY, token_hash TEXT NOT NULL, user_id INTEGER NOT NULL, expires INTEGER NOT NULL)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS login_attempts (
        id INTEGER PRIMARY KEY AUTOINCREMENT, ip TEXT, ts INTEGER)');

    // Sinkronisasi skema bila definisi entitas berubah
    $entities = cms_entities();
    $sig = md5(json_encode($entities));
    if (meta_get($pdo, 'schema_sig') !== $sig) {
        foreach ($entities as $ent) {
            $t = $ent['table'];
            $pdo->exec("CREATE TABLE IF NOT EXISTS $t (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                sort INTEGER NOT NULL DEFAULT 0,
                active INTEGER NOT NULL DEFAULT 1)");
            $have = array_column($pdo->query("PRAGMA table_info($t)")->fetchAll(), 'name');
            foreach ($ent['fields'] as $f) {
                if (!empty($f['virtual'])) continue;
                $c = $f['name'];
                if (!preg_match('/^[a-z0-9_]+$/', $c)) throw new RuntimeException("Nama kolom tidak valid: $c");
                if (in_array($c, $have, true)) continue;
                $type = $f['type'] === 'number' ? 'REAL' : ($f['type'] === 'bool' ? 'INTEGER' : 'TEXT');
                $def  = $type === 'TEXT' ? "''" : '0';
                $pdo->exec("ALTER TABLE $t ADD COLUMN $c $type NOT NULL DEFAULT $def");
            }
        }
        meta_set($pdo, 'schema_sig', $sig);
    }

    // Migrasi satu kali: halaman Cara Pemesanan menjadi 2 kolom dengan gambar ponsel
    if (meta_get($pdo, 'm_cara_side_image') !== '1') {
        $pdo->prepare("UPDATE pages SET side_image = ? WHERE slug = 'cara-pemesanan' AND side_image = ''")
            ->execute(['assets/img/cara-pemesanan-hp.webp']);
        meta_set($pdo, 'm_cara_side_image', '1');
    }

    // Migrasi satu kali: isi Langkah Pemesanan (tabel baru) dengan 4 langkah bawaan
    if (meta_get($pdo, 'm_order_steps') !== '1') {
        if ((int)$pdo->query('SELECT COUNT(*) FROM order_steps')->fetchColumn() === 0) {
            $ins = $pdo->prepare('INSERT INTO order_steps (sort, active, icon, title_id, title_en, text_id, text_en) VALUES (?,?,?,?,?,?,?)');
            $def = [
                ['search', 'Pilih produk favorit Anda', 'Choose your favorite product', 'Temukan varian Madu JSR sesuai kebutuhan Anda.', 'Find the Madu JSR variant that suits your needs.'],
                ['cart', 'Masukkan ke keranjang', 'Add to cart', 'Tentukan jumlah produk dan periksa kembali pesanan.', 'Set the product quantity and review your order.'],
                ['pin', 'Lengkapi data pengiriman', 'Complete shipping details', 'Masukkan alamat lengkap dan pilih layanan pengiriman yang tersedia.', 'Enter your full address and select an available shipping service.'],
                ['card', 'Lakukan pembayaran', 'Make payment', 'Pilih metode pembayaran dan ikuti instruksi hingga selesai.', 'Choose a payment method and follow the instructions to completion.'],
            ];
            foreach ($def as $i => $d) $ins->execute([$i + 1, 1, $d[0], $d[1], $d[2], $d[3], $d[4]]);
        }
        meta_set($pdo, 'm_order_steps', '1');
    }

    // Isi data bawaan sekali saja (konten situs yang sekarang)
    if (meta_get($pdo, 'seeded') !== '1') {
        require_once __DIR__ . '/seed.php';
        $pdo->exec('BEGIN IMMEDIATE');
        try {
            if (meta_get($pdo, 'seeded') !== '1') {
                cms_seed($pdo);
                meta_set($pdo, 'seeded', '1');
            }
            $pdo->exec('COMMIT');
        } catch (Throwable $e) {
            $pdo->exec('ROLLBACK');
            throw $e;
        }
    }
}
