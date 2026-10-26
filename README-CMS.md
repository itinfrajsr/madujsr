# CMS Madu JSR (PHP native + SQLite)

CMS ini mengelola seluruh konten `index.php` Anda: **produk, highlight, keunggulan, testimoni, FAQ, halaman info (Tentang Kami / Cara Pemesanan / Hubungi Kami), dan pengaturan situs** (WhatsApp, email, sosial media, teks hero, footer).

HTML, CSS, dan JavaScript situs **tidak diubah**. Hanya bagian konten yang sebelumnya ditulis manual kini dibaca dari database.

## Kebutuhan
- PHP 7.4 atau lebih baru (diuji pada PHP 8.3)
- Ekstensi `pdo_sqlite` (standar di hampir semua hosting), `dom` dan `mbstring` (disarankan)
- Tidak perlu MySQL / composer

## Instalasi (3 langkah)
1. **Upload** isi folder ini ke folder situs Anda (`madujsr_new/`):
   - `index.php` (menggantikan yang lama, simpan cadangan dulu)
   - folder `cms/`
2. **Buka situs sekali** (`/madujsr_new/`). Database `cms/storage/cms.sqlite` dibuat otomatis dan diisi konten situs Anda yang sekarang, sehingga tampilan awal sama seperti sebelumnya.
3. **Buka `/madujsr_new/cms/admin/`**, buat akun admin pertama (username + password minimal 8 karakter). **Lakukan ini segera setelah upload**, karena halaman pembuatan akun terbuka sampai akun pertama dibuat.

Pastikan folder situs dapat ditulis oleh PHP, karena CMS membuat sendiri folder `data/` (database + cadangan) dan `uploads/` (gambar yang Anda unggah). Jika tidak bisa, buat kedua folder itu manual dan beri izin tulis (chmod 755/775).

## Memperbarui CMS dari ZIP baru (data Anda aman)
Data Anda **tidak** disimpan di dalam ZIP, jadi memperbarui tidak menimpanya:

| Data | Lokasi | Ada di ZIP? |
|---|---|---|
| Database (produk, teks, pengaturan, akun admin) | `data/cms.sqlite` | Tidak |
| Cadangan otomatis harian (14 hari terakhir) | `data/backup/` | Tidak |
| Gambar yang diunggah lewat admin | `uploads/` (unggahan lama: `assets/img/uploads/`) | Tidak |

Cara memperbarui: ekstrak ZIP lalu **salin dan timpa** file yang sama ke folder situs (pilih Replace). Jangan menghapus folder `data/`, `uploads/`, maupun `assets/`. Folder `cms/` boleh diganti penuh, data tetap aman.

Peningkatan dari versi lama (database masih di `cms/storage/cms.sqlite`): saat situs dibuka pertama kali setelah update, database otomatis **disalin** ke `data/cms.sqlite`. **Sebelum update pertama ini, salin dulu `cms/storage/cms.sqlite` ke tempat aman sebagai cadangan.**

Memulihkan dari cadangan: buka **Dashboard → Data & cadangan** lalu klik **Pulihkan** pada cadangan yang diinginkan (kondisi sekarang otomatis disimpan sebagai `pre-restore-*.sqlite`). Anda juga bisa klik **Buat cadangan sekarang** kapan saja, misalnya sebelum update. Bila file `data/cms.sqlite` hilang, CMS otomatis memulihkan dari cadangan harian terbaru yang sehat dan menampilkan pemberitahuan di Dashboard. Cadangan hanya berisi database, bukan gambar di `uploads/`.

## Menu admin
| Menu | Fungsi |
|---|---|
| Produk | Tambah/ubah/hapus, urutkan, sembunyikan. Produk baru otomatis muncul di carousel, footer, dan halaman detail (`#slug`). |
| Highlight | 4 kotak di bawah hero |
| Keunggulan | Kartu "Kenapa Memilih Madu JSR" (kartu angka atau ikon) |
| Testimoni | Nama, foto, bintang, teks (teks panjang otomatis diberi "Baca Selengkapnya") |
| FAQ | Pertanyaan & jawaban |
| Alasan Dipercaya | Daftar poin di akordeon detail produk |
| Halaman Info | Tentang Kami, Cara Pemesanan, Hubungi Kami |
| Pengaturan Situs | WA, email, sosmed, hero, tentang, footer, link tombol melayang |
| Akun & Password | Ganti password |

