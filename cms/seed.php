<?php
/* =========================================================
   DATA BAWAAN — konten situs sebelum CMS (dari seed/seed_data.json)
   Dijalankan otomatis sekali saat database pertama dibuat, dan
   bisa dijalankan ulang dari Dashboard (hanya mengisi yang kosong).
========================================================= */
function cms_insert_row(PDO $pdo, array $ent, array $row, int $sort): void
{
    $cols = ['sort', 'active'];
    $vals = [$sort, 1];
    foreach ($ent['fields'] as $f) {
        if (!empty($f['virtual'])) continue;
        $cols[] = $f['name'];
        $v = $row[$f['name']] ?? ($f['default'] ?? ($f['type'] === 'number' || $f['type'] === 'bool' ? 0 : ''));
        $vals[] = $v;
    }
    $sql = 'INSERT INTO ' . $ent['table'] . ' (' . implode(',', $cols) . ') VALUES (' . implode(',', array_fill(0, count($cols), '?')) . ')';
    $pdo->prepare($sql)->execute($vals);
}

function cms_seed_pages(): array
{
    return [
        [
            'slug' => 'tentang-kami', 'title_id' => 'Tentang Kami', 'title_en' => 'About Us',
            'banner' => 'assets/img/tentang_kami.jpeg',
            'body_id' => '', 'body_en' => '',   // diisi dari seed_data.json
        ],
        [
            'slug' => 'cara-pemesanan', 'title_id' => 'Cara Pemesanan', 'title_en' => 'How to Order',
            'banner' => 'assets/img/cara_pemesanan.jpg',
            'side_image' => 'assets/img/cara-pemesanan-hp.webp',
            'body_id' => "<ol>\n<li>Pilih varian madu yang diinginkan.</li>\n<li>Klik tombol <strong>Beli di JSR Store</strong>.</li>\n<li>Lakukan pembayaran sesuai instruksi.</li>\n<li>Pesanan dikirim ke alamat Anda.</li>\n</ol>",
            'body_en' => "<ol>\n<li>Choose the honey variant you want.</li>\n<li>Click the <strong>Buy at JSR Store</strong> button.</li>\n<li>Make the payment according to the instructions.</li>\n<li>Your order will be shipped to your address.</li>\n</ol>",
        ],
        [
            'slug' => 'hubungi-kami', 'title_id' => 'Hubungi Kami', 'title_en' => 'Contact Us',
            'banner' => '',
            'body_id' => "<p>WhatsApp: <a href=\"{wa_url}\" target=\"_blank\">Klik di sini</a></p>\n<p>Email: <a href=\"mailto:{email}\">{email}</a></p>",
            'body_en' => "<p>WhatsApp: <a href=\"{wa_url}\" target=\"_blank\">Click here</a></p>\n<p>Email: <a href=\"mailto:{email}\">{email}</a></p>",
        ],
    ];
}

/** Isi tabel yang masih kosong. Mengembalikan daftar tabel yang diisi. */
function cms_seed(PDO $pdo): array
{
    $file = __DIR__ . '/seed/seed_data.json';
    $seed = is_file($file) ? json_decode(file_get_contents($file), true) : [];
    if (!is_array($seed)) $seed = [];
    $ents = cms_entities();
    $filled = [];

    // pengaturan: tambahkan kunci yang belum ada
    $ins = $pdo->prepare('INSERT OR IGNORE INTO settings (k, v) VALUES (?, ?)');
    foreach (cms_settings_defaults() as $k => $v) $ins->execute([$k, $v]);

    // halaman info
    $pages = cms_seed_pages();
    foreach ($pages as &$p) {
        if ($p['slug'] === 'tentang-kami') {
            $p['body_id'] = '<p>' . htmlspecialchars($seed['about_id'] ?? '', ENT_QUOTES, 'UTF-8') . '</p>';
            $p['body_en'] = '<p>' . htmlspecialchars($seed['about_en'] ?? '', ENT_QUOTES, 'UTF-8') . '</p>';
        }
    }
    unset($p);
    $seed['pages'] = $pages;

    foreach ($ents as $key => $ent) {
        $count = (int)$pdo->query('SELECT COUNT(*) FROM ' . $ent['table'])->fetchColumn();
        if ($count > 0 || empty($seed[$key])) continue;
        foreach ($seed[$key] as $i => $row) cms_insert_row($pdo, $ent, $row, $i + 1);
        $filled[] = $ent['label'];
    }
    return $filled;
}
