<?php
/* =========================================================
   CADANGAN & PEMULIHAN DATABASE
   Semua cadangan disimpan di <folder database>/backup/
========================================================= */
function cms_backup_dir(): string { return dirname(DB_PATH) . '/backup'; }

/** Cek apakah $file adalah database CMS yang sehat. Mengembalikan null bila OK, atau pesan error. */
function cms_db_check(string $file): ?string
{
    if (!is_file($file) || filesize($file) < 1024) return 'File kosong atau bukan database.';
    $h = @fopen($file, 'rb');
    $magic = $h ? (string)fread($h, 16) : '';
    if ($h) fclose($h);
    if (strncmp($magic, "SQLite format 3\0", 16) !== 0) return 'Bukan file database SQLite.';
    try {
        $p = new PDO('sqlite:' . $file);
        $p->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $names = $p->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
        foreach (['products', 'settings', 'users', 'pages', 'testimonials', 'faqs'] as $t) {
            if (!in_array($t, $names, true)) { $p = null; return "Tabel '$t' tidak ada: ini bukan database CMS Madu JSR."; }
        }
        $ic = $p->query('PRAGMA integrity_check')->fetchColumn();
        $p = null;
        if ($ic !== 'ok') return 'Database rusak (integrity check gagal).';
    } catch (Throwable $e) {
        return 'File database tidak dapat dibaca.';
    }
    return null;
}

/** Daftar file cadangan, terbaru dulu: [['name','size','mtime'], ...] */
function cms_list_backups(): array
{
    $out = [];
    foreach (glob(cms_backup_dir() . '/*.sqlite') ?: [] as $f) {
        $out[] = ['name' => basename($f), 'size' => (int)filesize($f), 'mtime' => (int)filemtime($f)];
    }
    usort($out, function ($a, $b) { return $b['mtime'] <=> $a['mtime'] ?: strcmp($b['name'], $a['name']); });
    return $out;
}

/** Buat cadangan konsisten dari database yang sedang dipakai. Mengembalikan path file atau null. */
function cms_backup_to(string $file): ?string
{
    $dir = dirname($file);
    if (!is_dir($dir) && !@mkdir($dir, 0755, true)) return null;
    if (is_file($file)) @unlink($file);
    try {
        db()->exec("VACUUM INTO '" . str_replace("'", "''", $file) . "'");
    } catch (Throwable $e) {
        if (!@copy(DB_PATH, $file)) return null;
    }
    return is_file($file) ? $file : null;
}

// Cadangan harian otomatis (disimpan 14 hari terakhir)
function cms_backup_db(): void
{
    $dir = cms_backup_dir();
    $f = $dir . '/cms-' . date('Ymd') . '.sqlite';
    if (is_file($f)) return;
    if (!cms_backup_to($f)) return;
    $all = glob($dir . '/cms-*.sqlite') ?: [];
    sort($all);
    foreach (array_slice($all, 0, max(0, count($all) - 14)) as $old) @unlink($old);
}

/** Ganti database aktif dengan $src. Database sekarang diamankan dulu sebagai pre-restore-*.sqlite.
    PENTING: panggil sebelum db() dibuka pada request ini (Windows mengunci file yang terbuka). */
function cms_db_restore_file(string $src): void
{
    $dir = cms_backup_dir();
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    if (is_file(DB_PATH)) @copy(DB_PATH, $dir . '/pre-restore-' . date('Ymd-His') . '.sqlite');
    $tmp = DB_PATH . '.restore.tmp';
    if (!@copy($src, $tmp)) throw new RuntimeException('Gagal menyalin file cadangan.');
    if (!@rename($tmp, DB_PATH)) {
        if (!@copy($tmp, DB_PATH)) { @unlink($tmp); throw new RuntimeException('Gagal mengganti database (file sedang dipakai?).'); }
        @unlink($tmp);
    }
}

/** Dipanggil saat file database TIDAK ada: pulihkan dari cadangan harian terbaru yang sehat.
    Mengembalikan nama file cadangan yang dipakai, atau null (tidak ada cadangan -> database baru). */
function cms_auto_restore(): ?string
{
    $c = glob(cms_backup_dir() . '/cms-*.sqlite') ?: [];
    rsort($c);
    foreach ($c as $f) {
        if (cms_db_check($f) === null) {
            if (@copy($f, DB_PATH)) return basename($f);
        }
    }
    return null;
}
