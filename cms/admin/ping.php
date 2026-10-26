<?php
/* Penanda aktivitas: dipanggil timer di browser agar sesi tidak dianggap tidak aktif. */
require __DIR__ . '/_init.php';          // require_login() menolak/mengalihkan bila sesi sudah berakhir
header('Content-Type: application/json; charset=utf-8');
echo '{"ok":true}';
