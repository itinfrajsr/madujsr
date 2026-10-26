<?php
/* =========================================================
   FUNGSI UMUM (dipakai frontend & admin) — kompatibel PHP 7.4+
========================================================= */
if (!function_exists('e')) {
    function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
}

function starts_with(string $s, string $prefix): bool { return strncmp($s, $prefix, strlen($prefix)) === 0; }

/* ---------- Pengaturan situs ---------- */
function setting(string $k, string $default = ''): string
{
    static $cache = null;
    if ($cache === null) {
        $cache = [];
        foreach (db()->query('SELECT k, v FROM settings') as $r) $cache[$r['k']] = (string)$r['v'];
    }
    if (array_key_exists($k, $cache)) return $cache[$k];
    // kunci belum ada di database (mis. fitur baru setelah update): pakai nilai bawaan
    static $defs = null;
    if ($defs === null) $defs = cms_settings_defaults();
    return $default !== '' ? $default : (string)($defs[$k] ?? '');
}

function cms_wa_url(): string
{
    return 'https://api.whatsapp.com/send?phone=' . rawurlencode(setting('wa_number'))
         . '&text=' . rawurlencode(setting('wa_text'));
}

/* ---------- Helper dwibahasa untuk template ---------- */
// atribut data-id / data-en dari dua string
function bia(string $id, string $en): string
{
    return ' data-id="' . e($id) . '" data-en="' . e($en !== '' ? $en : $id) . '"';
}
// atribut dari kunci setting (key_id / key_en)
function sa(string $key): string { return bia(setting($key . '_id'), setting($key . '_en')); }
// teks bahasa Indonesia dari kunci setting (sudah di-escape)
function st(string $key): string { return e(setting($key . '_id')); }

// judul dengan sebagian teks diberi <em>
function em_title(string $titleKey, string $emKey): string
{
    $t  = e(setting($titleKey . '_id'));
    $em = e(setting($emKey . '_id'));
    if ($em !== '' && ($p = strrpos($t, $em)) !== false) {
        $t = substr_replace($t, '<em>' . $em . '</em>', $p, strlen($em));
    }
    return $t;
}

/* ---------- Sanitasi HTML sederhana (untuk Halaman Info) ---------- */
function cms_clean_node(DOMNode $node, array $allowed): void
{
    $kids = [];
    foreach ($node->childNodes as $c) $kids[] = $c;
    foreach ($kids as $c) {
        if ($c->nodeType === XML_ELEMENT_NODE) {
            $tag = strtolower($c->nodeName);
            if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed', 'form', 'input', 'button',
                                'link', 'meta', 'svg', 'math', 'textarea', 'select'], true)) {
                $node->removeChild($c);
                continue;
            }
            cms_clean_node($c, $allowed);
            if (!in_array($tag, $allowed, true)) {
                while ($c->firstChild) $node->insertBefore($c->firstChild, $c);
                $node->removeChild($c);
                continue;
            }
            $href = $tag === 'a' ? trim($c->getAttribute('href')) : '';
            $tgt  = $tag === 'a' ? $c->getAttribute('target') : '';
            $names = [];
            foreach ($c->attributes as $a) $names[] = $a->nodeName;
            foreach ($names as $n) $c->removeAttribute($n);
            if ($tag === 'a' && $href !== '' && preg_match('~^(https?://|mailto:|tel:|#|/)~i', $href)) {
                $c->setAttribute('href', $href);
                if ($tgt === '_blank') {
                    $c->setAttribute('target', '_blank');
                    $c->setAttribute('rel', 'noopener noreferrer');
                }
            }
        } elseif ($c->nodeType === XML_COMMENT_NODE) {
            $node->removeChild($c);
        }
    }
}

function cms_clean_html(string $html): string
{
    $html = trim($html);
    if ($html === '') return '';
    if (!class_exists('DOMDocument')) return nl2br(e(strip_tags($html)));
    $allowed = ['p', 'br', 'strong', 'b', 'em', 'i', 'u', 'ul', 'ol', 'li', 'a', 'h2', 'h3', 'h4', 'blockquote', 'span'];
    $doc = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $doc->loadHTML('<?xml encoding="UTF-8"><div>' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    $root = $doc->getElementsByTagName('div')->item(0);
    if (!$root) return '';
    cms_clean_node($root, $allowed);
    $out = '';
    foreach ($root->childNodes as $c) $out .= $doc->saveHTML($c);
    return trim($out);
}

/* ---------- Sesi, CSRF, flash, auth (admin) ---------- */
/* Sesi login: tanpa "Ingat saya" -> keluar otomatis setelah tidak aktif CMS_IDLE_SECONDS;
   dengan "Ingat saya" -> tetap masuk CMS_REMEMBER_DAYS hari (token acak tersimpan di database, bukan di file sesi PHP). */
if (!defined('CMS_IDLE_SECONDS'))  define('CMS_IDLE_SECONDS', 7200);
if (!defined('CMS_REMEMBER_DAYS')) define('CMS_REMEMBER_DAYS', 30);

function cms_is_https(): bool
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (($_SERVER['SERVER_PORT'] ?? '') == 443);
}

function cms_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) return;
    ini_set('session.gc_maxlifetime', (string)max(CMS_IDLE_SECONDS, 1440));
    $https = cms_is_https();
    session_name('madujsr_admin');
    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'secure' => $https, 'httponly' => true, 'samesite' => 'Lax']);
    session_start();
}

