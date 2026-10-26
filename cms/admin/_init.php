<?php
/* Inisialisasi bersama semua halaman admin */
require_once dirname(__DIR__) . '/bootstrap.php';
require_once dirname(__DIR__) . '/admin_lib.php';
require_once __DIR__ . '/_layout.php';

cms_session();
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: same-origin');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');

/* Teks form dikirim terenkode base64 oleh browser (awalan "~b64~") supaya firewall hosting
   (ModSecurity/WAF) tidak salah mengira tanda kutip/HTML sebagai serangan. Di sini dikembalikan. */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dec = function (&$v) use (&$dec) {
        if (is_array($v)) { foreach ($v as &$x) $dec($x); unset($x); return; }
        if (is_string($v) && strncmp($v, '~b64~', 5) === 0) {
            $d = base64_decode(substr($v, 5), true);
            if ($d !== false) $v = $d;
        }
    };
    $dec($_POST);
}

if (!defined('CMS_PUBLIC')) require_login();

/* Unggahan gambar dikirim browser sebagai base64 di dalam POST biasa (urlencoded), karena sebagian hosting
   (mis. InfinityFree) memblokir POST multipart/form-data. Di sini dikembalikan menjadi entri $_FILES. */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !defined('CMS_PUBLIC')) {
    foreach (array_keys($_POST) as $k) {
        if (!is_string($k) || substr($k, -5) !== '__b64' || !is_string($_POST[$k])) continue;
        $base = substr($k, 0, -5);                       // mis. "banner__file"
        $b64  = $_POST[$k];
        unset($_POST[$k], $_POST[$base . '__fname'], $_POST[$base]);
        if ($b64 === '') continue;
        if (strlen($b64) > (int)(MAX_UPLOAD * 1.4) + 16) { $_FILES[$base] = ['name' => '', 'tmp_name' => '', 'error' => UPLOAD_ERR_FORM_SIZE, 'size' => 0]; continue; }
        $bin = base64_decode($b64, true);
        if ($bin === false || $bin === '') continue;
        $tmp = @tempnam(sys_get_temp_dir(), 'cmsup') ?: @tempnam(dirname(DB_PATH), 'cmsup');
        if ($tmp === false || file_put_contents($tmp, $bin) === false) continue;
        register_shutdown_function(function () use ($tmp) { if (is_file($tmp)) @unlink($tmp); });
        $_FILES[$base] = ['name' => 'upload', 'type' => '', 'tmp_name' => $tmp, 'error' => UPLOAD_ERR_OK, 'size' => strlen($bin), 'b64' => true];
    }
}
