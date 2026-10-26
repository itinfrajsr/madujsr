<?php
/* =========================================================
   KONFIGURASI DASAR CMS
   Untuk mengubah nilai tanpa menyentuh file ini, buat
   cms/config.local.php dan definisikan konstanta di sana.
========================================================= */
if (is_file(__DIR__ . '/config.local.php')) require __DIR__ . '/config.local.php';

defined('CMS_ROOT')   || define('CMS_ROOT', __DIR__);
defined('SITE_ROOT')  || define('SITE_ROOT', dirname(__DIR__));

// Lokasi database SQLite: <situs>/data/cms.sqlite (di luar folder cms/ dan assets/, supaya
// TIDAK ikut tertimpa saat Anda memperbarui file CMS dari ZIP).
// Jika database lama masih di cms/storage/, otomatis disalin ke lokasi baru (sekali saja).
if (!defined('DB_PATH')) {
    $__new = SITE_ROOT . '/data/cms.sqlite';
    $__old = CMS_ROOT . '/storage/cms.sqlite';
    if (!is_file($__new) && is_file($__old)) {
        if (!is_dir(dirname($__new))) @mkdir(dirname($__new), 0755, true);
        if (@copy($__old, $__new)) {
            @rename($__old, $__old . '.migrated');          // jangan biarkan salinan basi yang bisa "hidup" lagi
        } else {
            $__new = $__old;                                // gagal menyalin: tetap pakai lokasi lama
        }
    }
    define('DB_PATH', $__new);
    unset($__new, $__old);
}

// Folder & URL relatif unggahan gambar baru (relatif terhadap index.php).
// Gambar lama di assets/img/uploads/ tetap tampil karena path-nya tersimpan di database.
defined('UPLOAD_DIR') || define('UPLOAD_DIR', SITE_ROOT . '/uploads');
defined('UPLOAD_URL') || define('UPLOAD_URL', 'uploads');
defined('MAX_UPLOAD') || define('MAX_UPLOAD', 5 * 1024 * 1024); // 5 MB

// URL admin tanpa ekstensi (/cms/admin/login, bukan login.php). Butuh Apache mod_rewrite
// (sudah ada di Laragon/XAMPP) atau aturan Nginx di README. Set false bila tidak didukung.
defined('CLEAN_URLS') || define('CLEAN_URLS', true);

date_default_timezone_set('Asia/Jakarta');
