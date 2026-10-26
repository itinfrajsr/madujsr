<?php
require __DIR__ . '/_init.php';

$pdo = db();
$uid = (int)$_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $cur  = (string)($_POST['current'] ?? '');
    $new  = (string)($_POST['new'] ?? '');
    $new2 = (string)($_POST['new2'] ?? '');

    $st = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $st->execute([$uid]);
    $u = $st->fetch();

    if (!$u || !password_verify($cur, $u['password_hash'])) flash('error', 'Password saat ini salah.');
    elseif (strlen($new) < 8) flash('error', 'Password baru minimal 8 karakter.');
    elseif ($new !== $new2) flash('error', 'Konfirmasi password baru tidak sama.');
    else {
        $pdo->prepare('UPDATE users SET password_hash = ? WHERE id = ?')->execute([password_hash($new, PASSWORD_DEFAULT), $uid]);
        cms_remember_forget($uid);   // perangkat lain yang "Ingat saya" harus login ulang
        if (!empty($_SESSION['remember'])) cms_remember_issue($uid);   // perangkat ini tetap diingat
        session_regenerate_id(true);
        flash('ok', 'Password berhasil diganti.');
    }
    redirect(aurl('account'));
}

admin_header('Akun & Password', 'account');
?>
<h1>Akun & Password</h1>
<p class="sub">Masuk sebagai <b><?= e($_SESSION['uname'] ?? '') ?></b>.</p>
<form method="post" class="card" style="max-width:520px" autocomplete="off">
    <?= csrf_field() ?>
    <div class="field"><label for="current">Password saat ini</label><input id="current" type="password" name="current" required autocomplete="current-password"></div>
    <div class="field"><label for="new">Password baru</label><input id="new" type="password" name="new" required minlength="8" autocomplete="new-password"><small class="help">Minimal 8 karakter.</small></div>
    <div class="field"><label for="new2">Ulangi password baru</label><input id="new2" type="password" name="new2" required minlength="8" autocomplete="new-password"></div>
    <button class="btn" type="submit">Ganti password</button>
</form>
<?php admin_footer();