function csrf_token(): string
{
    cms_session();
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function csrf_field(): string { return '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">'; }
function csrf_check(): void
{
    cms_session();
    $t = $_POST['_csrf'] ?? '';
    if (!is_string($t) || !hash_equals($_SESSION['csrf'] ?? '', $t)) {
        http_response_code(419);
        exit('Sesi tidak valid atau kedaluwarsa. Muat ulang halaman lalu coba lagi.');
    }
}

function flash(string $type, string $msg): void { cms_session(); $_SESSION['flash'][] = [$type, $msg]; }
function flash_render(): string
{
    cms_session();
    $out = '';
    foreach ($_SESSION['flash'] ?? [] as $f) $out .= '<div class="alert alert-' . e($f[0]) . '">' . e($f[1]) . '</div>';
    unset($_SESSION['flash']);
    return $out;
}

// URL halaman admin: aurl('crud', '?e=faqs') -> crud?e=faqs  (atau crud.php?e=faqs bila CLEAN_URLS=false)
function aurl(string $page, string $qs = ''): string
{
    if ($page === 'index') return CLEAN_URLS ? './' . $qs : 'index.php' . $qs;
    return $page . (CLEAN_URLS ? '' : '.php') . $qs;
}

function redirect(string $url): void { header('Location: ' . $url); exit; }

function cms_remember_cookie(string $value, int $expires): void
{
    setcookie('madujsr_remember', $value, ['expires' => $expires, 'path' => '/', 'secure' => cms_is_https(), 'httponly' => true, 'samesite' => 'Lax']);
}

/** Buat token "Ingat saya" untuk user $uid dan kirim cookie-nya. */
function cms_remember_issue(int $uid): void
{
    $pdo = db();
    $pdo->prepare('DELETE FROM auth_tokens WHERE expires < ?')->execute([time()]);
    $sel = bin2hex(random_bytes(9));
    $val = bin2hex(random_bytes(32));
    $exp = time() + CMS_REMEMBER_DAYS * 86400;
    $pdo->prepare('INSERT INTO auth_tokens (selector, token_hash, user_id, expires) VALUES (?,?,?,?)')
        ->execute([$sel, hash('sha256', $val), $uid, $exp]);
    cms_remember_cookie($sel . ':' . $val, $exp);
}

/** Hapus token "Ingat saya" (cookie ini saja, atau semua milik user bila $allOfUser diisi). */
function cms_remember_forget(?int $allOfUser = null): void
{
    $pdo = db();
    if ($allOfUser !== null) $pdo->prepare('DELETE FROM auth_tokens WHERE user_id = ?')->execute([$allOfUser]);
    $c = (string)($_COOKIE['madujsr_remember'] ?? '');
    if ($c !== '') {
        $sel = explode(':', $c, 2)[0];
        $pdo->prepare('DELETE FROM auth_tokens WHERE selector = ?')->execute([$sel]);
        cms_remember_cookie('', time() - 3600);
        unset($_COOKIE['madujsr_remember']);
    }
}

/** Jika belum login tetapi punya cookie "Ingat saya" yang sah, masukkan otomatis (token diganti setiap dipakai). */
function cms_remember_login(): void
{
    if (!empty($_SESSION['uid'])) return;
    $c = (string)($_COOKIE['madujsr_remember'] ?? '');
    if ($c === '' || strpos($c, ':') === false) return;
    [$sel, $val] = explode(':', $c, 2);
    if (!preg_match('/^[0-9a-f]{18}$/', $sel) || !preg_match('/^[0-9a-f]{64}$/', $val)) return;
    $pdo = db();
    $st = $pdo->prepare('SELECT t.*, u.username FROM auth_tokens t JOIN users u ON u.id = t.user_id WHERE t.selector = ? AND t.expires > ?');
    $st->execute([$sel, time()]);
    $r = $st->fetch();
    if (!$r || !hash_equals($r['token_hash'], hash('sha256', $val))) {
        if ($r) $pdo->prepare('DELETE FROM auth_tokens WHERE selector = ?')->execute([$sel]);   // token dipalsukan: cabut
        cms_remember_cookie('', time() - 3600);
        return;
    }
    $pdo->prepare('DELETE FROM auth_tokens WHERE selector = ?')->execute([$sel]);
    session_regenerate_id(true);
    $_SESSION['uid'] = (int)$r['user_id'];
    $_SESSION['uname'] = $r['username'];
    $_SESSION['remember'] = 1;
    cms_remember_issue((int)$r['user_id']);
}

function require_login(): void
{
    cms_session();
    cms_remember_login();
    if (empty($_SESSION['uid'])) redirect(aurl('login'));
    // tanpa "Ingat saya": keluar otomatis bila tidak aktif terlalu lama
    if (empty($_SESSION['remember']) && isset($_SESSION['last']) && time() - (int)$_SESSION['last'] > CMS_IDLE_SECONDS) {
        unset($_SESSION['uid'], $_SESSION['uname'], $_SESSION['last']);
        $_SESSION['login_msg'] = 'Sesi berakhir karena tidak aktif. Silakan masuk lagi.';
        redirect(aurl('login'));
    }
    $_SESSION['last'] = time();
}

function client_ip(): string { return (string)($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'); }

function login_blocked(): bool
{
    $pdo = db();
    $pdo->exec('DELETE FROM login_attempts WHERE ts < ' . (time() - 900));
    $st = $pdo->prepare('SELECT COUNT(*) FROM login_attempts WHERE ip = ?');
    $st->execute([client_ip()]);
    return (int)$st->fetchColumn() >= 5;
}
function login_fail(): void { db()->prepare('INSERT INTO login_attempts (ip, ts) VALUES (?, ?)')->execute([client_ip(), time()]); }
function login_clear(): void { db()->prepare('DELETE FROM login_attempts WHERE ip = ?')->execute([client_ip()]); }