Semua teks punya kolom **ID** dan **EN**; jika EN kosong, teks ID dipakai. Gunakan **Sembunyikan** untuk menyembunyikan item tanpa menghapusnya.

### Format khusus pada form produk
- **Fitur unggulan**: satu baris satu fitur, format `ikon|label ID|label EN`, mis. `fa-shield|Daya Tahan Harian|Daily Defense` (ikon Font Awesome 4.7).
- **Fungsi**: satu baris satu poin, format `teks ID|teks EN`.
- **Posisi logo JSR Store**: di form produk ada pratinjau poster. Klik atau seret di gambar untuk menaruh logo tepat di slot kosong poster (X, Y, lebar, tinggi ikut terisi otomatis dan bisa diketik manual). Pratinjau memakai layar desktop acuan 1918x876. Posisi di layar HP memakai satu pengaturan yang sama untuk semua produk.
- **Detail hanya gambar**: aktif = halaman detail berupa poster penuh (seperti saat ini).

### Halaman Info
Halaman Info punya kolom **Gambar kolom kedua (opsional)**. Jika diisi, halaman tampil 2 kolom (isi di kiri, gambar di kanan; di HP gambar turun ke bawah teks). Cara Pemesanan memakai ini dengan gambar `assets/img/cara-pemesanan-hp.webp`; kosongkan untuk kembali ke 1 kolom.

HTML sederhana diperbolehkan (`<p> <br> <strong> <em> <ul> <ol> <li> <a> <h2> <h3>`); tag/atribut lain dibuang otomatis. Placeholder: `{wa_url}` (link WhatsApp dari pengaturan) dan `{email}`.

## Perubahan perilaku dibanding file lama
- **Ikon sosial media** di footer kini hanya tampil jika URL-nya diisi di Pengaturan (sebelumnya link `#` kosong).
- Teks awal beberapa elemen kini memakai teks bahasa Indonesia yang sama dengan `data-id` (misalnya copyright), karena JavaScript bahasa memang menimpanya saat halaman dimuat.
- Teks testimoni panjang dipotong otomatis (±125 karakter) untuk versi ringkas, bukan ditulis manual.
- Halaman "Keunggulan" (`#info-keunggulan`) yang statis tidak dijadikan konten CMS karena tidak ditautkan di menu mana pun; menu "Keunggulan" mengarah ke bagian `#why-jsr`, yang sudah dikelola dari menu Keunggulan.

## URL admin tanpa ekstensi
Alamat admin memakai URL bersih: `/cms/admin/` (dashboard), `/cms/admin/login`, `/cms/admin/crud?e=faqs`, dst. (tanpa `.php`).
- **Apache** (Laragon/XAMPP/cPanel): otomatis lewat `cms/admin/.htaccess` (butuh `mod_rewrite` dan `AllowOverride All`). Alamat lama `login.php` dialihkan (301) ke `login`.
- **Nginx**: `.htaccess` tidak dibaca, tambahkan:
  ```nginx
  location /madujsr_new/cms/admin/ {
      try_files $uri $uri.php $uri/ =404;
  }
  ```
  (pastikan blok `location ~ \.php$` Anda tetap melayani hasilnya)
- Jika server tidak mendukung rewrite dan tautan admin jadi 404, matikan lewat `cms/config.local.php`:
  ```php
  <?php define('CLEAN_URLS', false);
  ```
  Tautan kembali memakai `.php` biasa.

## Keamanan
- Password disimpan dengan `password_hash`; sesi `HttpOnly` + `SameSite=Lax`; semua form dilindungi token **CSRF**
- Query memakai *prepared statements*; semua output di-*escape*; JSON di dalam `<script>` memakai flag `JSON_HEX_*`
- Login dibatasi **5 percobaan gagal / 15 menit** per IP
- Upload hanya gambar (JPG/PNG/WebP/GIF) yang divalidasi isinya, ekstensi ditentukan server (bukan dari nama file asli), nama file diacak, dan folder upload dilarang menjalankan script lewat `.htaccess` (versi yang aman untuk `AllowOverride` ketat)
- Link produk/sosmed hanya menerima `http(s)://`
- `.htaccess` di `data/` (dibuat otomatis) dan `cms/seed/` memblokir akses langsung ke database dan cadangan (Apache). File konfigurasi PHP tidak mencetak apa pun bila dibuka langsung

