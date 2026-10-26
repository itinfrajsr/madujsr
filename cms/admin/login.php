<?php
define('CMS_PUBLIC', true);
require __DIR__ . '/_init.php';

$pdo = db();
$hasUsers = (int)$pdo->query('SELECT COUNT(*) FROM users')->fetchColumn() > 0;

cms_remember_login();
if (!empty($_SESSION['uid'])) redirect(aurl('index'));
$notice = (string)($_SESSION['login_msg'] ?? ''); unset($_SESSION['login_msg']);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $user = trim((string)($_POST['username'] ?? ''));
    $pass = (string)($_POST['password'] ?? '');

    if (!$hasUsers) {
        // Pembuatan admin pertama
        $pass2 = (string)($_POST['password2'] ?? '');
        if (!preg_match('/^[A-Za-z0-9_.-]{3,40}$/', $user)) $error = 'Username 3-40 karakter (huruf, angka, titik, minus, underscore).';
        elseif (strlen($pass) < 8) $error = 'Password minimal 8 karakter.';
        elseif ($pass !== $pass2) $error = 'Konfirmasi password tidak sama.';
        else {
            $st = $pdo->prepare('INSERT INTO users (username, password_hash, created_at)
                                 SELECT ?, ?, ? WHERE (SELECT COUNT(*) FROM users) = 0');
            $st->execute([$user, password_hash($pass, PASSWORD_DEFAULT), date('c')]);
            if ($st->rowCount() === 1) {
                session_regenerate_id(true);
                $_SESSION['uid'] = (int)$pdo->lastInsertId();
                $_SESSION['uname'] = $user;
                flash('ok', 'Akun admin dibuat. Selamat datang!');
                redirect(aurl('index'));
            }
            $error = 'Akun admin sudah ada. Silakan masuk.';
            $hasUsers = true;
        }
    } else {
        if (login_blocked()) {
            $error = 'Terlalu banyak percobaan gagal. Coba lagi dalam 15 menit.';
        } else {
            $st = $pdo->prepare('SELECT * FROM users WHERE username = ?');
            $st->execute([$user]);
            $u = $st->fetch();
            // verifikasi tetap dijalankan agar waktu respons relatif konstan
            $hash = $u ? $u['password_hash'] : '$2y$10$usesomesillystringforsaltuQnKq0nQhO8b3o3m1Zq4c3m6w1xW';
            if ($u && password_verify($pass, $hash)) {
                login_clear();
                cms_backup_db();
                session_regenerate_id(true);
                $_SESSION['uid'] = (int)$u['id'];
                $_SESSION['uname'] = $u['username'];
                $_SESSION['last'] = time();
                if (!empty($_POST['remember'])) { $_SESSION['remember'] = 1; cms_remember_issue((int)$u['id']); }
                else unset($_SESSION['remember']);
                redirect(aurl('index'));
            }
            login_fail();
            $error = 'Username atau password salah.';
        }
    }
}
?><!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title><?= $hasUsers ? 'Masuk' : 'Buat Akun Admin' ?> — CMS Madu JSR</title>
<style>
body{margin:0;font:15px/1.5 system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;background:#faf6ec;color:#211d17}
.login{max-width:400px;margin:9vh auto;padding:0 16px}
.card{background:#fff;border:1px solid #eadfc4;border-radius:16px;padding:28px;box-shadow:0 10px 30px rgba(80,60,25,.08)}
h1{margin:0 0 4px;font-size:24px}.sub{color:#7a6f5c;margin:0 0 20px}
label{display:block;font-weight:600;margin:14px 0 5px}
input{width:100%;padding:10px 12px;border:1px solid #d9ceb0;border-radius:9px;font:inherit;box-sizing:border-box}
input:focus{outline:2px solid rgba(217,164,65,.45);border-color:#d9a441}
button{margin-top:22px;width:100%;background:#d9a441;color:#fff;border:0;border-radius:999px;padding:12px;font:inherit;font-weight:700;cursor:pointer}
button:hover{background:#c27f3a}
.err{background:#fdecea;border:1px solid #f3b8b1;color:#8a2a20;padding:10px 14px;border-radius:10px;margin-bottom:6px}
.rem{display:flex;align-items:center;gap:8px;font-weight:500;margin:14px 0 0;font-size:14px;cursor:pointer}
.rem input{width:auto;margin:0}
.note{background:#fff6dc;border:1px solid #f0dd9a;color:#6b5516;padding:10px 14px;border-radius:10px;margin-bottom:6px;font-size:13.5px}
</style></head><body>
<div class="login"><div class="card">
    <h1>🍯 CMS Madu JSR</h1>
    <p class="sub"><?= $hasUsers ? 'Masuk ke panel admin' : 'Buat akun admin pertama' ?></p>
    <?php if ($notice && !$error): ?><div class="note"><?= e($notice) ?></div><?php endif; ?>
    <?php if ($error): ?><div class="err"><?= e($error) ?></div><?php endif; ?>
    <?php if (!$hasUsers): ?><div class="note">Belum ada akun admin. Buat sekarang — halaman ini hanya muncul sekali.</div><?php endif; ?>
    <form method="post" autocomplete="on">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input id="username" name="username" value="<?= e($_POST['username'] ?? '') ?>" required autofocus autocomplete="username">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="<?= $hasUsers ? 'current-password' : 'new-password' ?>">
        <?php if (!$hasUsers): ?>
        <label for="password2">Ulangi password</label>
        <input id="password2" type="password" name="password2" required autocomplete="new-password">
        <?php endif; ?>
        <?php if ($hasUsers): ?>
        <label class="rem"><input type="checkbox" name="remember" value="1"> Ingat saya (tetap masuk <?= (int)CMS_REMEMBER_DAYS ?> hari)</label>
        <?php endif; ?>
        <button type="submit"><?= $hasUsers ? 'Masuk' : 'Buat akun & masuk' ?></button>
    </form>
</div></div>
</body></html>
