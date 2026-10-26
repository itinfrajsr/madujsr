<?php
/* =========================================================
   LOADER DATA FRONTEND
   Mengembalikan struktur yang sama dengan array hardcode lama
   di index.php, sehingga JavaScript yang ada tetap berfungsi.
========================================================= */
function cms_rows(string $table, bool $onlyActive = true): array
{
    $sql = "SELECT * FROM $table" . ($onlyActive ? ' WHERE active = 1' : '') . ' ORDER BY sort ASC, id ASC';
    return db()->query($sql)->fetchAll();
}

function cms_bi(array $r, string $base): array
{
    $id = (string)($r[$base . '_id'] ?? '');
    $en = (string)($r[$base . '_en'] ?? '');
    return ['id' => $id, 'en' => $en !== '' ? $en : $id];
}

// "a|b|c" per baris -> array of arrays (kolom kurang diisi dengan kolom terakhir)
function cms_parse_lines(string $s, int $cols): array
{
    $out = [];
    foreach (preg_split('/\R/', $s) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $p = array_map('trim', explode('|', $line, $cols));
        while (count($p) < $cols) $p[] = $p[count($p) - 1];
        $out[] = $p;
    }
    return $out;
}

// Posisi logo bawaan (acuan layar 1918x876) untuk 6 produk lama; dipakai bila koordinat belum diisi.
function cms_logo_presets(): array
{
    return [
        'logo-hexabrain'  => [985, 500], 'logo-multiflora' => [985, 500], 'logo-sangket' => [985, 536],
        'logo-hitam'      => [885, 536], 'logo-gold'       => [989, 570], 'logo-imun'    => [987, 500],
    ];
}

// Koordinat logo untuk satu baris produk: dari kolom -> preset lama -> bawaan umum
function cms_logo_for(array $r): array
{
    $w = (float)($r['logo_w'] ?? 0); $h = (float)($r['logo_h'] ?? 0);
    if ($w > 0 && $h > 0) {
        return ['x' => (float)$r['logo_x'], 'y' => (float)$r['logo_y'], 'w' => $w, 'h' => $h];
    }
    $pre = cms_logo_presets()[$r['logo_class'] ?? ''] ?? [985, 500];
    return ['x' => $pre[0], 'y' => $pre[1], 'w' => 86, 'h' => 101];
}

function cms_load_products(): array
{
    $products = [];
    $details  = [];
    foreach (cms_rows('products') as $r) {
        $features = [];
        foreach (cms_parse_lines((string)$r['features'], 3) as $p) {
            $icon = preg_match('/^fa-[a-z0-9-]+$/', $p[0]) ? $p[0] : 'fa-star';
            $features[] = ['icon' => $icon, 'label_id' => $p[1], 'label_en' => $p[2]];
        }
        $name = cms_bi($r, 'name');
        $products[] = [
            'slug'              => $r['slug'],
            'img'               => $r['img'],
            'detail_img'        => $r['detail_img'],
            'mobile_detail_img' => $r['mobile_detail_img'],
            'class'             => $r['img_class'] !== '' ? $r['img_class'] : 'product-image',
            'alt'               => $r['alt'] !== '' ? $r['alt'] : $name['id'],
            'badge'             => cms_bi($r, 'badge'),
            'name'              => $name,
            'subtitle'          => cms_bi($r, 'subtitle'),
            'price'             => $r['price'],
            'price_note'        => cms_bi($r, 'price_note'),
            'desc'              => cms_bi($r, 'desc'),
            'features'          => $features,
            'link'              => $r['link'],
            'logo_class'        => $r['logo_class'],
            'logo'              => cms_logo_for($r),
        ];

        $fn = [];
        foreach (cms_parse_lines((string)$r['functions'], 2) as $p) $fn[] = ['id' => $p[0], 'en' => $p[1]];
        $d = [
            'tagline'       => cms_bi($r, 'tagline'),
            'relevance'     => cms_bi($r, 'relevance'),
            'function'      => $fn,
            'is_image_only' => (bool)$r['is_image_only'],
        ];
        if (trim((string)$r['long_desc_id']) !== '') $d['long_desc'] = cms_bi($r, 'long_desc');
        $details[] = $d;
    }
    return [$products, $details];
}

