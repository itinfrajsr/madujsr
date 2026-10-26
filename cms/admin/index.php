<?php
require __DIR__ . '/_init.php';
require_once dirname(__DIR__) . '/seed.php';

/* Pemulihan harus dijalankan SEBELUM database dibuka (db()) pada request ini. */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['do'] ?? '') === 'restore') {
    csrf_check();
    $name = (string)($_POST['name'] ?? '');
    $src  = cms_backup_dir() . '/' . $name;
    $err  = '';
    if (!preg_match('/^(cms|pre-restore)-[0-9]{8}(-[0-9]{6})?\.sqlite$/', $name) || !is_file($src)) $err = 'File cadangan tidak ditemukan.';
    elseif (($chk = cms_db_check($src)) !== null) $err = 'Cadangan tidak dapat dipakai: ' . $chk;
    else {
        $uname = (string)($_SESSION['uname'] ?? '');
        try { cms_db_restore_file($src); } catch (Throwable $ex) { $err = $ex->getMessage(); }
    }
    if ($err !== '') { flash('error', $err); redirect(aurl('index')); }
    // tetap masuk bila akun yang sama ada di cadangan; jika tidak, minta login ulang
    $st = db()->prepare('SELECT id FROM users WHERE username = ?');
    $st->execute([$uname]);
    $uid = $st->fetchColumn();
    if ($uid) {
        $_SESSION['uid'] = (int)$uid;
        flash('ok', 'Data dipulihkan dari ' . $name . '. Kondisi sebelumnya disimpan sebagai pre-restore-*.sqlite.');
        redirect(aurl('index'));
    }
    $_SESSION = [];
    session_destroy();
    redirect(aurl('login'));
}

$pdo  = db();
$ents = cms_entities();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['do'] ?? '') === 'backup') {
    csrf_check();
    $f = cms_backup_to(cms_backup_dir() . '/cms-' . date('Ymd-His') . '.sqlite');
    flash($f ? 'ok' : 'error', $f ? 'Cadangan dibuat: ' . basename($f) : 'Gagal membuat cadangan (folder data/backup tidak dapat ditulis).');
    redirect(aurl('index'));
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['do'] ?? '') === 'dismiss_restore') {
    csrf_check();
    $pdo->prepare("DELETE FROM meta WHERE k = 'auto_restored'")->execute();
    redirect(aurl('index'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['do'] ?? '') === 'seed') {
    csrf_check();
    $pdo->exec('BEGIN IMMEDIATE');
    try { $filled = cms_seed($pdo); $pdo->exec('COMMIT'); }
    catch (Throwable $ex) { $pdo->exec('ROLLBACK'); throw $ex; }
    flash('ok', $filled ? 'Data bawaan diisi untuk: ' . implode(', ', $filled) . '.' : 'Tidak ada tabel kosong. Tidak ada yang diubah.');
    redirect(aurl('index'));
}

admin_header('Dashboard', 'dashboard');
?>
<h1>Dashboard</h1>
<p class="sub">Halo, <?= e($_SESSION['uname'] ?? 'admin') ?>. Kelola seluruh konten situs dari sini.</p>

<div class="grid" style="margin-bottom:22px">
<?php foreach ($ents as $k => $ent):
    $n = (int)$pdo->query('SELECT COUNT(*) FROM ' . $ent['table'])->fetchColumn(); ?>
    <a class="stat" href="<?= e(aurl('crud', '?e=' . $k)) ?>"><b><?= $n ?></b><?= e($ent['label']) ?></a>
<?php endforeach; ?>
    <a class="stat" href="<?= e(aurl('settings')) ?>"><b>⚙</b>Pengaturan Situs</a>
</div>

<div class="card">
    <h3 style="margin-top:0">Tips singkat</h3>
    <ul style="margin:0;padding-left:20px;line-height:1.8">
        <li><b>Produk</b>: ubah teks, gambar, link beli, dan urutan. Produk baru otomatis muncul di carousel, footer, dan halaman detailnya.</li>
        <li><b>Nonaktifkan</b> item (bukan menghapus) untuk menyembunyikannya sementara dari situs.</li>
        <li><b>Pengaturan Situs</b>: nomor WhatsApp, email, sosial media, teks hero, footer.</li>
        <li>Semua teks tersedia dalam <b>ID</b> dan <b>EN</b>. Jika kolom EN kosong, teks ID dipakai.</li>
    </ul>
</div>

<?php
$norm = function ($p) { return str_replace('\\', '/', $p); };
$rel  = ltrim(substr($norm(DB_PATH), strlen($norm(SITE_ROOT))), '/');
$bks  = cms_list_backups();
$auto = meta_get($pdo, 'auto_restored');
?>
<?php if ($auto): ?>
<div class="alert alert-info">
    <b>Database sempat hilang dan dipulihkan otomatis</b> dari cadangan: <code><?= e($auto) ?></code>.
    Perubahan yang dibuat setelah cadangan itu mungkin tidak ada; periksa data Anda.
    <form method="post" class="inl" style="margin-left:8px"><?= csrf_field() ?><input type="hidden" name="do" value="dismiss_restore"><button class="btn ghost sm" type="submit">Sembunyikan</button></form>
</div>
<?php endif; ?>
<div class="card">
    <h3 style="margin-top:0">Data &amp; cadangan</h3>
    <p class="muted" style="margin-top:0">Database: <code><?= e($rel) ?></code> &middot; <?= number_format((int)@filesize(DB_PATH) / 1024, 0, ',', '.') ?> KB &middot; terakhir berubah <?= e(date('d M Y H:i', (int)@filemtime(DB_PATH))) ?>.
        Cadangan otomatis dibuat setiap hari saat Anda login. <b>Cadangan hanya berisi database</b>, bukan file gambar di folder <code>uploads/</code>.</p>
    <form method="post" style="margin-bottom:14px"><?= csrf_field() ?><input type="hidden" name="do" value="backup"><button class="btn ghost" type="submit">Buat cadangan sekarang</button></form>
    <?php if (!$bks): ?>
        <p class="muted" style="margin:0">Belum ada cadangan.</p>
    <?php else: ?>
    <table>
        <thead><tr><th>Cadangan</th><th>Dibuat</th><th>Ukuran</th><th></th></tr></thead>
        <tbody>
        <?php foreach (array_slice($bks, 0, 10) as $b): ?>
            <tr>
                <td><code><?= e($b['name']) ?></code></td>
                <td><?= e(date('d M Y H:i', $b['mtime'])) ?></td>
                <td><?= number_format($b['size'] / 1024, 0, ',', '.') ?> KB</td>
                <td class="act">
                    <form class="inl" method="post" data-confirm="Pulihkan data dari cadangan ini? Data saat ini akan diganti (kondisi sekarang otomatis disimpan sebagai pre-restore).">
                        <?= csrf_field() ?><input type="hidden" name="do" value="restore"><input type="hidden" name="name" value="<?= e($b['name']) ?>">
                        <button class="btn ghost sm" type="submit">Pulihkan</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<div class="card">
    <h3 style="margin-top:0">Pulihkan data bawaan</h3>
    <p class="muted" style="margin-top:0">Mengisi kembali konten asli situs <b>hanya untuk tabel yang kosong</b> (data yang sudah ada tidak disentuh).</p>
    <form method="post" data-confirm="Isi ulang data bawaan untuk tabel yang kosong?">
        <?= csrf_field() ?><input type="hidden" name="do" value="seed">
        <button class="btn ghost" type="submit">Isi data bawaan</button>
    </form>
</div>
<?php admin_footer();
