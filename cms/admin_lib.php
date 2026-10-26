<?php
/* =========================================================
   LIBRARY PANEL ADMIN: upload, validasi form, render field
========================================================= */

/* ---------- Upload gambar ---------- */
/* .htaccess pelindung folder unggahan (script tidak boleh dijalankan).
   Hanya memakai direktif kategori FileInfo agar tidak menimbulkan error 500 di server
   yang membatasi AllowOverride. Versi lama (yang memuat "Options") otomatis diganti. */
function cms_upload_guard(string $dir): void
{
    $ht  = $dir . '/.htaccess';
    $tag = '# madujsr-uploads v2';
    $cur = is_file($ht) ? (string)@file_get_contents($ht) : '';
    if (strpos($cur, $tag) !== false) return;
    $body = $tag . "\n"
        . "# Folder unggahan: file script tidak boleh dijalankan.\n"
        . "<IfModule mod_mime.c>\n"
        . "  RemoveHandler .php .phtml .phar .php3 .php4 .php5 .php7 .php8\n"
        . "  RemoveType .php .phtml .phar .php3 .php4 .php5 .php7 .php8\n"
        . "</IfModule>\n"
        . "<FilesMatch \"\\.(php|phtml|phar|php[0-9])$\">\n"
        . "  ForceType text/plain\n"
        . "  SetHandler default-handler\n"
        . "</FilesMatch>\n";
    @file_put_contents($ht, $body);
}

function cms_upload_image(array $file): ?string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) return null;
    if ($file['error'] !== UPLOAD_ERR_OK) throw new RuntimeException('Upload gagal (kode ' . (int)$file['error'] . ').');
    if ($file['size'] > MAX_UPLOAD) throw new RuntimeException('Ukuran gambar maksimal ' . round(MAX_UPLOAD / 1048576) . ' MB.');

    $info = @getimagesize($file['tmp_name']);
    $map  = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    if (!$info || !isset($map[$info['mime']])) throw new RuntimeException('File harus berupa gambar JPG, PNG, WebP, atau GIF.');

    if (!is_dir(UPLOAD_DIR) && !@mkdir(UPLOAD_DIR, 0755, true)) throw new RuntimeException('Folder unggahan tidak bisa dibuat: ' . UPLOAD_URL);
    cms_upload_guard(UPLOAD_DIR);

    $name = date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.' . $map[$info['mime']];
    $moved = !empty($file['b64'])
        ? (@rename($file['tmp_name'], UPLOAD_DIR . '/' . $name) || (@copy($file['tmp_name'], UPLOAD_DIR . '/' . $name) && @unlink($file['tmp_name'])))
        : move_uploaded_file($file['tmp_name'], UPLOAD_DIR . '/' . $name);
    if (!$moved) throw new RuntimeException('Gagal menyimpan file unggahan.');
    @chmod(UPLOAD_DIR . '/' . $name, 0644);
    return UPLOAD_URL . '/' . $name;
}

// path/URL gambar yang diketik manual
function cms_clean_path(string $v): ?string
{
    $v = trim($v);
    if ($v === '') return '';
    if (preg_match('~^https?://[^\s"\'<>]+$~i', $v)) return $v;
    if (strpos($v, '..') !== false || !preg_match('~^[A-Za-z0-9_@\-\./ %()\[\]+,]+$~', $v)) return null;
    return ltrim($v, '/');
}

// URL gambar untuk pratinjau di admin (admin ada di cms/admin/)
function cms_admin_img(string $p): string
{
    if ($p === '') return '';
    if (preg_match('~^https?://~i', $p)) return $p;
    return '../../' . str_replace(' ', '%20', $p);
}

