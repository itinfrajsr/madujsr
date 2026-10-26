<?php
require __DIR__ . '/_init.php';

$ents  = cms_entities();
$key   = (isset($_GET['e']) && isset($ents[$_GET['e']])) ? $_GET['e'] : 'products';
$ent   = $ents[$key];
$table = $ent['table'];
$pdo   = db();
$self  = aurl('crud', '?e=' . urlencode($key));

$mode   = ($_GET['a'] ?? 'list') === 'form' ? 'form' : 'list';
$editId = (int)($_GET['id'] ?? 0);
$row    = null;      // nilai yang ditampilkan di form
$errors = [];

function fetch_row(PDO $pdo, string $table, int $id): ?array
{
    $st = $pdo->prepare("SELECT * FROM $table WHERE id = ?");
    $st->execute([$id]);
    $r = $st->fetch();
    return $r ?: null;
}

/* ---------------------------------------------- AKSI POST */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $do = $_POST['do'] ?? '';
    $id = (int)($_POST['id'] ?? 0);

    if ($do === 'save') {
        $existing = $id ? fetch_row($pdo, $table, $id) : null;
        if ($id && !$existing) { flash('error', 'Data tidak ditemukan.'); redirect($self); }
        if (!$id && empty($ent['can_create'])) { flash('error', 'Penambahan data tidak diizinkan.'); redirect($self); }

        [$data, $errors] = cms_collect_fields($ent['fields'], $_POST, $_FILES, $existing, $pdo, $table, $id);
        $active = !empty($ent['has_active']) ? (isset($_POST['active']) ? 1 : 0) : 1;

        if (!$errors) {
            if ($existing) {
                $set = [];
                foreach ($data as $c => $v) $set[] = "$c = :$c";
                $set[] = 'active = :__active';
                $st = $pdo->prepare("UPDATE $table SET " . implode(', ', $set) . ' WHERE id = :__id');
                $params = [];
                foreach ($data as $c => $v) $params[':' . $c] = $v;
                $params[':__active'] = $active;
                $params[':__id'] = $id;
                $st->execute($params);
            } else {
                $sort = (int)$pdo->query("SELECT COALESCE(MAX(sort), 0) + 1 FROM $table")->fetchColumn();
                $cols = array_merge(array_keys($data), ['sort', 'active']);
                $vals = array_merge(array_values($data), [$sort, $active]);
                $st = $pdo->prepare("INSERT INTO $table (" . implode(',', $cols) . ') VALUES (' . implode(',', array_fill(0, count($cols), '?')) . ')');
                $st->execute($vals);
            }
            flash('ok', ucfirst($ent['singular']) . ' berhasil disimpan.');
            redirect($self);
        }

        // gagal validasi: tampilkan lagi form dengan nilai yang diketik
        $mode = 'form';
        $editId = $id;
        $row = array_merge($existing ?: [], $data, ['active' => $active]);
        foreach ($errors as $m) flash('error', $m);
    }
    elseif ($do === 'delete') {
        if (!empty($ent['can_delete'])) {
            $pdo->prepare("DELETE FROM $table WHERE id = ?")->execute([$id]);
            flash('ok', ucfirst($ent['singular']) . ' dihapus.');
        }
        redirect($self);
    }
    elseif ($do === 'toggle' && !empty($ent['has_active'])) {
        $pdo->prepare("UPDATE $table SET active = 1 - active WHERE id = ?")->execute([$id]);
        redirect($self);
    }
    elseif ($do === 'move' && !empty($ent['sortable'])) {
        $dir = ($_POST['dir'] ?? '') === 'up' ? -1 : 1;
        $ids = $pdo->query("SELECT id FROM $table ORDER BY sort ASC, id ASC")->fetchAll(PDO::FETCH_COLUMN);
        $pos = array_search($id, array_map('intval', $ids), true);
        if ($pos !== false && isset($ids[$pos + $dir])) {
            $tmp = $ids[$pos]; $ids[$pos] = $ids[$pos + $dir]; $ids[$pos + $dir] = $tmp;
            $pdo->exec('BEGIN');
            $st = $pdo->prepare("UPDATE $table SET sort = ? WHERE id = ?");
            foreach ($ids as $i => $rid) $st->execute([$i + 1, $rid]);
            $pdo->exec('COMMIT');
        }
        redirect($self);
    }
    else redirect($self);
}

/* ---------------------------------------------- TAMPILAN */
if ($mode === 'form' && $row === null) {
    if ($editId) {
        $row = fetch_row($pdo, $table, $editId);
        if (!$row) { flash('error', 'Data tidak ditemukan.'); redirect($self); }
    } elseif (empty($ent['can_create'])) {
        redirect($self);
    } else {
        $row = ['active' => 1];
    }
}

// Produk lama yang koordinat logonya masih kosong: isi form dengan posisi yang sedang dipakai situs
if ($mode === 'form' && $key === 'products' && is_array($row) && $editId > 0 && empty($row['logo_w'])) {
    $lg = cms_logo_for($row);
    $row['logo_x'] = $lg['x']; $row['logo_y'] = $lg['y']; $row['logo_w'] = $lg['w']; $row['logo_h'] = $lg['h'];
}

