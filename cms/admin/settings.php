<?php
require __DIR__ . '/_init.php';

$pdo    = db();
$schema = cms_settings_schema();

// kumpulkan semua field + grup menjadi daftar datar
$fields = [];
foreach ($schema as $group => $list) {
    foreach ($list as $i => $f) {
        if ($i === 0) $f['group'] = $group;
        $fields[] = $f;
    }
}

$values = [];
foreach ($fields as $f) $values[$f['name']] = setting($f['name'], '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    [$data, $errors] = cms_collect_fields($fields, $_POST, $_FILES, $values);
    if (!$errors) {
        $pdo->exec('BEGIN');
        $st = $pdo->prepare('INSERT OR REPLACE INTO settings (k, v) VALUES (?, ?)');
        foreach ($data as $k => $v) $st->execute([$k, (string)$v]);
        $pdo->exec('COMMIT');
        flash('ok', 'Pengaturan disimpan.');
        redirect(aurl('settings'));
    }
    foreach ($errors as $m) flash('error', $m);
    $values = array_merge($values, $data);
}

admin_header('Pengaturan Situs', 'settings');
?>
<h1>Pengaturan Situs</h1>
<p class="sub">Kontak, teks hero, footer, dan pengaturan umum lainnya.</p>
<form method="post" enctype="multipart/form-data" class="card" autocomplete="off">
    <?= csrf_field() ?>
    <?= cms_render_fields($fields, $values, true) ?>
    <div class="formbar"><button class="btn" type="submit">Simpan pengaturan</button></div>
</form>
<?php admin_footer();
