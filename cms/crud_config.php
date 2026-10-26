<?php
/* =========================================================
   DEFINISI ENTITAS (satu sumber kebenaran)
   - Dipakai untuk membuat tabel database otomatis
   - Dipakai untuk membuat form & daftar di panel admin
   Menambah field baru cukup menambah baris di sini; kolom
   database akan ditambahkan otomatis.
   Tipe field: text, textarea, number, bool, image, url,
               select, slug, lines
========================================================= */
function fld(string $name, string $label, string $type = 'text', array $extra = []): array
{
    return array_merge(['name' => $name, 'label' => $label, 'type' => $type], $extra);
}

function cms_entities(): array
{
    static $E = null;
    if ($E !== null) return $E;

    $imgClass = [
        'product-image'  => 'Standar',
        'product-image1' => 'Kompak (varian 1)',
        'product-image2' => 'Kompak (varian 2)',
        'product-image3' => 'Kompak (varian 3)',
        'product-image4' => 'Kompak (varian 4)',
    ];
    $logoClass = [
        ''               => '(tanpa posisi logo khusus)',
        'logo-multiflora' => 'logo-multiflora',
        'logo-sangket'    => 'logo-sangket',
        'logo-hitam'      => 'logo-hitam',
        'logo-hexabrain'  => 'logo-hexabrain',
        'logo-gold'       => 'logo-gold',
        'logo-imun'       => 'logo-imun',
    ];

    $E = [
        /* ---------------------------------------------- PRODUK */
        'products' => [
            'label' => 'Produk', 'singular' => 'produk', 'table' => 'products',
            'title_field' => 'name_id',
            'list' => [
                'img'      => ['Gambar', 'image'],
                'name_id'  => ['Nama', 'text'],
                'badge_id' => ['Badge', 'text'],
                'slug'     => ['Slug', 'text'],
            ],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('slug', 'Slug URL', 'slug', ['required' => 1, 'group' => 'Informasi dasar',
                    'help' => 'Huruf kecil, angka, tanda minus. Dipakai sebagai alamat halaman produk (#slug), mis. madu-multiflora.']),
                fld('name_id', 'Nama (ID)', 'text', ['required' => 1]),
                fld('name_en', 'Nama (EN)'),
                fld('badge_id', 'Badge (ID)'),
                fld('badge_en', 'Badge (EN)'),
                fld('subtitle_id', 'Subjudul (ID)'),
                fld('subtitle_en', 'Subjudul (EN)'),
                fld('desc_id', 'Deskripsi singkat (ID)', 'textarea'),
                fld('desc_en', 'Deskripsi singkat (EN)', 'textarea'),
                fld('link', 'Link beli (JSR Store)', 'url', ['help' => 'Contoh: https://jsrstore.id/products/detail/madu-...']),

                fld('img', 'Gambar carousel (botol produk)', 'image', ['group' => 'Gambar',
                    'help' => 'Unggah gambar baru, atau isi path/URL yang sudah ada.']),
                fld('img_class', 'Ukuran gambar carousel', 'select', ['options' => $imgClass, 'default' => 'product-image']),
                fld('alt', 'Teks alternatif gambar (alt)'),
                fld('detail_img', 'Gambar halaman detail (desktop)', 'image'),
                fld('mobile_detail_img', 'Gambar halaman detail (mobile, opsional)', 'image'),
                fld('is_image_only', 'Halaman detail hanya berupa gambar penuh', 'bool', ['default' => 1,
                    'help' => 'Aktif = detail produk tampil sebagai poster/gambar penuh (seperti sekarang). Nonaktif = tampil dengan teks, fitur, dan akordeon.']),
                fld('logo_picker', 'Posisi logo JSR Store', 'logopicker', ['virtual' => 1,
                    'help' => 'Klik atau seret pada gambar untuk menaruh logo tepat di slot yang kosong pada poster. Pratinjau mengikuti layar desktop (1918x876).']),
                fld('logo_x', 'Logo: posisi X', 'number', ['default' => 985, 'step' => 1]),
                fld('logo_y', 'Logo: posisi Y', 'number', ['default' => 500, 'step' => 1]),
                fld('logo_w', 'Logo: lebar', 'number', ['default' => 86, 'step' => 1]),
                fld('logo_h', 'Logo: tinggi', 'number', ['default' => 101, 'step' => 1]),
                fld('logo_class', 'Preset posisi lama (opsional)', 'select', ['options' => $logoClass, 'default' => '',
                    'help' => 'Hanya dipakai bila X/Y/lebar/tinggi di atas kosong (0). Abaikan untuk produk baru.']),

                fld('features', 'Fitur unggulan (3 ikon)', 'lines', ['group' => 'Detail (mode teks)', 'rows' => 4,
                    'help' => 'Satu baris satu fitur: ikon|label ID|label EN. Contoh: fa-shield|Daya Tahan Harian|Daily Defense. Ikon: Font Awesome 4.7 (fa-heart, fa-leaf, fa-star, fa-medkit, fa-shield, ...).']),
                fld('tagline_id', 'Tagline (ID)'),
                fld('tagline_en', 'Tagline (EN)'),
                fld('relevance_id', 'Cocok untuk siapa (ID)', 'textarea'),
                fld('relevance_en', 'Cocok untuk siapa (EN)', 'textarea'),
                fld('functions', 'Fungsi / digunakan untuk', 'lines', ['rows' => 4,
                    'help' => 'Satu baris satu poin: teks ID|teks EN']),
                fld('long_desc_id', 'Deskripsi panjang (ID)', 'textarea', ['rows' => 10,
                    'help' => 'Baris kosong = paragraf baru. Kosongkan untuk memakai deskripsi singkat.']),
                fld('long_desc_en', 'Deskripsi panjang (EN)', 'textarea', ['rows' => 10]),
                fld('price', 'Harga (opsional)', 'text', ['help' => 'Kosongkan untuk menyembunyikan harga. Contoh: Rp 120.000']),
                fld('price_note_id', 'Catatan harga (ID)'),
                fld('price_note_en', 'Catatan harga (EN)'),
            ],
        ],

        /* ------------------------------------ LAYANAN / HIGHLIGHT */
        'services' => [
            'label' => 'Highlight (4 kotak)', 'singular' => 'highlight', 'table' => 'services',
            'title_field' => 'title_id',
            'list' => ['title_id' => ['Judul', 'text'], 'text_id' => ['Teks', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('title_id', 'Judul (ID)', 'text', ['required' => 1]),
                fld('title_en', 'Judul (EN)'),
                fld('text_id', 'Teks (ID)', 'textarea'),
                fld('text_en', 'Teks (EN)', 'textarea'),
                fld('bg_image', 'Gambar latar kotak', 'image', ['help' => 'Gambar heksagon yang menjadi latar kotak.']),
            ],
        ],

        /* ------------------------------------------- KEUNGGULAN */
        'advantages' => [
            'label' => 'Keunggulan (kartu)', 'singular' => 'keunggulan', 'table' => 'advantages',
            'title_field' => 'title_id',
            'list' => ['stat' => ['Angka', 'text'], 'title_id' => ['Judul', 'text'], 'badge_id' => ['Badge', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('title_id', 'Judul (ID)', 'text', ['required' => 1]),
                fld('title_en', 'Judul (EN)'),
                fld('text_id', 'Isi (ID)', 'textarea', ['rows' => 5]),
                fld('text_en', 'Isi (EN)', 'textarea', ['rows' => 5]),
                fld('stat', 'Angka besar (opsional)', 'text', ['help' => 'Jika diisi, kartu menampilkan angka + badge. Jika kosong, kartu menampilkan ikon.']),
                fld('badge_id', 'Badge di bawah angka (ID)'),
                fld('badge_en', 'Badge di bawah angka (EN)'),
                fld('icon', 'Ikon (jika tanpa angka)', 'text', ['default' => 'fa-leaf', 'help' => 'Font Awesome 4.7, mis. fa-leaf, fa-flask, fa-star.']),
            ],
        ],

        /* --------------------------------------------- TESTIMONI */
        'testimonials' => [
            'label' => 'Testimoni', 'singular' => 'testimoni', 'table' => 'testimonials',
            'title_field' => 'name',
            'list' => ['photo' => ['Foto', 'image'], 'name' => ['Nama', 'text'], 'role_id' => ['Profesi', 'text'], 'text_id' => ['Testimoni', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('name', 'Nama', 'text', ['required' => 1]),
                fld('role_id', 'Profesi (ID)'),
                fld('role_en', 'Profesi (EN)'),
                fld('text_id', 'Testimoni (ID)', 'textarea', ['required' => 1, 'rows' => 5,
                    'help' => 'Teks panjang otomatis dipotong dengan tombol "Baca Selengkapnya".']),
                fld('text_en', 'Testimoni (EN)', 'textarea', ['rows' => 5]),
                fld('photo', 'Foto', 'image'),
                fld('stars', 'Bintang (1-5)', 'number', ['default' => 5, 'min' => 1, 'max' => 5]),
            ],
        ],

        /* ----------------------------------------------------- FAQ */
        'faqs' => [
            'label' => 'FAQ', 'singular' => 'FAQ', 'table' => 'faqs',
            'title_field' => 'q_id',
            'list' => ['q_id' => ['Pertanyaan', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('q_id', 'Pertanyaan (ID)', 'text', ['required' => 1]),
                fld('q_en', 'Pertanyaan (EN)'),
                fld('a_id', 'Jawaban (ID)', 'textarea', ['required' => 1, 'rows' => 8, 'help' => 'Baris kosong = paragraf baru.']),
                fld('a_en', 'Jawaban (EN)', 'textarea', ['rows' => 8]),
            ],
        ],

        /* ------------------------------------------ TRUST (DETAIL) */
        'trusts' => [
            'label' => 'Alasan Dipercaya', 'singular' => 'poin', 'table' => 'trusts',
            'title_field' => 'text_id',
            'list' => ['text_id' => ['Poin (ID)', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('text_id', 'Poin (ID)', 'text', ['required' => 1]),
                fld('text_en', 'Poin (EN)'),
            ],
        ],

        /* ---------------------------------------------- LANGKAH PEMESANAN */
        'steps' => [
            'label' => 'Langkah Pemesanan', 'singular' => 'langkah', 'table' => 'order_steps',
            'title_field' => 'title_id',
            'list' => ['title_id' => ['Judul langkah', 'text'], 'icon' => ['Ikon', 'text']],
            'sortable' => true, 'has_active' => true, 'can_create' => true, 'can_delete' => true,
            'fields' => [
                fld('icon', 'Ikon', 'select', ['default' => 'search', 'options' => cms_step_icon_labels()]),
                fld('title_id', 'Judul langkah (ID)', 'text', ['required' => 1]),
                fld('title_en', 'Judul langkah (EN)'),
                fld('text_id', 'Keterangan (ID)', 'textarea', ['rows' => 3]),
                fld('text_en', 'Keterangan (EN)', 'textarea', ['rows' => 3]),
            ],
        ],

        /* ---------------------------------------------- HALAMAN */
        'pages' => [
            'label' => 'Halaman Info', 'singular' => 'halaman', 'table' => 'pages',
            'title_field' => 'title_id',
            'list' => ['title_id' => ['Judul', 'text'], 'slug' => ['Slug', 'text']],
            'sortable' => false, 'has_active' => false, 'can_create' => false, 'can_delete' => false,
            'fields' => [
                fld('slug', 'Slug', 'slug', ['required' => 1, 'readonly_on_edit' => 1,
                    'help' => 'Tidak dapat diubah (dipakai oleh menu footer).']),
                fld('title_id', 'Judul (ID)', 'text', ['required' => 1]),
                fld('title_en', 'Judul (EN)'),
                fld('banner', 'Gambar banner', 'image'),
                fld('side_image', 'Gambar kolom kedua (opsional)', 'image',
                    ['help' => 'Jika diisi, halaman tampil 2 kolom: isi di kiri, gambar ini di kanan (di HP gambar turun ke bawah teks). Kosongkan untuk 1 kolom.']),
                fld('title_x', 'Judul banner: posisi X (%)', 'text', ['default' => '',
                    'help' => 'Angka 0-100 = jarak titik tengah judul dari sisi kiri banner. 0 = rapat kiri, 50 = tengah, 100 = rapat kanan. Kosongkan untuk posisi bawaan (tengah).']),
                fld('title_y', 'Judul banner: posisi Y (%)', 'text', ['default' => '',
                    'help' => 'Angka 0-100 = jarak titik tengah judul dari sisi atas banner. 0 = atas, 50 = tengah, 100 = bawah. Kosongkan untuk posisi bawaan (tengah).']),
                fld('title_x_m', 'Judul banner: posisi X di HP (%)', 'text', ['default' => '',
                    'help' => 'Khusus layar HP (lebar 767px ke bawah). Kosongkan untuk memakai posisi X di atas.']),
                fld('title_y_m', 'Judul banner: posisi Y di HP (%)', 'text', ['default' => '',
                    'help' => 'Khusus layar HP. Kosongkan untuk memakai posisi Y di atas.']),
                fld('title_picker', 'Pratinjau & atur posisi judul banner', 'titlepicker', ['virtual' => 1,
                    'help' => 'Pilih Desktop atau HP, lalu klik/seret pada pratinjau untuk menaruh judul (mengisi kolom X dan Y di atas otomatis). Pratinjau memakai gambar banner dan teks judul (ID) yang sedang diisi.']),
                fld('title_size', 'Judul banner: ukuran', 'select', ['default' => '', 'options' => [
                    '' => 'Normal (bawaan)', 'sm' => 'Kecil', 'lg' => 'Besar', 'xl' => 'Sangat besar']]),
                fld('body_align', 'Posisi teks isi halaman', 'select', ['default' => '', 'options' => [
                    '' => 'Kiri (bawaan)', 'center' => 'Tengah', 'right' => 'Kanan', 'justify' => 'Rata kiri-kanan']]),
                fld('body_id', 'Isi (ID)', 'textarea', ['rows' => 12,
                    'help' => 'HTML sederhana diperbolehkan: <p> <br> <strong> <em> <ul> <ol> <li> <a> <h2> <h3>. Placeholder: {wa_url} (link WhatsApp) dan {email}.']),
                fld('body_en', 'Isi (EN)', 'textarea', ['rows' => 12]),
            ],
        ],
    ];
    return $E;
}