### Sangat disarankan
- **Nginx** tidak membaca `.htaccess`. Tambahkan:
  ```nginx
  location ~ ^/madujsr_new/(data|cms/storage|cms/seed)/ { deny all; }
  location ~ ^/madujsr_new/cms/[^/]+\.php$   { deny all; }
  ```
- **Pindahkan database ke luar folder publik.** (Pilihan lanjutan; default sudah di `data/` yang diblokir.) Buat `cms/config.local.php`:
  ```php
  <?php define('DB_PATH', '/home/akun/data/madujsr.sqlite');
  ```
  lalu pindahkan `data/cms.sqlite` ke lokasi itu (folder harus dapat ditulis PHP).
- Gunakan **HTTPS**.
- **Cadangkan** folder `data/` dan `uploads/` ke tempat lain secara berkala (cadangan harian otomatis ada di `data/backup/`, tetapi berada di server yang sama).

## Struktur file
```
index.php                  situs (membaca dari CMS)
cms/
  bootstrap.php            titik masuk
  config.php               konfigurasi (override: config.local.php)
  crud_config.php          definisi semua entitas & field  (satu sumber kebenaran)
  settings_config.php      daftar pengaturan situs + nilai bawaan
  db.php  functions.php  data.php  render.php  seed.php  admin_lib.php
  seed/seed_data.json      konten asli situs (bahan isi awal)
  storage/                 (lama) lokasi database sebelumnya; kini database di <situs>/data/
  admin/                   panel admin (login, dashboard, crud, settings, account)
```

## Mengembangkan
- **Menambah field** pada produk/testimoni/dll: tambahkan satu baris `fld(...)` di `cms/crud_config.php`. Kolom database dibuat otomatis dan form admin ikut berubah. Lalu tampilkan nilainya di `index.php` / `cms/data.php`.
- **Memulihkan data asli**: Dashboard → "Isi data bawaan" (hanya mengisi tabel yang kosong).
- **Reset total**: hapus `data/cms.sqlite` (dan `cms/storage/cms.sqlite` jika ada), buka situs lagi.
- **Lupa password**: hapus baris pengguna (`DELETE FROM users;` lewat alat SQLite apa pun) lalu buka `/cms/admin/` untuk membuat akun baru.


## Hosting yang memblokir upload (mis. InfinityFree)
Sebagian hosting menolak (403) setiap POST bertipe `multipart/form-data`, sehingga form admin tidak bisa disimpan. CMS mengatasinya otomatis: form dikirim sebagai POST biasa, dan gambar yang Anda pilih dikirim dalam bentuk base64. Gambar JPG/PNG/WebP di atas sekitar 1,5 MB diperkecil di browser (maksimal 2400 px, format WebP) sebelum dikirim. Butuh JavaScript aktif di browser. Alat `cms/admin/diag.php` (setelah login) menguji jenis POST mana yang diblokir hosting Anda; hapus bila tidak diperlukan.


## Sesi login
- **Tanpa "Ingat saya":** keluar otomatis setelah 2 jam tidak aktif (atur lewat `define('CMS_IDLE_SECONDS', 7200);` di `cms/config.local.php`).
- **Dengan "Ingat saya":** tetap masuk 30 hari (`CMS_REMEMBER_DAYS`) walau browser ditutup. Token acak disimpan di database (tabel `auth_tokens`) dan diganti setiap dipakai; Keluar atau ganti password mencabutnya.

### Auto-logout saat tidak ada aktivitas
Jika login **tanpa** "Ingat saya", timer di browser menghitung waktu diam (gerak mouse, ketik, klik, scroll, sentuh = aktivitas). Sekitar 1 menit sebelum `CMS_IDLE_SECONDS` habis muncul peringatan dengan hitung mundur dan tombol **Tetap masuk**; jika habis, otomatis pindah ke halaman login. Sesi "Ingat saya" tidak terkena timer ini. Atur lamanya lewat `CMS_IDLE_SECONDS` di `cms/config.local.php`.
