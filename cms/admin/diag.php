<?php
/* Alat diagnosa: mencari jenis kiriman (POST) mana yang diblokir oleh hosting.
   Buka /cms/admin/diag.php setelah login, klik "Jalankan tes", lalu kirim hasilnya. Boleh dihapus setelah selesai. */
require __DIR__ . '/_init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/plain; charset=utf-8');
    echo 'OK len=' . strlen((string)file_get_contents('php://input')) . ' post=' . count($_POST) . ' files=' . count($_FILES);
    exit;
}
admin_header('Diagnosa kiriman form', 'dashboard');
?>
<h1>Diagnosa kiriman form</h1>
<p class="sub">Tes ini mengirim beberapa jenis POST ke server Anda dan mencatat mana yang ditolak (403).</p>
<div class="card">
    <button class="btn" id="run" type="button">Jalankan tes</button>
    <table style="margin-top:14px"><thead><tr><th>Tes</th><th>Status</th><th>Hasil</th></tr></thead><tbody id="out"></tbody></table>
    <p class="muted" id="sum" style="margin-top:12px"></p>
</div>
<script>
(function () {
    var URL0 = location.pathname.replace(/\/[^\/]*$/, '/') + 'diag.php';
    function big(n) { var s = ''; while (s.length < n) s += 'Madu JSR lorem ipsum dolor sit amet '; return s.slice(0, n); }
    function multi(fields, withEmptyFile) {
        var fd = new FormData();
        Object.keys(fields).forEach(function (k) { fd.append(k, fields[k]); });
        if (withEmptyFile) fd.append('banner__file', new Blob([]), '');
        return fd;
    }
    var tests = [
        ['1. urlencoded, kecil', URL0, function () { return {method: 'POST', body: new URLSearchParams({a: 'b'})}; }],
        ['2. urlencoded, 5 KB teks biasa', URL0, function () { return {method: 'POST', body: new URLSearchParams({a: big(5000)})}; }],
        ['3. urlencoded, tanda kutip & HTML', URL0, function () { return {method: 'POST', body: new URLSearchParams({a: "nature's <strong>x</strong> people's \"y\"; select 1 from z"})}; }],
        ['4. multipart, tanpa file', URL0, function () { return {method: 'POST', body: multi({a: 'b'}, false)}; }],
        ['5. multipart, file kosong (seperti form CMS)', URL0, function () { return {method: 'POST', body: multi({a: 'b', _csrf: 'x'}, true)}; }],
        ['6. multipart, 5 KB teks', URL0, function () { return {method: 'POST', body: multi({a: big(5000)}, true)}; }],
        ['7. multipart, tanda kutip & HTML', URL0, function () { return {method: 'POST', body: multi({a: "nature's <strong>x</strong> people's \"y\""}, true)}; }],
        ['8. urlencoded + query string seperti form (?e=pages&a=form&id=1)', URL0 + '?e=pages&a=form&id=1', function () { return {method: 'POST', body: new URLSearchParams({a: 'b'})}; }],
        ['9. multipart ke crud.php (isi kosong; 419 dari CMS = normal)', URL0.replace('diag.php', 'crud.php') + '?e=pages&a=form&id=1', function () { return {method: 'POST', body: multi({a: 'b'}, true)}; }],
        ['10. multipart ke crud (tanpa .php)', URL0.replace('diag.php', 'crud') + '?e=pages&a=form&id=1', function () { return {method: 'POST', body: multi({a: 'b'}, true)}; }]
    ];
    var out = document.getElementById('out'), sum = document.getElementById('sum'), btn = document.getElementById('run');
    function row(name, status, note) {
        var tr = document.createElement('tr');
        [name, status, note].forEach(function (t) { var td = document.createElement('td'); td.textContent = t; tr.appendChild(td); });
        out.appendChild(tr);
    }
    btn.addEventListener('click', async function () {
        btn.disabled = true; out.innerHTML = ''; sum.textContent = '';
        var res = [];
        for (var i = 0; i < tests.length; i++) {
            var t = tests[i], st = '?', note = '';
            try {
                var o = t[2](); o.credentials = 'same-origin'; o.redirect = 'manual';
                var r = await fetch(t[1], o);
                st = r.type === 'opaqueredirect' ? 'redirect' : String(r.status);
                if (r.type !== 'opaqueredirect') {
                    var txt = await r.text();
                    note = /openresty/i.test(txt) ? 'DIBLOKIR oleh server depan (openresty)' : (/^OK/.test(txt) ? txt : txt.replace(/\s+/g, ' ').slice(0, 80));
                } else note = 'dialihkan (POST bisa berubah menjadi GET)';
            } catch (e) { st = 'error'; note = String(e); }
            res.push(t[0] + ' => ' + st + (note ? ' (' + note + ')' : ''));
            row(t[0], st, note);
        }
        sum.textContent = 'Salin seluruh tabel ini dan kirim ke pengembang.';
        btn.disabled = false;
    });
})();
</script>
<?php admin_footer();