/* ---------- Pengumpulan & validasi data form ---------- */
function cms_collect_fields(array $fields, array $post, array $files, ?array $existing, ?PDO $pdo = null, ?string $table = null, int $id = 0): array
{
    $data = [];
    $err  = [];
    foreach ($fields as $f) {
        if (!empty($f['virtual'])) continue;
        $n    = $f['name'];
        $type = $f['type'];
        $raw  = isset($post[$n]) && is_string($post[$n]) ? $post[$n] : '';
        $label = $f['label'];
        $v = '';

        switch ($type) {
            case 'bool':
                $v = isset($post[$n]) ? 1 : 0;
                break;

            case 'number':
                $s = trim($raw);
                if ($s === '') { $v = $f['default'] ?? 0; break; }
                if (!is_numeric($s)) { $err[] = "$label harus berupa angka."; $v = 0; break; }
                $v = $s + 0;
                if (isset($f['min']) && $v < $f['min']) $v = $f['min'];
                if (isset($f['max']) && $v > $f['max']) $v = $f['max'];
                break;

            case 'color':
                $v = trim($raw);
                if ($v !== '' && preg_match('/^#[0-9a-fA-F]{3}$/', $v)) $v = '#' . $v[1] . $v[1] . $v[2] . $v[2] . $v[3] . $v[3];
                if ($v !== '' && !preg_match('/^#[0-9a-fA-F]{6}$/', $v)) { $err[] = "$label harus berupa kode warna hex, mis. #E9B949."; $v = $existing[$n] ?? ''; }
                break;

            case 'select':
                $v = $raw;
                if (!array_key_exists($n, $post)) {
                    // field tidak ikut terkirim (mis. form dibuka sebelum update): pertahankan nilai lama / bawaan, bukan error
                    $v = (string)($existing[$n] ?? ($f['default'] ?? array_key_first($f['options'])));
                } elseif (!array_key_exists($v, $f['options'])) { $err[] = "$label tidak valid."; $v = $f['default'] ?? ''; }
                break;

            case 'slug':
                if (!empty($f['readonly_on_edit']) && $existing) { $v = $existing[$n]; break; }
                $v = strtolower(trim($raw));
                if ($v !== '' && !preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', $v)) { $err[] = "$label hanya boleh huruf kecil, angka, dan tanda minus."; break; }
                if ($v !== '' && $pdo && $table) {
                    $st = $pdo->prepare("SELECT id FROM $table WHERE $n = ? AND id <> ?");
                    $st->execute([$v, $id]);
                    if ($st->fetch()) $err[] = "$label \"$v\" sudah dipakai.";
                }
                break;

            case 'url':
                $v = trim($raw);
                if ($v !== '' && !preg_match('~^https?://[^\s"\'<>]+$~i', $v)) $err[] = "$label harus diawali http:// atau https://";
                break;

            case 'image':
                $v = cms_clean_path($raw);
                if ($v === null) { $err[] = "$label: path gambar tidak valid."; $v = $existing[$n] ?? ''; }
                try {
                    $up = isset($files[$n . '__file']) ? cms_upload_image($files[$n . '__file']) : null;
                    if ($up !== null) $v = $up;
                } catch (RuntimeException $ex) {
                    $err[] = "$label: " . $ex->getMessage();
                }
                break;

            default: // text, textarea, lines
                $v = str_replace("\r\n", "\n", trim($raw));
                $max = $type === 'text' ? 400 : 40000;
                if (strlen($v) > $max) { $err[] = "$label terlalu panjang."; $v = substr($v, 0, $max); }
        }

        if (!empty($f['required']) && ($v === '' || $v === null)) $err[] = "$label wajib diisi.";
        $data[$n] = $v;
    }
    return [$data, $err];
}

/* ---------- Render field form ---------- */
function cms_render_field(array $f, $val, bool $isEdit): string
{
    $n     = $f['name'];
    $id    = 'f_' . $n;
    $type  = $f['type'];
    $req   = !empty($f['required']) ? ' <span class="req">*</span>' : '';
    $help  = !empty($f['help']) ? '<small class="help">' . e($f['help']) . '</small>' : '';
    $ro    = (!empty($f['readonly_on_edit']) && $isEdit) ? ' readonly' : '';
    $label = '<label for="' . $id . '">' . e($f['label']) . $req . '</label>';
    $val   = (string)$val;

    switch ($type) {
        case 'titlepicker':
            return '<div class="field"><label>' . e($f['label']) . '</label>' . cms_title_picker_html() . $help . '</div>';

        case 'logopicker':
            return '<div class="field"><label>' . e($f['label']) . '</label>' . cms_logo_picker_html() . $help . '</div>';

        case 'textarea':
        case 'lines':
            $rows = (int)($f['rows'] ?? 4);
            $mono = $type === 'lines' ? ' class="mono"' : '';
            return '<div class="field">' . $label . '<textarea id="' . $id . '" name="' . e($n) . '" rows="' . $rows . '"' . $mono . '>' . e($val) . '</textarea>' . $help . '</div>';

        case 'number':
            $attrs = '';
            if (isset($f['min'])) $attrs .= ' min="' . (float)$f['min'] . '"';
            if (isset($f['max'])) $attrs .= ' max="' . (float)$f['max'] . '"';
            return '<div class="field">' . $label . '<input type="number" step="any" id="' . $id . '" name="' . e($n) . '" value="' . e($val) . '"' . $attrs . '>' . $help . '</div>';

        case 'bool':
            return '<div class="field"><label class="check"><input type="checkbox" id="' . $id . '" name="' . e($n) . '" value="1"' . ($val === '1' ? ' checked' : '') . '> ' . e($f['label']) . '</label>' . $help . '</div>';

        case 'color':
            $pick = preg_match('/^#[0-9a-fA-F]{6}$/', $val) ? $val : '#000000';
            return '<div class="field">' . $label . '<div style="display:flex;gap:10px;align-items:center">'
                . '<input type="color" value="' . e($pick) . '" style="width:54px;height:40px;padding:2px;flex:0 0 auto" oninput="document.getElementById(\'' . $id . '\').value=this.value">'
                . '<input type="text" id="' . $id . '" name="' . e($n) . '" value="' . e($val) . '" maxlength="7" placeholder="#RRGGBB" style="max-width:160px"'
                . ' oninput="if(/^#[0-9a-fA-F]{6}$/.test(this.value))this.previousElementSibling.value=this.value">'
                . '</div>' . $help . '</div>';

        case 'select':
            $o = '';
            foreach ($f['options'] as $k => $t) $o .= '<option value="' . e($k) . '"' . ((string)$k === $val ? ' selected' : '') . '>' . e($t) . '</option>';
            return '<div class="field">' . $label . '<select id="' . $id . '" name="' . e($n) . '">' . $o . '</select>' . $help . '</div>';

        case 'image':
            $src = cms_admin_img($val);
            return '<div class="field">' . $label
                . '<div class="imgfield"><img class="imgprev" src="' . e($src) . '" alt=""' . ($src === '' ? ' hidden' : '') . '>'
                . '<div class="imgin">'
                . '<input type="text" id="' . $id . '" name="' . e($n) . '" value="' . e($val) . '" placeholder="assets/img/... atau https://...">'
                . '<input type="file" name="' . e($n) . '__file" accept="image/jpeg,image/png,image/webp,image/gif">'
                . '</div></div>' . $help . '</div>';

        default: // text, url, slug
            $t = $type === 'url' ? 'url' : 'text';
            return '<div class="field">' . $label . '<input type="' . $t . '" id="' . $id . '" name="' . e($n) . '" value="' . e($val) . '"' . $ro . '>' . $help . '</div>';
    }
}

// Render daftar field; pasangan *_id / *_en ditaruh berdampingan
function cms_render_fields(array $fields, array $values, bool $isEdit): string
{
    $out = '';
    $lastGroup = null;
    $count = count($fields);
    for ($i = 0; $i < $count; $i++) {
        $f = $fields[$i];
        if (!empty($f['group']) && $f['group'] !== $lastGroup) {
            $out .= '<h3 class="group">' . e($f['group']) . '</h3>';
            $lastGroup = $f['group'];
        }
        $next = $fields[$i + 1] ?? null;
        $pair = $next && substr($f['name'], -3) === '_id' && substr($next['name'], -3) === '_en'
            && substr($f['name'], 0, -3) === substr($next['name'], 0, -3)
            && empty($next['group']) && !in_array($f['type'], ['image', 'bool'], true);
        $get = function ($ff) use ($values) { return $values[$ff['name']] ?? ($ff['default'] ?? ''); };
        if ($pair) {
            $out .= '<div class="pair">' . cms_render_field($f, $get($f), $isEdit) . cms_render_field($next, $get($next), $isEdit) . '</div>';
            $i++;
        } else {
            $out .= cms_render_field($f, $get($f), $isEdit);
        }
    }
    return $out;
}


/* ---------- Pratinjau interaktif posisi logo (halaman Produk) ---------- */
function cms_title_picker_html(): string
{
    static $n = 0;
    if ($n++) return '';
    return '<div class="tp-tabs"><button type="button" class="btn ghost sm tp-tab active" data-m="d">Desktop</button> '
        . '<button type="button" class="btn ghost sm tp-tab" data-m="m">HP (mobile)</button> '
        . '<button type="button" class="btn ghost sm" id="tpReset">Kosongkan posisi mode ini</button></div>'
        . '<div class="tp-wrap"><div class="tp" id="tp"><div class="tp-empty" id="tpEmpty">Isi <b>Gambar banner</b> di atas untuk melihat pratinjau.</div>'
        . '<div class="tp-title" id="tpTitle">Judul</div></div></div>'
        . '<div class="lp-info" id="tpInfo"></div>'
        . '<script>
document.addEventListener("DOMContentLoaded", function () {
    var box = document.getElementById("tp"); if (!box) return;
    var title = document.getElementById("tpTitle"), empty = document.getElementById("tpEmpty"), info = document.getElementById("tpInfo");
    var $ = function (id) { return document.getElementById(id); };
    var F = {d: {x: $("f_title_x"), y: $("f_title_y")}, m: {x: $("f_title_x_m"), y: $("f_title_y_m")}};
    var src = $("f_banner"), fileIn = document.querySelector("input[name=banner__file]"), tid = $("f_title_id"), sz = $("f_title_size"), slug = $("f_slug");
    if (!F.d.x || !F.d.y || !F.m.x || !F.m.y) return;
    var mode = "d";
    // acuan: desktop 1400 x 400 (huruf 56px), HP 375 x 260 (huruf ~34px)
    var REF = {d: {w: 1400, h: 400, fs: 56}, m: {w: 375, h: 260, fs: 34}};
    var MULT = {"": 1, sm: 0.68, lg: 1.29, xl: 1.71};
    function num(el) { var t = (el.value || "").trim(); if (t === "" || isNaN(t)) return null; return Math.max(0, Math.min(100, parseFloat(t))); }
    function pos() {
        var o = F[mode], x = num(o.x), y = num(o.y);
        if (mode === "m") { if (x === null) x = num(F.d.x); if (y === null) y = num(F.d.y); }
        return [x === null ? 50 : x, y === null ? 50 : y];
    }
    function layout() {
        var r = REF[mode], wrap = box.parentNode.clientWidth || 600;
        var w = Math.min(mode === "d" ? 960 : 375, wrap);
        box.style.width = w + "px"; box.style.height = (w * r.h / r.w) + "px";
    }
    function draw() {
        layout();
        var r = REF[mode], s = box.clientWidth / r.w, p = pos();
        var m = MULT[sz ? sz.value : ""] || 1;
        if (mode === "m" && slug && slug.value === "cara-pemesanan") m *= 28.8 / 34;
        title.style.fontSize = (r.fs * m * s) + "px";
        title.style.left = p[0] + "%"; title.style.top = p[1] + "%";
        title.textContent = (tid && tid.value.trim()) || "Judul";
        var o = F[mode], own = num(o.x) !== null || num(o.y) !== null;
        info.textContent = (mode === "d" ? "Desktop" : "HP") + " · X " + Math.round(p[0]) + "% · Y " + Math.round(p[1]) + "%"
            + (mode === "m" && !own ? " (mengikuti posisi desktop; klik pratinjau untuk membuat posisi khusus HP)" : "")
            + (num(F.d.x) === null && num(F.d.y) === null && !own ? " · bawaan: tengah" : "");
    }
    function setImg(u) {
        box.style.backgroundImage = u ? "url(\"" + u.replace(/"/g, "%22") + "\")" : "none";
        empty.hidden = !!u;
    }
    function fromText() {
        var v = (src.value || "").trim();
        setImg(!v ? "" : (/^https?:\/\//i.test(v) ? v : "../../" + v.replace(/ /g, "%20")));
    }
    if (src) { src.addEventListener("input", fromText); src.addEventListener("change", fromText); fromText(); }
    if (fileIn) fileIn.addEventListener("change", function () { if (fileIn.files && fileIn.files[0]) setImg(URL.createObjectURL(fileIn.files[0])); });
    [F.d.x, F.d.y, F.m.x, F.m.y, tid, sz].forEach(function (el) { if (el) { el.addEventListener("input", draw); el.addEventListener("change", draw); } });
    window.addEventListener("resize", draw);
    document.querySelectorAll(".tp-tab").forEach(function (b) {
        b.addEventListener("click", function () {
            mode = b.getAttribute("data-m");
            document.querySelectorAll(".tp-tab").forEach(function (x) { x.classList.toggle("active", x === b); });
            draw();
        });
    });
    $("tpReset").addEventListener("click", function () { F[mode].x.value = ""; F[mode].y.value = ""; draw(); });
    var down = false;
    function move(ev) {
        var rc = box.getBoundingClientRect();
        var x = Math.max(0, Math.min(100, (ev.clientX - rc.left) / rc.width * 100));
        var y = Math.max(0, Math.min(100, (ev.clientY - rc.top) / rc.height * 100));
        F[mode].x.value = Math.round(x); F[mode].y.value = Math.round(y);
        draw();
    }
    box.addEventListener("pointerdown", function (ev) { down = true; box.setPointerCapture(ev.pointerId); move(ev); ev.preventDefault(); });
    box.addEventListener("pointermove", function (ev) { if (down) move(ev); });
    box.addEventListener("pointerup", function () { down = false; });
    box.addEventListener("pointercancel", function () { down = false; });
    draw();
});
</script>';
}

function cms_logo_picker_html(): string
{
    static $n = 0;
    if ($n++) return '';
    $logo = 'assets/img/Logo_JSR_Store.png';
    return '<div class="lp" id="lp"><img id="lpImg" alt="" hidden>'
        . '<div class="lp-empty" id="lpEmpty">Isi <b>Gambar halaman detail (desktop)</b> di atas untuk melihat pratinjau.</div>'
        . '<img id="lpLogo" class="lp-logo" alt="Logo" src="../../' . e($logo) . '" draggable="false"></div>'
        . '<div class="lp-info" id="lpInfo"></div>'
        . '<script>
document.addEventListener("DOMContentLoaded", function () {
    var REF_W = 1918, REF_H = 876;
    var box = document.getElementById("lp"), img = document.getElementById("lpImg"),
        empty = document.getElementById("lpEmpty"), logo = document.getElementById("lpLogo"),
        info = document.getElementById("lpInfo");
    var F = {x: document.getElementById("f_logo_x"), y: document.getElementById("f_logo_y"),
             w: document.getElementById("f_logo_w"), h: document.getElementById("f_logo_h")};
    var src = document.getElementById("f_detail_img");
    var fileIn = document.querySelector("input[name=detail_img__file]");
    if (!box || !F.x || !F.y || !F.w || !F.h) return;

    function num(el, d) { var v = parseFloat(el.value); return isFinite(v) ? v : d; }
    function draw() {
        var s = box.clientWidth / REF_W;
        var x = num(F.x, 0), y = num(F.y, 0), w = Math.max(1, num(F.w, 86)), h = Math.max(1, num(F.h, 101));
        logo.style.left = x * s + "px"; logo.style.top = y * s + "px";
        logo.style.width = w * s + "px"; logo.style.height = h * s + "px";
        info.textContent = "X " + Math.round(x) + " · Y " + Math.round(y) + " · " + Math.round(w) + " × " + Math.round(h) + " px (acuan 1918 × 876)";
    }
    function setImg(u) {
        if (!u) { img.hidden = true; empty.hidden = false; return; }
        img.src = u; img.hidden = false; empty.hidden = true;
    }
    function fromText() {
        var v = (src.value || "").trim();
        setImg(!v ? "" : (/^https?:\/\//i.test(v) ? v : "../../" + v.replace(/ /g, "%20")));
    }
    if (src) { src.addEventListener("change", fromText); src.addEventListener("input", fromText); fromText(); }
    if (fileIn) fileIn.addEventListener("change", function () {
        if (fileIn.files && fileIn.files[0]) setImg(URL.createObjectURL(fileIn.files[0]));
    });
    ["x", "y", "w", "h"].forEach(function (k) { F[k].addEventListener("input", draw); });
    window.addEventListener("resize", draw);

    var down = false;
    function move(ev) {
        var r = box.getBoundingClientRect(), s = r.width / REF_W;
        var w = Math.max(1, num(F.w, 86)), h = Math.max(1, num(F.h, 101));
        F.x.value = Math.round((ev.clientX - r.left) / s - w / 2);
        F.y.value = Math.round((ev.clientY - r.top) / s - h / 2);
        draw();
    }
    box.addEventListener("pointerdown", function (ev) { down = true; box.setPointerCapture(ev.pointerId); move(ev); ev.preventDefault(); });
    box.addEventListener("pointermove", function (ev) { if (down) move(ev); });
    box.addEventListener("pointerup", function () { down = false; });
    box.addEventListener("pointercancel", function () { down = false; });
    draw();
});
</script>';
}