admin_header($ent['label'], $key);

if ($mode === 'form'):
    $isEdit = $editId > 0;
    $title  = $isEdit ? 'Ubah ' . $ent['singular'] : 'Tambah ' . $ent['singular'];
?>
<div class="bar">
    <div><h1><?= e($title) ?></h1><p class="sub" style="margin:0"><?= e($ent['label']) ?></p></div>
    <a class="btn ghost" href="<?= e($self) ?>">← Kembali ke daftar</a>
</div>
<form method="post" enctype="multipart/form-data" class="card" autocomplete="off">
    <?= csrf_field() ?>
    <input type="hidden" name="do" value="save">
    <input type="hidden" name="id" value="<?= $editId ?>">
    <?php if (!empty($ent['has_active'])): ?>
    <div class="field"><label class="check"><input type="checkbox" name="active" value="1"<?= !empty($row['active']) ? ' checked' : '' ?>> Tampilkan di situs (aktif)</label></div>
    <?php endif; ?>
    <?= cms_render_fields($ent['fields'], $row, $isEdit) ?>
    <div class="formbar">
        <button class="btn" type="submit">Simpan</button>
        <a class="btn ghost" href="<?= e($self) ?>">Batal</a>
    </div>
</form>

<?php else:
    $rows = $pdo->query("SELECT * FROM $table ORDER BY sort ASC, id ASC")->fetchAll();
    $last = count($rows) - 1;
?>
<div class="bar">
    <div><h1><?= e($ent['label']) ?></h1><p class="sub" style="margin:0"><?= count($rows) ?> data</p></div>
    <?php if (!empty($ent['can_create'])): ?><a class="btn" href="<?= e($self) ?>&amp;a=form">+ Tambah <?= e($ent['singular']) ?></a><?php endif; ?>
</div>
<div class="card" style="padding:6px 10px;overflow-x:auto">
<table>
    <thead><tr>
        <?php if (!empty($ent['sortable'])): ?><th>#</th><?php endif; ?>
        <?php foreach ($ent['list'] as $c => $def): ?><th><?= e($def[0]) ?></th><?php endforeach; ?>
        <?php if (!empty($ent['has_active'])): ?><th>Status</th><?php endif; ?>
        <th></th>
    </tr></thead>
    <tbody>
    <?php if (!$rows): ?><tr><td colspan="9" class="muted">Belum ada data.</td></tr><?php endif; ?>
    <?php foreach ($rows as $i => $r): ?>
    <tr>
        <?php if (!empty($ent['sortable'])): ?><td class="muted"><?= $i + 1 ?></td><?php endif; ?>
        <?php foreach ($ent['list'] as $c => $def): ?>
            <td>
            <?php if ($def[1] === 'image'): $src = cms_admin_img((string)$r[$c]); ?>
                <?php if ($src !== ''): ?><img class="thumb" src="<?= e($src) ?>" alt="" loading="lazy"><?php else: ?><span class="muted">—</span><?php endif; ?>
            <?php else: ?>
                <div class="tt" title="<?= e($r[$c]) ?>"><?= e($r[$c]) !== '' ? e($r[$c]) : '<span class="muted">—</span>' ?></div>
            <?php endif; ?>
            </td>
        <?php endforeach; ?>
        <?php if (!empty($ent['has_active'])): ?>
            <td><span class="badge<?= $r['active'] ? ' on' : '' ?>"><?= $r['active'] ? 'Aktif' : 'Nonaktif' ?></span></td>
        <?php endif; ?>
        <td class="act">
            <?php if (!empty($ent['sortable'])): ?>
                <form class="inl" method="post"><?= csrf_field() ?><input type="hidden" name="do" value="move"><input type="hidden" name="id" value="<?= (int)$r['id'] ?>"><input type="hidden" name="dir" value="up">
                    <button class="btn ghost sm" type="submit" title="Naikkan"<?= $i === 0 ? ' disabled' : '' ?>>↑</button></form>
                <form class="inl" method="post"><?= csrf_field() ?><input type="hidden" name="do" value="move"><input type="hidden" name="id" value="<?= (int)$r['id'] ?>"><input type="hidden" name="dir" value="down">
                    <button class="btn ghost sm" type="submit" title="Turunkan"<?= $i === $last ? ' disabled' : '' ?>>↓</button></form>
            <?php endif; ?>
            <?php if (!empty($ent['has_active'])): ?>
                <form class="inl" method="post"><?= csrf_field() ?><input type="hidden" name="do" value="toggle"><input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                    <button class="btn ghost sm" type="submit"><?= $r['active'] ? 'Sembunyikan' : 'Tampilkan' ?></button></form>
            <?php endif; ?>
            <a class="btn sm" href="<?= e($self) ?>&amp;a=form&amp;id=<?= (int)$r['id'] ?>">Ubah</a>
            <?php if (!empty($ent['can_delete'])): ?>
                <form class="inl" method="post" data-confirm="Hapus <?= e($ent['singular']) ?> ini? Tindakan ini tidak dapat dibatalkan."><?= csrf_field() ?><input type="hidden" name="do" value="delete"><input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                    <button class="btn danger sm" type="submit">Hapus</button></form>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php endif;
admin_footer();
