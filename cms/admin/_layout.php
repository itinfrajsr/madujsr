<?php
function admin_header(string $title, string $active = ''): void
{
    $ents = cms_entities();
    $nav = [[aurl('index'), 'Dashboard', 'dashboard']];
    foreach ($ents as $k => $ent) $nav[] = [aurl('crud', '?e=' . $k), $ent['label'], $k];
    $nav[] = [aurl('settings'), 'Pengaturan Situs', 'settings'];
    $nav[] = [aurl('account'), 'Akun & Password', 'account'];
    ?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title><?= e($title) ?> — CMS Madu JSR</title>
<style>
:root{--gold:#d9a441;--gold-d:#c27f3a;--ink:#211d17;--bg:#faf6ec;--line:#eadfc4;--muted:#7a6f5c;--red:#b3392b;--green:#2f7d4a}
*{box-sizing:border-box}
body{margin:0;font:15px/1.5 system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;color:var(--ink);background:var(--bg)}
a{color:var(--gold-d)}
.layout{display:flex;min-height:100vh}
.side{width:240px;background:var(--ink);color:#fff;padding:20px 14px;position:sticky;top:0;height:100vh;overflow:auto;flex:0 0 240px}
.side .brand{font-weight:800;font-size:18px;color:var(--gold);margin:0 8px 18px;display:block;text-decoration:none}
.side a.nav{display:block;color:rgba(255,255,255,.78);text-decoration:none;padding:9px 12px;border-radius:8px;margin-bottom:2px}
.side a.nav:hover{background:rgba(255,255,255,.08);color:#fff}
.side a.nav.on{background:var(--gold);color:#fff;font-weight:700}
.side .sep{border-top:1px solid rgba(255,255,255,.12);margin:12px 0}
.side form{margin:0}
.side button.linkish{background:none;border:0;color:rgba(255,255,255,.78);padding:9px 12px;cursor:pointer;font:inherit;width:100%;text-align:left;border-radius:8px}
.side button.linkish:hover{background:rgba(255,255,255,.08);color:#fff}
.main{flex:1;min-width:0;padding:28px 32px 60px}
h1{margin:0 0 6px;font-size:26px}
.sub{color:var(--muted);margin:0 0 22px}
.card{background:#fff;border:1px solid var(--line);border-radius:14px;padding:22px;margin-bottom:20px;box-shadow:0 4px 16px rgba(80,60,25,.05)}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:14px}
.stat{display:block;text-decoration:none;color:inherit;background:#fff;border:1px solid var(--line);border-radius:14px;padding:16px 18px}
.stat:hover{border-color:var(--gold)}
.stat b{display:block;font-size:30px;color:var(--gold-d);line-height:1.1}
table{width:100%;border-collapse:collapse}
th,td{text-align:left;padding:10px 12px;border-bottom:1px solid var(--line);vertical-align:middle}
th{font-size:12px;text-transform:uppercase;letter-spacing:.5px;color:var(--muted)}
td.act{white-space:nowrap;text-align:right}
td img.thumb{width:48px;height:48px;object-fit:contain;background:#faf4e5;border-radius:8px;display:block}
.btn{display:inline-block;background:var(--gold);color:#fff;border:0;border-radius:999px;padding:9px 20px;font:inherit;font-weight:700;cursor:pointer;text-decoration:none}
.btn:hover{background:var(--gold-d);color:#fff}
.btn.sm{padding:5px 12px;font-size:13px}
.btn.ghost{background:#fff;color:var(--ink);border:1px solid var(--line)}
.btn.ghost:hover{background:#faf4e5;color:var(--ink)}
.btn.danger{background:var(--red)}
.inl{display:inline}
.badge{display:inline-block;font-size:12px;padding:2px 9px;border-radius:99px;background:#eee;color:#555}
.badge.on{background:#dff3e5;color:var(--green)}
.alert{padding:12px 16px;border-radius:10px;margin-bottom:16px;border:1px solid}
.alert-ok{background:#e7f6ec;border-color:#b5e0c3;color:#1f5a35}
.alert-error{background:#fdecea;border-color:#f3b8b1;color:#8a2a20}
.alert-info{background:#fff6dc;border-color:#f0dd9a;color:#6b5516}
.field{margin-bottom:16px}
.field label{display:block;font-weight:600;margin-bottom:5px}
.field label.check{font-weight:600;display:flex;gap:8px;align-items:center}
.req{color:var(--red)}
input[type=text],input[type=url],input[type=number],input[type=password],select,textarea{width:100%;padding:9px 12px;border:1px solid #d9ceb0;border-radius:9px;font:inherit;background:#fff}
input:focus,select:focus,textarea:focus{outline:2px solid rgba(217,164,65,.45);border-color:var(--gold)}
textarea{resize:vertical}
textarea.mono{font-family:ui-monospace,Menlo,Consolas,monospace;font-size:13px}
.help{display:block;color:var(--muted);font-size:12.5px;margin-top:4px}
.pair{display:grid;grid-template-columns:1fr 1fr;gap:16px}
h3.group{margin:28px 0 14px;padding-bottom:6px;border-bottom:2px solid var(--line);font-size:16px;color:var(--gold-d)}
h3.group:first-child{margin-top:0}
.imgfield{display:flex;gap:14px;align-items:flex-start}
.imgprev{width:110px;height:110px;object-fit:contain;background:#faf4e5;border:1px solid var(--line);border-radius:10px;flex:0 0 110px}
.imgin{flex:1;display:grid;gap:8px}
.bar{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:18px;flex-wrap:wrap}
.formbar{display:flex;gap:10px;margin-top:22px;position:sticky;bottom:0;background:linear-gradient(transparent,#fff 30%);padding:14px 0 0}
.login{max-width:400px;margin:9vh auto;padding:0 16px}
.muted{color:var(--muted)}
.lp{position:relative;width:100%;max-width:960px;aspect-ratio:1918/876;overflow:hidden;background:#2b2620;border-radius:12px;cursor:crosshair;touch-action:none;user-select:none}
.lp>img#lpImg{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;pointer-events:none}
.lp-empty{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;color:#d8cfb8;text-align:center;padding:16px;font-size:14px}
.lp-logo{position:absolute;object-fit:contain;outline:2px dashed #ff5a4d;outline-offset:1px;pointer-events:none;background:rgba(255,255,255,.15)}
.lp-info{font-size:12.5px;color:var(--muted);margin-top:6px}
.lp [hidden]{display:none!important}
.tp-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:10px}
.tp-tab.active{background:var(--brand,#c8951a);color:#fff;border-color:transparent}
.tp-wrap{width:100%}
.tp{position:relative;overflow:hidden;background:#2b2620 center/cover no-repeat;border-radius:12px;cursor:crosshair;touch-action:none;user-select:none;max-width:100%}
.tp-empty{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;color:#d8cfb8;text-align:center;padding:16px;font-size:14px}
.tp-title{position:absolute;transform:translate(-50%,-50%);color:#fff;font-weight:800;font-family:Arial,Helvetica,sans-serif;width:max-content;max-width:90%;text-align:center;text-shadow:0 2px 10px rgba(0,0,0,.55);outline:1px dashed rgba(255,255,255,.7);outline-offset:3px;pointer-events:none;line-height:1.2}
.tp [hidden]{display:none!important}
.tt{max-width:340px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
@media(max-width:860px){.layout{display:block}.side{position:static;width:auto;height:auto;display:flex;flex-wrap:wrap;gap:4px}.side .brand{width:100%}.side .sep{display:none}.main{padding:20px 16px 50px}.pair{grid-template-columns:1fr}.imgfield{flex-direction:column}}
</style>
</head>
<body>
<div class="layout">
<aside class="side">
    <a class="brand" href="<?= e(aurl('index')) ?>">🍯 CMS Madu JSR</a>
    <?php foreach ($nav as $n): ?>
        <a class="nav<?= $active === $n[2] ? ' on' : '' ?>" href="<?= e($n[0]) ?>"><?= e($n[1]) ?></a>
    <?php endforeach; ?>
    <div class="sep"></div>
    <a class="nav" href="../../" target="_blank" rel="noopener">↗ Lihat situs</a>
    <form method="post" action="<?= e(aurl('logout')) ?>"><?= csrf_field() ?><button class="linkish" type="submit">⎋ Keluar</button></form>
</aside>
<main class="main">
<?= flash_render() ?>
<?php
}

function admin_footer(): void
{
    ?>
</main>
</div>
<script>
// pratinjau gambar saat memilih file / mengetik path
document.querySelectorAll('.imgfield').forEach(function (box) {
    var img = box.querySelector('.imgprev');
    var txt = box.querySelector('input[type=text]');
    var file = box.querySelector('input[type=file]');
    file.addEventListener('change', function () {
        if (file.files && file.files[0]) { img.src = URL.createObjectURL(file.files[0]); img.hidden = false; }
    });
    txt.addEventListener('change', function () {
        var v = txt.value.trim();
        if (!v) { img.hidden = true; return; }
        img.src = /^https?:\/\//i.test(v) ? v : '../../' + v.replace(/ /g, '%20');
        img.hidden = false;
    });
});
// Kirim teks form dalam base64 (hindari pemblokiran 403 oleh WAF hosting pada tanda kutip, <, >, dll.)
document.addEventListener('formdata', function (ev) {
    var form = ev.target, fd = ev.formData, out = [];
    fd.forEach(function (v, k) { out.push([k, v]); });
    out.forEach(function (p) {
        var k = p[0], v = p[1];
        if (typeof v !== 'string' || v === '' || k === '_csrf') return;
        var el = form.elements[k];
        if (el && el.length !== undefined && !el.tagName) el = el[0];
        var t = el && (el.tagName === 'TEXTAREA' ? 'textarea' : (el.type || ''));
        if (['textarea', 'text', 'url', 'email', 'search'].indexOf(t) < 0) return;
        if (!/[^A-Za-z0-9 _.,@\/:#%-]/.test(v)) return;       // teks aman tidak perlu diubah
        try {
            var bytes = new TextEncoder().encode(v), bin = '';
            for (var i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
            fd.set(k, '~b64~' + btoa(bin));
        } catch (e) {}
    });
});
document.querySelectorAll('form[data-confirm]').forEach(function (f) {
    f.addEventListener('submit', function (ev) { if (!confirm(f.getAttribute('data-confirm'))) ev.preventDefault(); });
});
// Form dengan unggahan: kirim sebagai POST biasa + gambar dalam base64 (hosting seperti InfinityFree memblokir multipart)
document.querySelectorAll('form[enctype="multipart/form-data"]').forEach(function (f) {
    f.enctype = 'application/x-www-form-urlencoded';
    function shrink(file) {                                     // gambar besar diperkecil agar kiriman tidak terlalu berat
        return new Promise(function (res) {
            if (!/^image\/(jpeg|png|webp)$/.test(file.type) || file.size < 1500000) return res(file);
            var img = new Image(), u = URL.createObjectURL(file);
            img.onload = function () {
                var s = Math.min(1, 2400 / Math.max(img.width, img.height)), c = document.createElement('canvas');
                c.width = Math.round(img.width * s); c.height = Math.round(img.height * s);
                c.getContext('2d').drawImage(img, 0, 0, c.width, c.height);
                c.toBlob(function (b) { URL.revokeObjectURL(u); res(b && b.size < file.size ? b : file); }, 'image/webp', 0.85);
            };
            img.onerror = function () { res(file); };
            img.src = u;
        });
    }
    function b64(blob) {
        return new Promise(function (res, rej) {
            var r = new FileReader();
            r.onload = function () { res(String(r.result).split(',')[1] || ''); };
            r.onerror = rej; r.readAsDataURL(blob);
        });
    }
    f.addEventListener('submit', function (ev) {
        if (ev.defaultPrevented || f.__ready) return;
        ev.preventDefault();
        var sub = ev.submitter, inputs = [].slice.call(f.querySelectorAll('input[type=file]'));
        if (sub) sub.disabled = true;
        Promise.all(inputs.map(function (inp) {
            var file = inp.files && inp.files[0];
            if (!file) return null;
            return shrink(file).then(b64).then(function (data) {
                var h = document.createElement('input'); h.type = 'hidden'; h.name = inp.name + '__b64'; h.value = data; f.appendChild(h);
            });
        })).then(function () {
            inputs.forEach(function (i) { i.disabled = true; });   // file asli tidak ikut terkirim
            f.__ready = true;
            if (sub) sub.disabled = false;
            if (f.requestSubmit) f.requestSubmit(sub || undefined); else f.submit();
        }).catch(function () { alert('Gagal membaca file gambar.'); if (sub) sub.disabled = false; });
    });
});
</script>
<?php if (empty($_SESSION['remember'])): ?>
<div id="idleBox" style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(33,29,23,.55);align-items:center;justify-content:center;padding:16px">
    <div style="background:#fff;border-radius:16px;padding:26px;max-width:380px;width:100%;box-shadow:0 20px 50px rgba(0,0,0,.3);text-align:center">
        <h3 style="margin:0 0 8px">Sesi akan berakhir</h3>
        <p style="margin:0 0 18px;color:#7a6f5c">Tidak ada aktivitas. Anda akan keluar otomatis dalam <b id="idleCnt">60</b> detik. Simpan perubahan yang belum tersimpan.</p>
        <button type="button" class="btn" id="idleStay">Tetap masuk</button>
    </div>
</div>
<script>
// Logout otomatis bila tidak ada aktivitas (khusus login tanpa "Ingat saya")
(function () {
    var IDLE = <?= (int)CMS_IDLE_SECONDS ?> * 1000, LEAD = Math.min(60000, Math.floor(IDLE / 3));
    var PING = <?= json_encode(aurl('ping')) ?>, LOGIN = <?= json_encode(aurl('login')) ?>;
    var box = document.getElementById('idleBox'), cnt = document.getElementById('idleCnt');
    var last = Date.now(), lastPing = Date.now(), warned = false;
    function ping() {
        lastPing = Date.now();
        return fetch(PING, {credentials: 'same-origin', cache: 'no-store', redirect: 'manual'}).then(function (r) {
            if (r.type === 'opaqueredirect' || !r.ok) location.href = LOGIN;      // sesi sudah berakhir di server
        }).catch(function () {});
    }
    function activity() {
        if (warned) return;                                                         // saat peringatan tampil, hanya tombol yang memperpanjang
        last = Date.now();
        if (last - lastPing > 60000) ping();
    }
    ['mousemove', 'keydown', 'click', 'scroll', 'touchstart'].forEach(function (ev) { window.addEventListener(ev, activity, {passive: true}); });
    document.getElementById('idleStay').addEventListener('click', function () {
        warned = false; box.style.display = 'none'; last = Date.now(); ping();
    });
    setInterval(function () {
        var idle = Date.now() - last;
        if (idle >= IDLE) { location.href = LOGIN; return; }
        if (idle >= IDLE - LEAD) { warned = true; box.style.display = 'flex'; cnt.textContent = Math.max(0, Math.ceil((IDLE - idle) / 1000)); }
    }, 1000);
})();
</script>
<?php endif; ?>
</body>
</html>
<?php
}
