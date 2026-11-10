<?php
/* Status CS (online/offline) untuk polling dari halaman depan. Tanpa cache. */
require __DIR__ . '/cms/bootstrap.php';
$s = cms_wa_state();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('X-Robots-Tag: noindex');
echo json_encode([
    'mode'   => $s['mode'],
    'online' => (bool)$s['online'],
    'label'  => $s['label'],
], JSON_UNESCAPED_UNICODE);