function cms_load_trust(): array
{
    $out = [];
    foreach (cms_rows('trusts') as $r) $out[] = cms_bi($r, 'text');
    return $out;
}

function cms_load_services(): array     { return cms_rows('services'); }
function cms_load_advantages(): array   { return cms_rows('advantages'); }
function cms_load_faqs(): array         { return cms_rows('faqs'); }

function cms_load_testimonials(): array
{
    $out = [];
    foreach (cms_rows('testimonials') as $r) {
        $tid = trim($r['text_id']);
        $ten = trim($r['text_en']) !== '' ? trim($r['text_en']) : $tid;
        $cut = function (string $t): array {
            if (mb_strlen($t) <= 130) return [$t, false];
            return [rtrim(mb_substr($t, 0, 125)) . '...', true];
        };
        [$sid, $long] = $cut($tid);
        [$sen]        = $cut($ten);
        $out[] = [
            'name'     => $r['name'],
            'role'     => cms_bi($r, 'role'),
            'full'     => ['id' => $tid, 'en' => $ten],
            'short'    => ['id' => $sid, 'en' => $sen],
            'long'     => $long,
            'photo'    => $r['photo'] !== '' ? $r['photo'] : 'assets/img/logo1.png',
            'stars'    => max(1, min(5, (int)$r['stars'])),
        ];
    }
    return $out;
}

function cms_page(string $slug): ?array
{
    $st = db()->prepare('SELECT * FROM pages WHERE slug = ?');
    $st->execute([$slug]);
    $r = $st->fetch();
    return $r ?: null;
}


/* ---------- Langkah Pemesanan (halaman Cara Pemesanan) ---------- */
function cms_step_icons(): array
{
    // kunci => [label, isi SVG 24x24 bergaya garis]
    return [
        'none'    => ['Tanpa ikon', ''],
        'search'  => ['Cari / produk', '<circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>'],
        'cart'    => ['Keranjang', '<circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>'],
        'pin'     => ['Lokasi / alamat', '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>'],
        'card'    => ['Pembayaran', '<rect width="20" height="14" x="2" y="5" rx="2"/><path d="M2 10h20"/>'],
        'truck'   => ['Pengiriman', '<path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/>'],
        'package' => ['Paket / pesanan', '<path d="m7.5 4.27 9 5.15"/><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/>'],
        'check'   => ['Selesai / centang', '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>'],
        'phone'   => ['Telepon', '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>'],
        'message' => ['Chat', '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>'],
        'gift'    => ['Hadiah', '<rect x="3" y="8" width="18" height="4" rx="1"/><path d="M12 8v13"/><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/>'],
        'clock'   => ['Waktu', '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>'],
        'heart'   => ['Favorit', '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>'],
        'user'    => ['Akun', '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>'],
        'list'    => ['Daftar', '<path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>'],
    ];
}
function cms_step_icon_labels(): array
{
    $o = [];
    foreach (cms_step_icons() as $k => $v) $o[$k] = $v[0];
    return $o;
}
/** HTML daftar langkah untuk bahasa $lang ('id'|'en'). Semua teks di-escape. */
function cms_steps_html(string $lang): string
{
    $rows = cms_rows('order_steps');
    if (!$rows) return '';
    $icons = cms_step_icons();
    $h = '<div class="steps">';
    foreach ($rows as $r) {
        $t = (string)$r['title_' . $lang]; if ($t === '') $t = (string)$r['title_id'];
        $d = (string)$r['text_' . $lang];  if ($d === '') $d = (string)$r['text_id'];
        $svg = $icons[$r['icon']][1] ?? '';
        $h .= '<div class="step">'
            . '<span class="step-ic">' . ($svg !== '' ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $svg . '</svg>' : '') . '</span>'
            . '<div class="step-tx"><strong>' . htmlspecialchars($t, ENT_QUOTES, 'UTF-8') . '</strong>'
            . ($d !== '' ? '<span>' . nl2br(htmlspecialchars($d, ENT_QUOTES, 'UTF-8')) . '</span>' : '') . '</div></div>';
    }
    return $h . '</div>';
}
