<?php
/* =========================================================
   KONFIGURASI
========================================================= */
$wa_number = '62XXXXXXXXXXX';   // nomor WhatsApp: format internasional, tanpa + dan 0 di depan
$wa_text   = 'Halo Madu JSR, saya ingin konsultasi';

function e($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }

$wa_url = 'https://api.whatsapp.com/send?phone=' . rawurlencode($wa_number) . '&text=' . rawurlencode($wa_text);

// Daftar produk: tambah / ubah / hapus di sini, slide & halaman detail ikut otomatis
$products = [
    [
        'img'   => 'assets/img/madu/madu jsr multiflora@4x-8.png',
        'class' => 'product-image',
        'alt'   => 'Madu JSR Multiflora',
        'name'  => ['id' => 'Madu Multiflora', 'en' => 'Multiflora Honey'],
        'desc'  => [
            'id' => 'Madu murni yang berasal berbagai macam nektar bunga, dengan aroma bunga yang beraneka ragam.',
            'en' => 'Pure honey from various flower nectars, with a diverse floral aroma.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-jsr-murni-multiflora',
    ],
    [
        'img'   => 'assets/img/madu/madu jsr sangket@4x-8.png',
        'class' => 'product-image',
        'alt'   => 'Madu JSR Sangket',
        'name'  => ['id' => 'Madu Sangket', 'en' => 'Sangket Honey'],
        'desc'  => [
            'id' => 'Madu murni jenis uniflora yang berasal dari nektar bunga sangket. Rasanya yang lebih manis cocok dinikmati langsung maupun sebagai pemanis alami.',
            'en' => 'Pure uniflora honey from sangket flower nectar. Its sweeter taste is perfect for direct consumption or as a natural sweetener.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-sangket-jsr',
    ],
    [
        'img'   => 'assets/img/madu/madu jsr hitam4x-8 (1).png',
        'class' => 'product-image1',
        'alt'   => 'Madu Hitam',
        'name'  => ['id' => 'Madu Hitam', 'en' => 'Black Honey'],
        'desc'  => [
            'id' => 'Madu murni dengan warna lebih gelap dan kandungan antioksidan yang tinggi cocok untuk membantu menjaga stamina, daya tahan tubuh, kesehatan lambung, dan mendukung pemulihan.',
            'en' => 'Pure honey with a darker colour and high antioxidant content, suitable for maintaining stamina, immunity, stomach health, and supporting recovery.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-hitam-manis-jsr',
    ],
    [
        'img'   => 'assets/img/madu/Madu Hexa RePos.png',
        'class' => 'product-image2',
        'alt'   => 'Madu Hexabrain',
        'name'  => ['id' => 'Madu Hexabrain', 'en' => 'Hexabrain Honey'],
        'desc'  => [
            'id' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
            'en' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-hexabrain',
    ],
    [
        'img'   => 'assets/img/madu/Madu Gold RePos.png',
        'class' => 'product-image3',
        'alt'   => 'Madu Gold JSR',
        'name'  => ['id' => 'Madu Gold JSR', 'en' => 'Gold JSR Honey'],
        'desc'  => [
            'id' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
            'en' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-gold-jsr',
    ],
    [
        'img'   => 'assets/img/madu/Madu Imun RePos.png',
        'class' => 'product-image4',
        'alt'   => 'Madu Imun',
        'name'  => ['id' => 'Madu Imun', 'en' => 'Immune Honey'],
        'desc'  => [
            'id' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
            'en' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maxime dolorem magni, culpa cumque enim sapiente illum minus ullam est excepturi ipsam officia at veritatis eius magnam reiciendis aut consectetur.',
        ],
        'link'  => 'https://jsrstore.id/products/detail/madu-imun',
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- ============================================================
         META
    ============================================================ -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaduJSR</title>

    <!-- ============================================================
         BOOTSTRAP 5
    ============================================================ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- ============================================================
         Web Icon
    ============================================================ -->
	
	<link rel="icon" type="image/png" href="assets/img/logo1.png" />
	
    <!-- ============================================================
         GOOGLE FONT
    ============================================================ -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- ============================================================
         FONT AWESOME 4 (dari template)
    ============================================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/themify-icons.css">

    <!-- ============================================================
         OWL CAROUSEL (via CDN agar pasti)
    ============================================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- ============================================================
         OTHER CSS (template)
    ============================================================ -->
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/prettyPhoto.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/aos/aos.css">

    <!-- ============================================================
         CUSTOM CSS (gabungan semua)
    ============================================================ -->
    <style>
        /* =========================================================
           GLOBAL
        ========================================================= */
        html {
            scroll-behavior: smooth;
        }
        body {
            margin: 0;
            font-family: 'Exo', sans-serif;
            background: #ffffff;
        }
        section {
            position: relative;
        }

        /* =========================================================
           HERO
        ========================================================= */
        #home {
            position: relative;
            width: 100%;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            background-image: url("assets/img/bg/honeycomb-dripping-honey-with-bees-flying.jpg");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
        #home .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%);
            object-fit: cover;
            z-index: 0;
            pointer-events: none;
        }
        #home .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(20,15,8,.60) 0%, rgba(20,15,8,.28) 48%, rgba(20,15,8,.14) 100%);
            z-index: 1;
            pointer-events: none;
        }
        #home .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            padding-top: 70px;
        }
        #home .hero-text {
            position: relative;
            z-index: 3;
            max-width: 850px;
            margin: 0 auto;
        }
        #home .hero-text h2 {
            position: relative;
            z-index: 3;
            margin: 0 0 18px;
            color: #ffffff;
            font-size: clamp(38px, 5.2vw, 70px);
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -1.2px;
            text-shadow: 0 5px 25px rgba(0,0,0,.30);
        }
        #home .hero-text p {
            position: relative;
            z-index: 3;
            max-width: 680px;
            margin: 0 auto;
            color: rgba(255,255,255,.94);
            font-size: clamp(16px, 1.6vw, 21px);
            line-height: 1.7;
            font-weight: 400;
            text-shadow: 0 2px 10px rgba(0,0,0,.28);
        }

        /* =========================================================
           FEATURED SERVICES - HONEYCOMB HEXAGON STYLE
        ========================================================= */
        #featured-services {
            position: relative;
            margin: 0;
            padding: 90px 0;
            background: #f2e7cb;
            overflow: hidden;
        }
        #featured-services::before {
            content: "";
            position: absolute;
            top: -90px;
            left: -130px;
            width: 420px;
            height: 420px;
            background-image: url('assets/img/template/graphic-hexagon.png');
            background-size: 60px 104px;
            background-repeat: repeat;
            opacity: .55;
            pointer-events: none;
            z-index: 0;
        }
        #featured-services::after {
            content: "";
            position: absolute;
            bottom: -110px;
            right: -130px;
            width: 420px;
            height: 420px;
            background-image: url('assets/img/template/graphic-hexagon.png');
            background-size: 60px 104px;
            background-repeat: repeat;
            opacity: .55;
            pointer-events: none;
            z-index: 0;
        }
        #featured-services .fs-heading {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 700px;
            margin: 0 auto 55px;
        }
        #featured-services .fs-heading .fs-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #c8751c;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }
        #featured-services .fs-heading .fs-label span {
            width: 34px;
            height: 3px;
            border-radius: 99px;
            background: #d2781d;
            display: inline-block;
        }
        #featured-services .fs-heading h2 {
            margin: 0 0 12px;
            color: #211d17;
            font-weight: 800;
            font-size: clamp(30px, 3.6vw, 44px);
            letter-spacing: -.5px;
        }
        #featured-services .fs-heading p {
            margin: 0;
            color: #6a5f4d;
            font-size: 15px;
            line-height: 1.7;
        }

        #featured-services .service-item1,
        #featured-services .service-item2,
        #featured-services .service-item3,
        #featured-services .service-item4 {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
            padding: 50px 18px 30px;
            background-size: 100% 100% !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            text-align: center;
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform .35s ease, box-shadow .35s ease;
        }

        #featured-services .service-item1:hover,
        #featured-services .service-item2:hover,
        #featured-services .service-item3:hover,
        #featured-services .service-item4:hover {
            transform: translateY(-8px);
        }

        #featured-services .service-item1 .service-content,
        #featured-services .service-item2 .service-content,
        #featured-services .service-item3 .service-content,
        #featured-services .service-item4 .service-content {
            width: 100%;
            padding-top: 20px;
        }

        #featured-services .service-item1 h4,
        #featured-services .service-item2 h4,
        #featured-services .service-item3 h4,
        #featured-services .service-item4 h4 {
            margin: 0 0 8px;
            font-size: 1.05rem;
            font-weight: 700;
            color: #2b2018;
        }

        #featured-services .service-item1 p,
        #featured-services .service-item2 p,
        #featured-services .service-item3 p,
        #featured-services .service-item4 p {
            margin: 0;
            color: #2b2018;
            opacity: .85;
            font-size: .82rem;
            line-height: 1.55;
            max-width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 767px) {
            #featured-services { padding: 60px 0 50px; }
            #featured-services .fs-heading { margin-bottom: 40px; }
            #featured-services .service-item1,
            #featured-services .service-item2,
            #featured-services .service-item3,
            #featured-services .service-item4 { 
                max-width: 200px; 
                min-height: 240px;
                padding: 40px 12px 20px;
            }
            #featured-services .service-item1 h4,
            #featured-services .service-item2 h4,
            #featured-services .service-item3 h4,
            #featured-services .service-item4 h4 { 
                font-size: 0.9rem; 
            }
            #featured-services .service-item1 p,
            #featured-services .service-item2 p,
            #featured-services .service-item3 p,
            #featured-services .service-item4 p { 
                font-size: 0.75rem;
                max-width: 160px;
            }
        }

        /* =========================================================
           ABOUT / KEBAIKAN ALAMI
        ========================================================= */
        #about-jsr {
            position: relative;
            min-height: 620px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(rgba(25,18,8,.35), rgba(25,18,8,.40)), url("assets/img/bg/honeycomb-dripping-honey-with-bees-flying (1).jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        #about-jsr .about-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0,0,0,.05), rgba(0,0,0,.40));
            z-index: 1;
        }
        #about-jsr .about-content {
            position: relative;
            z-index: 2;
            max-width: 850px;
            margin: 0 auto;
            padding: 100px 20px;
            color: #ffffff;
            text-align: center;
        }
        #about-jsr .about-content h2 {
            margin-bottom: 22px;
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.15;
            font-weight: 800;
            text-shadow: 0 4px 20px rgba(0,0,0,.35);
        }
        #about-jsr .about-content h2 em {
            color: #f0b44d;
            font-style: italic;
        }
        #about-jsr .about-content p {
            margin-bottom: 14px;
            color: rgba(255,255,255,.94);
            font-size: 17px;
            line-height: 1.8;
            text-shadow: 0 2px 10px rgba(0,0,0,.3);
        }

        /* =========================================================
           PRODUCT SECTION
        ========================================================= */
        #products {
            position: relative;
            overflow: hidden;
            background: #ffffff;
            z-index: 2;
        }
        #productHeroCarousel {
            width: 100%;
            overflow: hidden;
        }

        /* =========================================================
           PRODUCT CAROUSEL - PANAH KIRI / KANAN
        ========================================================= */
        #productHeroCarousel .carousel-control-prev,
        #productHeroCarousel .carousel-control-next {
            position: absolute;
            top: 50%;
            bottom: auto;
            width: 52px;
            height: 52px;
            transform: translateY(-50%);
            opacity: 1;
            z-index: 20;
            border: 0;
            border-radius: 50%;
            background: rgba(217, 164, 65, 0.95);
            box-shadow: 0 8px 22px rgba(80, 60, 25, 0.20);
            transition: all .3s ease;
        }

        #productHeroCarousel .carousel-control-prev {
            left: 22px;
        }

        #productHeroCarousel .carousel-control-next {
            right: 22px;
        }

        #productHeroCarousel .carousel-control-prev:hover,
        #productHeroCarousel .carousel-control-next:hover {
            background: #c27f3a;
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 28px rgba(80, 60, 25, 0.28);
        }

        #productHeroCarousel .carousel-control-prev-icon,
        #productHeroCarousel .carousel-control-next-icon {
            width: 22px;
            height: 22px;
            background-size: 100% 100%;
        }

        @media (max-width: 767px) {
            #productHeroCarousel .carousel-control-prev,
            #productHeroCarousel .carousel-control-next {
                width: 42px;
                height: 42px;
            }

            #productHeroCarousel .carousel-control-prev {
                left: 10px;
            }

            #productHeroCarousel .carousel-control-next {
                right: 10px;
            }

            #productHeroCarousel .carousel-control-prev-icon,
            #productHeroCarousel .carousel-control-next-icon {
                width: 17px;
                height: 17px;
            }
        }
        #products .carousel-item {
            width: 100%;
        }
        .product-slide {
            min-height: 620px;
            padding: 80px 8%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 80px;
            background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
        }
        .product-image-wrapper {
            position: relative;
            width: 50%;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product-image {
            position: relative;
            z-index: 5;
            max-width: 480px;
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        .product-image1 {
            position: relative;
            z-index: 5;
            max-width: 480px;
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        .product-image2 {
            position: relative;
            z-index: 5;
            max-width: 480px;
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        .product-image3 {
            position: relative;
            z-index: 5;
            max-width: 480px;
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        .product-image4 {
            position: relative;
            z-index: 5;
            max-width: 480px;
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        @keyframes productFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        /* =========================================================
           HONEY BLOBS
        ========================================================= */
        .honey-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(1px);
            pointer-events: none;
        }
        .blob-1 {
            width: 270px;
            height: 270px;
            background: rgba(229,176,66,.18);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .blob-2 {
            width: 130px;
            height: 130px;
            background: rgba(216,133,25,.10);
            top: 20%;
            left: 18%;
            animation: blobFloat 4s ease-in-out infinite;
        }
        .blob-3 {
            width: 100px;
            height: 100px;
            background: rgba(242,193,87,.16);
            right: 15%;
            bottom: 18%;
            animation: blobFloat 5s ease-in-out infinite reverse;
        }
        @keyframes blobFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* =========================================================
           PRODUCT INFO
        ========================================================= */
        .product-info {
            position: relative;
            z-index: 10;
            width: 45%;
            max-width: 550px;
        }
        .product-label {
            display: inline-block;
            margin-bottom: 14px;
            color: #c7771b;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
        }
        .product-info h2 {
            margin: 0 0 20px;
            color: #202020;
            font-size: clamp(40px, 5vw, 64px);
            line-height: 1.05;
            font-weight: 800;
        }
        .product-info p {
            max-width: 500px;
            margin-bottom: 28px;
            color: #625b50;
            font-size: 17px;
            line-height: 1.75;
        }

        /* =========================================================
           PRODUCT BUTTON - WARNA MADU
        ========================================================= */
        .product-info .btn {
            position: relative;
            z-index: 20;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 145px;
            min-height: 48px;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            background: #d9a441;
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(217,164,65,.35);
            transition: transform .3s ease, background .3s ease, box-shadow .3s ease;
        }
        .product-info .btn:hover {
            background: #c27f3a;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(194,127,58,.40);
        }

        /* =========================================================
           WHY JSR
        ========================================================= */
        #why-jsr {
            position: relative;
            z-index: 10;
            margin-top: 90px;
            padding: 100px 0 120px;
            overflow: hidden;
            background: radial-gradient(circle at 15% 15%, rgba(255,255,255,.75), transparent 32%), linear-gradient(135deg, #faf3df 0%, #f5ecd3 55%, #efe3c1 100%);
        }

        /* =========================================================
           WHY HEADING
        ========================================================= */
        .jsr-heading {
            position: relative;
            z-index: 5;
            margin-bottom: 45px;
        }
        .jsr-heading-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #c8751c;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }
        .jsr-heading-label span {
            width: 40px;
            height: 3px;
            display: inline-block;
            border-radius: 99px;
            background: #d2781d;
        }
        .jsr-heading h2 {
            margin: 0;
            color: #191919;
            font-size: clamp(38px, 4vw, 55px);
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -1.5px;
        }
        .jsr-heading h2 em {
            color: #d2781d;
            font-style: italic;
        }
        .jsr-heading p {
            max-width: 900px;
            margin: 18px 0 0;
            color: #303030;
            font-size: 16px;
            line-height: 1.75;
        }

        /* =========================================================
           QUALITY CARD
        ========================================================= */
        .jsr-quality-card {
            position: relative;
            height: 100%;
            min-height: 310px;
            padding: 32px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid rgba(255,255,255,.95);
            border-radius: 24px;
            box-shadow: 0 12px 32px rgba(80,60,25,.09);
            opacity: 1 !important;
            visibility: visible !important;
            transition: transform .45s cubic-bezier(.2,.8,.2,1), box-shadow .45s ease, border-color .45s ease;
        }
        .jsr-quality-card:hover {
            transform: translateY(-10px);
            border-color: rgba(210,120,29,.35);
            box-shadow: 0 25px 50px rgba(80,60,25,.15);
        }

        .jsr-card-number {
            position: absolute;
            top: 20px;
            right: 25px;
            color: rgba(210,120,29,.18);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .jsr-card-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            border-radius: 18px;
            background: #fff3d8;
            color: #d2781d;
            font-size: 28px;
            transition: .4s ease;
        }
        .jsr-quality-card:hover .jsr-card-icon {
            transform: translateY(-3px) rotate(-5deg) scale(1.08);
            background: #ffe7b2;
        }

        .jsr-stat {
            color: #d2781d;
            font-size: clamp(42px, 4vw, 53px);
            line-height: 1;
            font-weight: 800;
            letter-spacing: -2px;
            margin-bottom: 10px;
        }

        .jsr-badge {
            display: inline-block;
            margin-bottom: 15px;
            padding: 5px 10px;
            border-radius: 50px;
            background: #fff1d2;
            color: #7b4c14;
            font-size: 9px;
            font-weight: 800;
        }

        .jsr-quality-card h3 {
            position: relative;
            z-index: 2;
            margin: 0 0 14px;
            color: #191919;
            font-size: 23px;
            line-height: 1.3;
            font-weight: 750;
        }

        .jsr-quality-card p {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #292929;
            font-size: 14px;
            line-height: 1.7;
        }

        .jsr-card-line {
            position: absolute;
            left: 32px;
            bottom: 22px;
            width: 0;
            height: 3px;
            border-radius: 99px;
            background: #d2781d;
            transition: width .45s ease;
        }
        .jsr-quality-card:hover .jsr-card-line {
            width: 55px;
        }

        /* =========================================================
           HONEYCOMB
        ========================================================= */
        .jsr-honeycomb {
            position: absolute;
            width: 250px;
            height: 300px;
            z-index: 1;
            pointer-events: none;
            opacity: .55;
        }
        .jsr-honeycomb-top {
            top: 20px;
            right: -40px;
        }
        .jsr-honeycomb-bottom {
            bottom: 0;
            left: -60px;
            transform: rotate(180deg);
        }
        .jsr-honeycomb span {
            position: absolute;
            width: 52px;
            height: 60px;
            border: 1.5px solid rgba(224,176,67,.45);
            clip-path: polygon(25% 0%, 75% 0%, 100% 25%, 100% 75%, 75% 100%, 25% 100%, 0% 75%, 0% 25%);
            animation: jsrHoneyFloat 5s ease-in-out infinite;
        }
        .jsr-honeycomb span:nth-child(1) { top: 0; left: 75px; }
        .jsr-honeycomb span:nth-child(2) { top: 35px; left: 25px; }
        .jsr-honeycomb span:nth-child(3) { top: 35px; left: 125px; }
        .jsr-honeycomb span:nth-child(4) { top: 70px; left: 75px; }
        .jsr-honeycomb span:nth-child(5) { top: 105px; left: 25px; }
        .jsr-honeycomb span:nth-child(6) { top: 105px; left: 125px; }

        @keyframes jsrHoneyFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-7px); }
        }

        /* =========================================================
           WHY CARD ANIMATION
        ========================================================= */
        .jsr-quality-card {
            animation: jsrCardIn .7s ease both;
        }
        .jsr-quality-grid > div:nth-child(1) .jsr-quality-card { animation-delay: .05s; }
        .jsr-quality-grid > div:nth-child(2) .jsr-quality-card { animation-delay: .12s; }
        .jsr-quality-grid > div:nth-child(3) .jsr-quality-card { animation-delay: .19s; }
        .jsr-quality-grid > div:nth-child(4) .jsr-quality-card { animation-delay: .26s; }
        .jsr-quality-grid > div:nth-child(5) .jsr-quality-card { animation-delay: .33s; }
        .jsr-quality-grid > div:nth-child(6) .jsr-quality-card { animation-delay: .40s; }

        @keyframes jsrCardIn {
            from { opacity: 0; transform: translateY(35px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* =========================================================
           TESTIMONIAL SECTION - CARD LEBIH PENDEK & OWL DOTS HIDDEN
        ========================================================= */
        .testimonial {
            position: relative;
            padding: 90px 0 100px;
            background: #fffaf0;
            overflow: hidden;
        }
        .testimonial h4.text-uppercase {
            color: #d2781d !important;
            font-weight: 800;
            letter-spacing: 2px;
        }
        .testimonial h1 {
            color: #211d17;
            font-weight: 800;
            margin-bottom: 15px;
        }

        /* PERBAIKAN: Card testimonial lebih pendek */
        .testimonial .testimonial-item {
            height: 100%;
            margin: 8px;
            padding: 22px 18px !important;
            background: #ffffff;
            border: 1px solid rgba(210,120,29,.15);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(80,60,25,.09);
            transition: transform .35s ease, box-shadow .35s ease;
            display: flex !important;
            flex-direction: column;
            min-height: 240px !important;
        }
        .testimonial .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(80,60,25,.14);
        }

        .testimonial .testimonial-item .testimonial-text {
            flex: 0 1 auto;
            margin-bottom: 6px;
            font-size: 13px;
            line-height: 1.5;
        }

        .testimonial .testimonial-item .testimonial-text .short-text {
            display: block;
        }
        .testimonial .testimonial-item .testimonial-text .full-text {
            display: none;
        }
        .testimonial .testimonial-item .testimonial-text.show-full .short-text {
            display: none;
        }
        .testimonial .testimonial-item .testimonial-text.show-full .full-text {
            display: block;
        }

        .testimonial .testimonial-item .read-more-btn {
            display: inline-block;
            margin-top: 2px;
            padding: 2px 14px;
            background: transparent;
            border: 1px solid #d9a441;
            border-radius: 20px;
            color: #d2781d;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: flex-start;
        }
        .testimonial .testimonial-item .read-more-btn:hover {
            background: #d9a441;
            color: #ffffff;
        }

        .testimonial .testimonial-item > p:first-child {
            min-height: 30px !important;
            color: #625b50;
            font-size: 13px;
            line-height: 1.6;
        }

        .testimonial .testimonial-item img {
            width: 60px !important;
            height: 60px !important;
            margin-top: 4px;
            margin-bottom: 4px;
            object-fit: cover;
            border: 3px solid #d9a441 !important;
            border-radius: 50% !important;
        }

        .testimonial .testimonial-item h4 {
            margin-bottom: 0px;
            color: #211d17 !important;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.3;
        }

        .testimonial .testimonial-item .stars {
            display: flex;
            justify-content: center;
            gap: 3px;
            color: #d9a441;
            font-size: 11px;
            margin-top: 2px;
        }

        .testimonial .owl-nav .owl-prev {
            position: absolute;
            top: -58px;
            right: 0;
            background: #d2781d;
            color: #ffffff;
            padding: 5px 30px;
            border-radius: 30px;
            transition: .5s;
        }
        .testimonial .owl-nav .owl-prev:hover {
            background: #a85c13;
            color: #ffffff;
        }
        .testimonial .owl-nav .owl-next {
            position: absolute;
            top: -58px;
            right: 88px;
            background: #d2781d;
            color: #ffffff;
            padding: 5px 30px;
            border-radius: 30px;
            transition: .5s;
        }
        .testimonial .owl-nav .owl-next:hover {
            background: #a85c13;
            color: #ffffff;
        }

        /* =========================================================
           HIDE OWL DOTS
        ========================================================= */
        .testimonial-carousel .owl-dots {
            display: none !important;
        }

        @media (min-width: 992px) {
            .testimonial .testimonial-item { margin: 10px; }
            .testimonial .container .row:first-child { margin-bottom: 30px; }
        }

        @media (max-width: 767px) {
            .testimonial { padding: 60px 0 70px; }
            .testimonial .testimonial-item {
                margin: 4px;
                padding: 16px 14px !important;
                min-height: 200px !important;
            }
            .testimonial .testimonial-item .testimonial-text {
                font-size: 12px;
            }
            .testimonial .testimonial-item > p:first-child {
                min-height: 20px !important;
                font-size: 12px;
            }
            .testimonial .testimonial-item img {
                width: 48px !important;
                height: 48px !important;
                border-width: 2px !important;
            }
            .testimonial .testimonial-item h4 {
                font-size: 14px;
            }
            .testimonial .owl-nav .owl-prev,
            .testimonial .owl-nav .owl-next {
                top: -30px;
                padding: 3px 18px;
                font-size: 12px;
            }
            .testimonial .owl-nav .owl-next { right: 55px; }
            .testimonial .owl-nav .owl-prev { right: 0; }
            .testimonial .testimonial-item .read-more-btn {
                font-size: 9px;
                padding: 1px 12px;
            }
        }

        @media (max-width: 991px) {
            .testimonial .owl-nav .owl-prev,
            .testimonial .owl-nav .owl-next {
                top: -30px;
                padding: 3px 20px;
            }
            .testimonial .owl-nav .owl-next { right: 60px; }
        }

        /* =========================================================
           MOBILE (≤ 767px)
        ========================================================= */
        @media (max-width: 767px) {
            #home { min-height: 560px; }
            #home .hero-content { padding: 70px 18px 25px; }
            #home .hero-text h2 { font-size: 38px; }
            #home .hero-text p { font-size: 15px; line-height: 1.65; }
            #about-jsr { min-height: 560px; background-attachment: scroll; }
            #about-jsr .about-content { padding: 80px 20px; }
            #about-jsr .about-content h2 { font-size: 36px; }
            #about-jsr .about-content p { font-size: 14px; line-height: 1.7; }
            .product-slide { min-height: auto; padding: 65px 25px 75px; flex-direction: column; gap: 25px; text-align: center; }
            .product-image-wrapper { width: 100%; min-height: 350px; max-height: 400px; }
            .product-image { max-width: 330px; max-height: 370px; }
            .product-info { width: 100%; max-width: 600px; }
            .product-label { font-size: 10px; }
            .product-info h2 { font-size: 40px; }
            .product-info p { margin: 0 auto 25px; font-size: 14px; }
            .product-info .btn { min-height: 46px; padding: 11px 24px; }
            #why-jsr { margin-top: 60px; padding: 70px 0 80px; }
            .jsr-heading { margin-bottom: 32px; }
            .jsr-heading h2 { font-size: 34px; letter-spacing: -1px; }
            .jsr-heading p { font-size: 14px; line-height: 1.65; }
            .jsr-quality-card { min-height: auto; padding: 27px 24px; border-radius: 20px; }
            .jsr-quality-card h3 { font-size: 21px; }
            .jsr-quality-card p { font-size: 14px; }
            .jsr-stat { font-size: 43px; }
            .jsr-honeycomb-top { right: -150px; transform: scale(.7); opacity: .25; }
            .jsr-honeycomb-bottom { left: -150px; transform: rotate(180deg) scale(.7); opacity: .20; }
            .footer-area .footer_social { padding: 30px 0 22px; }
            .footer-area .footer_social ul { gap: 7px; }
            .footer-area .footer_social ul li a { width: 38px; height: 38px; }
            .footer-area .footer-padding { padding: 40px 15px 18px; }
        }

        /* =========================================================
           TABLET (≤ 991px)
        ========================================================= */
        @media (max-width: 991px) {
            #about-jsr {
                background-attachment: scroll !important;
                background-position: center center !important;
                min-height: 480px;
            }
        }

        /* =========================================================
           MOBILE MENU BUTTON
        ========================================================= */
        .site-menu-toggle {
            display: block;
            text-align: right;
            padding: 5px 0;
            color: #333;
            font-size: 28px;
            line-height: 1;
            text-decoration: none;
        }
        .site-menu-toggle:hover { color: #d9a441; }
        @media (max-width: 991.98px) {
            .site-navbar .container .row { position: relative; }
            .site-navbar .col-6.d-inline-block {
                display: flex !important;
                justify-content: flex-end;
                align-items: center;
            }
            .site-menu-toggle { margin-right: 0; padding-right: 5px; }
        }

        /* =========================================================
           LANGUAGE FLAG
        ========================================================= */
        .site-menu .language-menu {
            display: inline-flex;
            align-items: center;
            vertical-align: middle;
        }
        .language-toggle {
            display: inline-flex !important;
            align-items: center;
            gap: 6px;
            vertical-align: middle;
            line-height: normal;
        }
        .language-toggle .language-flag,
        .language-option img {
            display: block;
            width: 22px;
            height: 15px;
            object-fit: cover;
            border-radius: 2px;
            box-shadow: 0 0 0 1px rgba(255,255,255,.25);
            vertical-align: middle;
        }
        .language-toggle .language-flag {
            width: 26px;
            height: 18px;
        }
        .language-menu .dropdown { min-width: 46px; }
        .language-option {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }
        .language-option.active {
            background: rgba(217,164,65,0.25) !important;
            border-radius: 4px;
        }
        .language-option.active img {
            box-shadow: 0 0 0 2px #d9a441 !important;
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        .footer-area {
            position: relative;
            z-index: 20;
            padding-top: 0;
            background: #211d17;
            color: rgba(255,255,255,.72);
        }
        .footer-area .footer_social {
            padding: 38px 0 28px;
            border-bottom: 1px solid rgba(255,255,255,.10);
        }
        .footer-area .footer_social ul {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .footer-area .footer_social ul li { margin: 0 !important; }
        .footer-area .footer_social ul li a {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 50%;
            color: #ffffff;
            background: rgba(255,255,255,.05);
            text-decoration: none;
            transition: .25s ease;
        }
        .footer-area .footer_social ul li a:hover {
            color: #ffffff;
            background: #d9a441;
            border-color: #d9a441;
            transform: translateY(-3px);
        }
        .footer-area .footer-padding { padding: 58px 0 35px; }
        .footer-area .single_footer { margin-bottom: 28px; }
        .footer-area .single_footer h4 {
            position: relative;
            margin: 0 0 20px;
            padding-bottom: 12px;
            color: #ffffff;
            font-size: 17px;
            font-weight: 700;
        }
        .footer-area .single_footer h4::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 38px;
            height: 3px;
            border-radius: 99px;
            background: #d9a441;
        }
        .footer-area .footer_contact ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .footer-area .footer_contact li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 0 0 13px;
            color: rgba(255,255,255,.68);
            line-height: 1.65;
        }
        .footer-area .footer_contact li > i {
            flex: 0 0 18px;
            margin-top: 4px;
            color: #f4d98d;
            text-align: center;
        }
        .footer-area .footer_contact a {
            color: rgba(255,255,255,.68);
            text-decoration: none;
            transition: .2s ease;
        }
        .footer-area .footer_contact a:hover {
            color: #f4d98d;
            padding-left: 4px;
        }
        .footer-area .footer_copyright {
            margin: 0;
            padding: 23px 0;
            border-top: 1px solid rgba(255,255,255,.10);
            color: rgba(255,255,255,.48);
            font-size: 13px;
        }

        .footer-logo {
            max-width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .footer-social-inline { margin-top: 15px; }
        .footer-social-inline .social-label {
            display: block;
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .footer-social-inline .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            color: #fff;
            font-size: 15px;
            margin-right: 6px;
            transition: 0.3s ease;
            text-decoration: none;
        }
        .footer-social-inline .social-icon:hover {
            background: #d9a441;
            color: #fff;
            transform: translateY(-3px);
        }
        .btn-wa {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #c27f3a;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            white-space: nowrap;
        }
        .btn-wa:hover {
            background: #2f2820;
            color: #ffffff;
            transform: translateY(-3px);
        }
        .btn-wa i { font-size: 20px; }

        .footer-area .footer_contact .btn-wa { color: #ffffff !important; }
        .footer-area .footer_contact .btn-wa:hover { color: #ffffff !important; }
        .btn-wa i.fa-whatsapp {
            font-family: 'FontAwesome' !important;
            font-size: 20px !important;
            color: #ffffff !important;
            display: inline-block !important;
            line-height: 1 !important;
        }

        .footer-area .row.footer-padding {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
        }
        .footer-area .single_footer {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .footer-area .single_footer .footer_contact { flex: 1; }
        .footer-area .footer_contact ul { padding-left: 0; }
        .footer-area .footer_contact ul li { list-style: none; margin-bottom: 10px; }
        .footer-area .footer_contact ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: 0.3s ease;
            font-size: 14px;
        }
        .footer-area .footer_contact ul li a:hover {
            color: #f4d98d;
            padding-left: 4px;
        }

        @media (max-width: 767px) {
            .footer-logo { max-width: 90px; }
            .footer-social-inline .social-label { font-size: 12px; }
            .btn-wa { padding: 8px 16px; font-size: 12px; }
            .btn-wa i { font-size: 16px; }
        }

        .footer-area .single_footer h4,
        .footer-area .single_footer p,
        .footer-area .single_footer .footer_contact ul,
        .footer-area .single_footer .footer-social-inline { text-align: left; }
        .footer-area .single_footer .footer-logo { display: block; }
        .footer-area .single_footer .btn-wa { display: inline-flex; }

        /* =========================================================
        PENYESUAIAN 6 CARD PER BARIS (Desktop)
        ========================================================= */
        @media (min-width: 992px) {
            .jsr-quality-card { min-height: 220px !important; padding: 18px 14px !important; }
            .jsr-quality-card h3 { font-size: 16px !important; margin-bottom: 8px; line-height: 1.2; }
            .jsr-quality-card p { font-size: 12px !important; line-height: 1.5 !important; margin: 0; }
            .jsr-stat { font-size: 28px !important; line-height: 1; margin-bottom: 6px; letter-spacing: -1px; }
            .jsr-badge { font-size: 7px !important; padding: 3px 6px !important; margin-bottom: 8px; }
            .jsr-card-icon { width: 36px !important; height: 36px !important; font-size: 16px !important; margin-bottom: 10px; border-radius: 12px; }
            .jsr-card-number { font-size: 10px !important; top: 12px !important; right: 14px !important; }
            .jsr-card-line { display: none !important; }
        }

        /* =========================================================
           FLOATING CTA
        ========================================================= */
        .floating-cta {
            position: fixed;
            bottom: 10px;
            right: 30px;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transform: translateY(30px) scale(0.95);
            transition: all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }
        .floating-cta.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }
        .floating-cta .floating-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 28px;
            background: #d9a441;
            color: #ffffff;
            border: none;
            border-radius: 60px;
            font-size: 16px;
            font-weight: 700;
            box-shadow: 0 12px 35px rgba(217,164,65,0.45);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }
        .floating-cta .floating-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }
        .floating-cta .floating-btn:hover::before {
            left: 100%;
        }
        .floating-cta .floating-btn:hover {
            background: #c27f3a;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 18px 40px rgba(194,127,58,0.50);
        }
        .floating-cta .floating-btn i {
            font-size: 22px;
            animation: pulseIcon 2s ease-in-out infinite;
        }
        .floating-cta .floating-btn .btn-label {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            line-height: 1.2;
        }
        .floating-cta .floating-btn .btn-label small {
            font-size: 11px;
            font-weight: 400;
            opacity: 0.85;
        }
        .floating-cta .floating-btn .btn-label span {
            font-size: 16px;
        }
        @keyframes pulseIcon {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .floating-cta .close-cta {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.6);
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }
        .floating-cta .close-cta:hover {
            background: rgba(0,0,0,0.8);
            transform: scale(1.1);
        }

        @media (max-width: 576px) {
            .floating-cta {
                bottom: 20px;
                right: 20px;
                left: 20px;
                align-items: stretch;
            }
            .floating-cta .floating-btn {
                padding: 12px 20px;
                font-size: 14px;
                justify-content: center;
                width: 100%;
            }
            .floating-cta .floating-btn .btn-label small {
                font-size: 10px;
            }
            .floating-cta .floating-btn .btn-label span {
                font-size: 14px;
            }
            .floating-cta .close-cta {
                position: absolute;
                top: -10px;
                right: -5px;
                width: 24px;
                height: 24px;
                font-size: 12px;
                background: rgba(0,0,0,0.7);
            }
        }
    
        /* =========================================================
           COMPACT NAVBAR SAAT SCROLL
        ========================================================= */
        .site-navbar {
            transition: padding 0.25s ease, min-height 0.25s ease, box-shadow 0.25s ease;
        }

        .site-navbar.sticky {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            min-height: 60px;
        }

        .site-navbar.sticky .logo {
            max-height: 42px;
            width: auto;
            transition: max-height 0.25s ease;
        }

        @media (max-width: 991.98px) {
            .site-navbar.sticky {
                padding-top: 4px !important;
                padding-bottom: 4px !important;
                min-height: 54px;
            }

            .site-navbar.sticky .logo {
                max-height: 38px;
            }
        }

        /* =========================================================
           WHATSAPP CONSULT WIDGET (expand saat hover)
        ========================================================= */
        .wa-consult {
            position: fixed;
            right: 0;
            bottom: 120px; /* di atas tombol Floating CTA */
            z-index: 9998;
            display: flex;
            align-items: center;
            gap: 14px;
            width: 76px;
            height: 76px;
            padding: 0 0 0 12px;
            overflow: hidden;
            background: #211d17;
            border: 2px solid #d9a441;
            border-right: 0;
            border-radius: 40px 0 0 40px;
            color: #ffffff;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(0,0,0,.30);
            transition: width .4s cubic-bezier(.2,.8,.2,1), background .3s ease;
        }
        .wa-consult:hover {
            width: 330px;
            background: #2f2820;
            color: #ffffff;
        }

        .wa-consult .wa-avatar {
            position: relative;
            flex: 0 0 52px;
            width: 52px;
            height: 52px;
        }
        .wa-consult .wa-avatar .wa-circle {
            position: relative;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px solid #ffffff;
            border-radius: 50%;
            background: #f5ecd3;
            color: #d9a441;
            font-size: 26px;
            line-height: 1;
        }
        .wa-consult .wa-avatar .wa-circle img.wa-photo {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            font-size: 0;        /* sembunyikan teks alt jika gambar gagal */
            color: transparent;
        }
        .wa-consult .wa-avatar .wa-badge {
            position: absolute;
            left: -4px;
            bottom: -2px;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #25d366;
            border: 2px solid #211d17;
            border-radius: 50%;
            color: #ffffff;
            font-size: 12px;
            line-height: 1;
        }

        .wa-consult .wa-text {
            display: flex;
            flex-direction: column;
            gap: 3px;
            padding-right: 22px;
            white-space: nowrap;
            opacity: 0;
            transform: translateX(10px);
            transition: opacity .3s ease .1s, transform .3s ease .1s;
        }
        .wa-consult:hover .wa-text {
            opacity: 1;
            transform: translateX(0);
        }
        .wa-consult .wa-text .wa-title {
            font-size: 14px;
            font-weight: 800;
            color: #f4d98d;
        }
        .wa-consult .wa-text .wa-desc {
            font-size: 12px;
            font-weight: 500;
            color: rgba(255,255,255,.9);
        }
        .wa-consult .wa-text .wa-desc b { color: #ffffff; }

        @media (max-width: 576px) {
            .wa-consult {
                bottom: 100px;
                width: 66px;
                height: 66px;
                padding-left: 8px;
            }
            .wa-consult:hover { width: 66px; } /* di HP hanya ikon, tap langsung ke WhatsApp */
            .wa-consult .wa-text { display: none; }
        }


        /* =========================================================
           PRODUCT DETAIL PAGE (overlay satu halaman)
        ========================================================= */
        .product-page {
            position: fixed;
            inset: 0;
            z-index: 10001;
            overflow-y: auto;
            background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
            opacity: 0;
            visibility: hidden;
            transform: translateY(24px);
            transition: opacity .4s ease, transform .4s ease, visibility .4s;
        }
        .product-page.open {
            opacity: 1;
            visibility: visible;
            transform: none;
        }
        .product-page-bar {
            position: sticky;
            top: 0;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 5%;
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(210,120,29,.15);
        }
        .product-page-bar .pp-logo { max-height: 40px; width: auto; }
        .pp-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            background: #d9a441;
            color: #ffffff;
            border: 0;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(217,164,65,.35);
            transition: background .3s ease, transform .3s ease;
        }
        .pp-back:hover { background: #c27f3a; transform: translateX(-3px); }

        .product-page-body {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 70px;
            min-height: calc(100vh - 68px);
            padding: 50px 8%;
        }
        .pp-image {
            position: relative;
            width: 45%;
            min-height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pp-image .pp-blob {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(229,176,66,.20);
        }
        .pp-image img {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 440px;
            max-height: 480px;
            object-fit: contain;
            filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
            animation: productFloat 5s ease-in-out infinite;
        }
        .pp-info { width: 45%; max-width: 560px; }
        .pp-info .pp-label {
            display: inline-block;
            margin-bottom: 14px;
            color: #c7771b;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
        }
        .pp-info h1 {
            margin: 0 0 20px;
            color: #202020;
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.05;
            font-weight: 800;
        }
        .pp-info .pp-desc {
            margin-bottom: 30px;
            color: #625b50;
            font-size: 17px;
            line-height: 1.75;
        }
        .pp-buy {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-height: 48px;
            padding: 12px 28px;
            background: #d9a441;
            color: #ffffff;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(217,164,65,.35);
            transition: background .3s ease, transform .3s ease;
        }
        .pp-buy:hover { background: #c27f3a; color: #ffffff; transform: translateY(-3px); }

        @media (max-width: 767px) {
            .product-page-body { flex-direction: column; gap: 20px; padding: 30px 24px 60px; text-align: center; }
            .pp-image, .pp-info { width: 100%; }
            .pp-image { min-height: 280px; }
            .pp-image .pp-blob { width: 220px; height: 220px; }
            .pp-image img { max-width: 280px; max-height: 300px; }
            .pp-info .pp-desc { font-size: 14px; }
        }


        /* =========================================================
           FOOTER - COPYRIGHT + BAGIAN DARI JSR STORE
        ========================================================= */
        .footer-area .footer_copyright {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px 24px;
        }
        .footer_copyright .partof-inline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: rgba(255,255,255,.55);
            letter-spacing: .5px;
        }
        .footer_copyright .partof-inline a {
            display: inline-flex;
            align-items: center;
            color: #f4d98d;
            font-weight: 700;
            text-decoration: none;
        }
        .footer_copyright .partof-inline img {
            display: block;
            height: 26px;
            width: auto;
            opacity: .85;
            transition: opacity .3s ease, transform .3s ease;
        }
        .footer_copyright .partof-inline a:hover img { opacity: 1; transform: translateY(-2px); }
        .footer_copyright .partof-fallback { display: none; }

        @media (max-width: 767px) {
            .footer-area .footer_copyright {
                flex-direction: column;
                justify-content: center;
                text-align: center;
                gap: 10px;
            }
        }

</style>
</head>
<body>
    <!-- ============================================================
         PRELOADER
    ============================================================ -->
    <div class="preloader">
        <div class="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <!-- ============================================================
         MOBILE MENU
    ============================================================ -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- ============================================================
         NAVBAR
    ============================================================ -->
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-xl-2">
                    <h1 class="mb-0 site-logo">
                        <a href="/">
                            <img src="assets/img/logo1.png" alt="MaduJSR" class="logo">
                        </a>
                    </h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active">
                                <a class="nav-link active" href="#home" data-id="Beranda" data-en="Home">Beranda</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#products" data-id="Produk" data-en="Products">Produk</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#why-jsr" data-id="Keunggulan" data-en="Why JSR">Keunggulan</a>
                            </li>
                            <li>
                                <a class="nav-link" href="#testimonials" data-id="Testimoni" data-en="Testimonials">Testimoni</a>
                            </li>
                            <li class="has-children language-menu">
                                <a href="javascript:void(0)" class="nav-link language-toggle" aria-label="Pilih Bahasa">
                                    <img src="assets/img/flag/id.png" alt="ID" class="language-flag">
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="javascript:void(0)" class="language-option" data-lang="id" aria-label="Bahasa Indonesia">
                                            <img src="assets/img/flag/id.png" alt="ID">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="language-option" data-lang="en" aria-label="English">
                                            <img src="assets/img/flag/gb.png" alt="EN">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle float-right">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================================
         HERO
    ============================================================ -->
    <section id="home" class="home_bg">
        <video class="hero-video" autoplay muted loop playsinline preload="auto">
            <source
                src="https://res.cloudinary.com/ppuqbktw/video/upload/q_auto,f_auto/v1787329277/madu3.mp4"
                type="video/mp4"
            >
        </video>
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row w-100">
                <div class="col-lg-10 offset-lg-1 col-sm-12 text-center">
                    <div class="hero-text">
                        <h2 data-id="Madu Sehat Dari Alam" data-en="Natural Healthy Honey">Madu Sehat Dari Alam</h2>
                        <p data-id="Kami membantu anda memahami dan memilih kebaikan dari alam." data-en="We help you understand and choose nature's goodness.">
                            Kami membantu anda memahami dan memilih kebaikan dari alam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         FEATURED SERVICES
    ============================================================ -->
    <section id="featured-services" class="featured-services section">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-6 col-md-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item1" style="background-image: url('assets/img/template/murni@4x-8.png');">
                        <div class="service-content">
                            <h4 data-id="Murni &amp; Alami" data-en="Pure &amp; Natural">Murni &amp; Alami</h4>
                            <p data-id="Madu murni tanpa tambahan dan tidak dipasteurisasi untuk produk raw honey." data-en="Pure honey with no additives and not pasteurized for raw honey products.">
                                Madu murni tanpa tambahan dan tidak dipasteurisasi untuk produk raw honey.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item2" style="background-image: url('assets/img/template/kualitas@4x-8.png');">
                        <div class="service-content">
                            <h4 data-id="Teruji Kualitasnya" data-en="Quality Tested">Teruji Kualitasnya</h4>
                            <p data-id="Melalui pengujian laboratorium untuk memastikan kualitas dan keamanannya." data-en="Through laboratory testing to ensure quality and safety.">
                                Melalui pengujian laboratorium untuk memastikan kualitas dan keamanannya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item3" style="background-image: url('assets/img/template/halal@4x-8.png');">
                        <div class="service-content">
                            <h4 data-id="Tersertifikasi Halal" data-en="Halal Certified">Tersertifikasi Halal</h4>
                            <p data-id="Telah bersertifikasi halal untuk memberikan rasa aman saat dikonsumsi." data-en="Has obtained halal certification to provide peace of mind when consumed.">
                                Telah bersertifikasi halal untuk memberikan rasa aman saat dikonsumsi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item4" style="background-image: url('assets/img/template/resmi@4x-8.png');">
                        <div class="service-content">
                            <h4 data-id="Resmi &amp; Terdaftar" data-en="Official &amp; Registered">Resmi &amp; Terdaftar</h4>
                            <p data-id="Memiliki nomor P-IRT sebagai produk pangan yang resmi terdaftar." data-en="Has a P-IRT number as an officially registered food product.">
                                Memiliki nomor P-IRT sebagai produk pangan yang resmi terdaftar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         TENTANG MADU
    ============================================================ -->
    <section id="about-jsr">
        <div class="about-overlay"></div>
        <div class="container">
            <div class="about-content">
                <h2>
                    <span data-id="Kebaikan Alami dalam " data-en="Natural Goodness in ">Kebaikan Alami dalam </span>
                    <br /><em class="text-madu"><span data-id="Setiap Tetes" data-en="Every Drop">Setiap Tetes</span></em>
                </h2>
                <p data-id="Kami percaya, madu bukan sekedar pemanis." data-en="We believe honey is not just a sweetener.">
                    <strong>Kami percaya, madu bukan sekedar pemanis.</strong>
                </p>
                <p data-id="Madu adalah bagian dari alam yang dapat menemani keluarga dalam berbagai momen—diminum langsung, dicampurkan ke minuman, atau menjadi bagian dari rutinitas menjaga kebugaran tubuh." data-en="Honey is part of nature that can accompany families in various moments—drunk directly, mixed into drinks, or as part of a routine to maintain body fitness.">
                    Madu adalah bagian dari alam yang dapat menemani keluarga dalam berbagai momen—diminum langsung, dicampurkan ke minuman, atau menjadi bagian dari rutinitas menjaga kebugaran tubuh.
                </p>
                <p data-id="Karena itu, Madu JSR hadir dengan pilihan madu murni dari sumber nektar yang berbeda, sehingga setiap jenis memiliki karakter dan keunikan tersendiri." data-en="Therefore, Madu JSR offers pure honey from different nectar sources, so each type has its own character and uniqueness.">
                    Karena itu, Madu JSR hadir dengan pilihan madu murni dari sumber nektar yang berbeda, sehingga setiap jenis memiliki karakter dan keunikan tersendiri.
                </p>
            </div>
        </div>
    </section>

    <!-- ============================================================
         PRODUCT CAROUSEL
    ============================================================ -->
    <section id="products" class="product-hero">
        <br><br>
        <div id="productHeroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <?php foreach ($products as $i => $p): ?>
                <div class="carousel-item<?= $i === 0 ? ' active' : '' ?>">
                    <div class="product-slide">
                        <div class="product-image-wrapper">
                            <div class="honey-blob blob-1"></div>
                            <div class="honey-blob blob-2"></div>
                            <div class="honey-blob blob-3"></div>
                            <img src="<?= e($p['img']) ?>" class="<?= e($p['class']) ?>" alt="<?= e($p['alt']) ?>">
                        </div>
                        <div class="product-info">
                            <span class="product-label" data-id="MADU MURNI JSR" data-en="PURE HONEY JSR">MADU MURNI JSR</span>
                            <h2 data-id="<?= e($p['name']['id']) ?>" data-en="<?= e($p['name']['en']) ?>"><?= e($p['name']['id']) ?></h2>
                            <p data-id="<?= e($p['desc']['id']) ?>" data-en="<?= e($p['desc']['en']) ?>">
                                <?= e($p['desc']['id']) ?>
                            </p>
                            <a href="javascript:void(0)" class="btn btn-success" rel="noopener noreferrer" data-id="Lihat Produk" data-en="View Product">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- PANAH CAROUSEL -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#productHeroCarousel"
                    data-bs-slide="prev"
                    aria-label="Produk sebelumnya">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#productHeroCarousel"
                    data-bs-slide="next"
                    aria-label="Produk berikutnya">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- ============================================================
         WHY JSR
    ============================================================ -->
    <section id="why-jsr">
        <div class="jsr-honeycomb jsr-honeycomb-top">
            <span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <div class="jsr-honeycomb jsr-honeycomb-bottom">
            <span></span><span></span><span></span><span></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="jsr-heading">
                        <div class="jsr-heading-label" data-id="KEUNGGULAN MADU JSR" data-en="JSR HONEY ADVANTAGES">
                            <span></span>KEUNGGULAN MADU JSR
                        </div>
                        <h2 data-id="Kenapa Memilih Madu JSR?" data-en="Why Choose Madu JSR?">
                            Kenapa Memilih <em>Madu JSR?</em>
                        </h2>
                        <p data-id="Kualitas madu tidak hanya dilihat dari rasa dan warna. Kami menjaga kualitasnya dengan memperhatikan karakter alami madu dan memastikan produk melalui pengujian yang diperlukan." data-en="Honey quality is not only judged by taste and colour. We maintain quality by paying attention to the natural character of honey and ensuring the product undergoes necessary testing.">
                            Kualitas madu tidak hanya dilihat dari rasa dan warna. Kami menjaga kualitasnya dengan memperhatikan karakter alami madu dan memastikan produk melalui pengujian yang diperlukan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4 jsr-quality-grid">
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">01</span>
                        <div class="jsr-card-icon"><i class="fa fa-leaf"></i></div>
                        <h3 data-id="Madu Murni" data-en="Pure Honey">Madu Murni</h3>
                        <p data-id="Madu JSR merupakan madu murni tanpa tambahan. Produk raw honey juga tidak melalui proses pasteurisasi, sehingga karakter alaminya tetap terjaga." data-en="Madu JSR is pure honey with no additives. Raw honey products are also not pasteurised, so their natural character is preserved.">
                            Madu JSR merupakan madu murni tanpa tambahan. Produk raw honey juga tidak melalui proses pasteurisasi, sehingga karakter alaminya tetap terjaga.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">02</span>
                        <div class="jsr-stat">6,78</div>
                        <span class="jsr-badge" data-id="STANDAR SNI: 3" data-en="SNI STANDARD: 3">STANDAR SNI: 3</span>
                        <h3 data-id="Kaya Enzim Alami" data-en="Rich in Natural Enzymes">Kaya Enzim Alami</h3>
                        <p data-id="Madu JSR memiliki kadar enzim diastase 6,78, lebih tinggi dari standar SNI sebesar 3. Kadar enzim yang terjaga menjadi salah satu indikator madu tidak mengalami pemanasan berlebih." data-en="Madu JSR has a diastase enzyme level of 6.78, higher than the SNI standard of 3. Maintained enzyme levels indicate that the honey has not been overheated.">
                            Madu JSR memiliki kadar enzim diastase 6,78, lebih tinggi dari standar SNI sebesar 3. Kadar enzim yang terjaga menjadi salah satu indikator madu tidak mengalami pemanasan berlebih.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">03</span>
                        <div class="jsr-stat">39,17</div>
                        <span class="jsr-badge" data-id="BATAS MAKSIMAL: 40" data-en="MAXIMUM LIMIT: 40">BATAS MAKSIMAL: 40</span>
                        <h3 data-id="HMF Tetap Terjaga" data-en="HMF Level Maintained">HMF Tetap Terjaga</h3>
                        <p data-id="Kadar HMF Madu JSR Multifloral berada di angka 39,17, masih di bawah batas maksimal 40. Hal ini menunjukkan madu tidak terpapar pemanasan berlebihan atau penyimpanan terlalu lama." data-en="The HMF level of Madu JSR Multifloral is 39.17, still below the maximum limit of 40. This shows the honey has not been exposed to excessive heating or long storage.">
                            Kadar HMF Madu JSR Multifloral berada di angka 39,17, masih di bawah batas maksimal 40. Hal ini menunjukkan madu tidak terpapar pemanasan berlebihan atau penyimpanan terlalu lama.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">04</span>
                        <div class="jsr-card-icon"><i class="fa fa-flask"></i></div>
                        <h3 data-id="Teruji Bebas Kontaminasi" data-en="Tested Contaminant-Free">Teruji Bebas Kontaminasi</h3>
                        <p data-id="Madu JSR telah melalui pengujian dan terbukti bebas dari logam berat seperti timbal, merkuri, kadmium, dan arsen, serta bebas dari kloramfenikol." data-en="Madu JSR has been tested and proven free of heavy metals such as lead, mercury, cadmium, and arsenic, as well as free from chloramphenicol.">
                            Madu JSR telah melalui pengujian dan terbukti bebas dari logam berat seperti timbal, merkuri, kadmium, dan arsen, serta bebas dari kloramfenikol.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">05</span>
                        <div class="jsr-stat">19,08%</div>
                        <span class="jsr-badge" data-id="TEKSTUR LEBIH KENTAL" data-en="THICKER TEXTURE">TEKSTUR LEBIH KENTAL</span>
                        <h3 data-id="Kadar Air Rendah" data-en="Low Moisture Content">Kadar Air Rendah</h3>
                        <p data-id="Kadar air Madu JSR sebesar 19,08%, membuat teksturnya lebih kental dan membantu mengurangi risiko fermentasi. Madu juga tidak mudah berubah menjadi asam." data-en="The moisture content of Madu JSR is 19.08%, giving it a thicker texture and helping reduce the risk of fermentation. The honey is also less likely to turn acidic.">
                            Kadar air Madu JSR sebesar 19,08%, membuat teksturnya lebih kental dan membantu mengurangi risiko fermentasi. Madu juga tidak mudah berubah menjadi asam.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jsr-quality-card">
                        <span class="jsr-card-number">06</span>
                        <div class="jsr-stat">3,02%</div>
                        <span class="jsr-badge" data-id="BATAS MAKSIMAL: 5%" data-en="MAXIMUM LIMIT: 5%">BATAS MAKSIMAL: 5%</span>
                        <h3 data-id="Sukrosa Rendah" data-en="Low Sucrose">Sukrosa Rendah</h3>
                        <p data-id="Kadar sukrosa Madu JSR sebesar 3,02%, masih di bawah batas maksimal 5%. Kadar sukrosa yang rendah juga mendukung karakter madu yang lebih murni." data-en="The sucrose content of Madu JSR is 3.02%, still below the maximum limit of 5%. Low sucrose content also supports a purer honey character.">
                            Kadar sukrosa Madu JSR sebesar 3,02%, masih di bawah batas maksimal 5%. Kadar sukrosa yang rendah juga mendukung karakter madu yang lebih murni.
                        </p>
                        <span class="jsr-card-line"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         TESTIMONIAL (OWL CAROUSEL) - OWL DOTS HIDDEN
    ============================================================ -->
    <section id="testimonials" class="testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-4" style="max-width: 800px;">
                <h2 class="display-4 text-capitalize mb-2" data-id="Apa Kata Mereka?" data-en="What They Say?">Apa Kata Mereka?</h2>
            </div>
            <div class="owl-carousel owl-theme testimonial-carousel">
                <!-- Item 1 -->
                <div class="testimonial-item text-center p-4">
                    <p class="testimonial-text">
                        <span class="short-text" data-id="Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula." data-en="I like the honey, every time I make juice I always add honey as a sugar substitute.">Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula.</span>
                        <span class="full-text" data-id="Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula." data-en="I like the honey, every time I make juice I always add honey as a sugar substitute.">Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula.</span>
                    </p>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/testimonial/1.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client">
                    </div>
                    <h4 class="text-dark" data-id="Chairunnisa" data-en="Chairunnisa">Chairunnisa</h4>
                    <p class="m-0" style="font-size: 12px; color: #666;" data-id="Karyawan" data-en="Employee">Karyawan</p>
                    <div class="d-flex justify-content-center text-warning stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="testimonial-item text-center p-4">
                    <p class="testimonial-text">
                        <span class="short-text" data-id="Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif..." data-en="Since my child consumed hexabrain honey 760gr 3 years ago, Alhamdulillah my child is healthy & smarter & active...">Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif...</span>
                        <span class="full-text" data-id="Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif, Sampai skrg anak saya msh minum madu hexabrain pagi & malam." data-en="Since my child consumed hexabrain honey 760gr 3 years ago, Alhamdulillah my child is healthy & smarter & active, Until now my child still drinks hexabrain honey morning & night.">Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif, Sampai skrg anak saya msh minum madu hexabrain pagi & malam.</span>
                    </p>
                    <button class="read-more-btn" onclick="toggleTestimonial(this)" data-id="Baca Selengkapnya" data-en="Read More">Baca Selengkapnya</button>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/testimonial/3.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client">
                    </div>
                    <h4 class="text-dark" data-id="Purnama Sari" data-en="Purnama Sari">Purnama Sari</h4>
                    <p class="m-0" style="font-size: 12px; color: #666;" data-id="Ibu Rumah Tangga" data-en="Homemaker">Ibu Rumah Tangga</p>
                    <div class="d-flex justify-content-center text-warning stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="testimonial-item text-center p-4">
                    <p class="testimonial-text">
                        <span class="short-text" data-id="Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah..." data-en="I once bought too many packages for my child. Alhamdulillah rarely sick even though already in the school environment...">Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah...</span>
                        <span class="full-text" data-id="Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah. Sakitpun cepet sembuhnya. Klo saya, baru bulan kmrn ada miom 2cm. Trs jd rutin minum berka. Nanti klo udh kliatan hasilnya dikabarin ya kak. Lebih percaya sama produk jsr sih jelas kualitasnya." data-en="I once bought too many packages for my child. Alhamdulillah rarely sick even though already in the school environment. Even if sick, recovery is quick. For me, just last month I had a 2cm myoma. Then I started regularly drinking berka. Later when the results are visible, I'll let you know. More confident in JSR products because the quality is clear.">Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah. Sakitpun cepet sembuhnya. Klo saya, baru bulan kmrn ada miom 2cm. Trs jd rutin minum berka. Nanti klo udh kliatan hasilnya dikabarin ya kak. Lebih percaya sama produk jsr sih jelas kualitasnya.</span>
                    </p>
                    <button class="read-more-btn" onclick="toggleTestimonial(this)" data-id="Baca Selengkapnya" data-en="Read More">Baca Selengkapnya</button>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/testimonial/1.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client">
                    </div>
                    <h4 class="text-dark" data-id="Nina" data-en="Nina">Nina</h4>
                    <p class="m-0" style="font-size: 12px; color: #666;" data-id="Karyawan" data-en="Employee">Karyawan</p>
                    <div class="d-flex justify-content-center text-warning stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                
                <!-- Item 4 -->
                <div class="testimonial-item text-center p-4">
                    <p class="testimonial-text">
                        <span class="short-text" data-id="Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus." data-en="Already on our 5th order. Masya Allah, my child is healthy and doesn't get coughs and colds as often anymore. Hopefully, we'll always have enough blessings to keep ordering again and again.">Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus.</span>
                        <span class="full-text" data-id="Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus." data-en="Already on our 5th order. Masya Allah, my child is healthy and doesn't get coughs and colds as often anymore. Hopefully, we'll always have enough blessings to keep ordering again and again.">Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus.</span>
                    </p>
                    <div class="d-flex justify-content-center">
                        <img src="assets/img/testimonial/3.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client">
                    </div>
                    <h4 class="text-dark" data-id="Pujiani" data-en="Pujiani">Pujiani</h4>
                    <p class="m-0" style="font-size: 12px; color: #666;" data-id="Ibu Rumah Tangga" data-en="Homemaker">Ibu Rumah Tangga</p>
                    <div class="d-flex justify-content-center text-warning stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         FOOTER
    ============================================================ -->
    <footer class="footer-area">
        <div class="container">
            <div class="row footer-padding">
                <div class="col-lg col-md-7 col-sm-12">
                    <div class="single_footer">
                        <a href="#home">
                            <img src="assets/img/logo1.png" alt="MaduJSR" class="footer-logo">
                        </a>
                        <p style="color: rgba(255,255,255,.7); line-height: 1.7; margin-top: 10px; font-size: 14px;" data-id="Madu murni pilihan untuk menemani kesehatan keluarga dengan kebaikan alami yang terjaga." data-en="Pure honey choice to accompany family health with preserved natural goodness.">
                            Madu murni pilihan untuk menemani kesehatan keluarga dengan kebaikan alami yang terjaga.
                        </p>
                        <div class="footer-social-inline">
                            <span class="social-label" data-id="IKUTI KAMI DI MEDIA SOSIAL" data-en="FOLLOW US ON SOCIAL MEDIA">IKUTI KAMI DI MEDIA SOSIAL</span>
                            <div>
                                <a href="#" class="social-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="social-icon" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="social-icon" title="YouTube"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4 data-id="PRODUK" data-en="PRODUCTS">PRODUK</h4>
                        <div class="footer_contact">
                            <ul>
                                <li><a href="#" data-id="Madu JSR Multiflora" data-en="Madu JSR Multiflora">Madu JSR Multiflora</a></li>
                                <li><a href="#" data-id="Madu JSR Sangket" data-en="Madu JSR Sangket">Madu JSR Sangket</a></li>
                                <li><a href="#" data-id="Madu JSR Hitam" data-en="Madu JSR Black">Madu JSR Hitam</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4 data-id="INFORMASI" data-en="INFORMATION">INFORMASI</h4>
                        <div class="footer_contact">
                            <ul>
                                <li><a href="#about-jsr" data-id="Tentang Kami" data-en="About Us">Tentang Kami</a></li>
                                <li><a href="#why-jsr" data-id="Keunggulan" data-en="Advantages">Keunggulan</a></li>
                                <li><a href="#" data-id="FAQ" data-en="FAQ">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4 data-id="BANTUAN" data-en="HELP">BANTUAN</h4>
                        <div class="footer_contact">
                            <ul>
                                <li><a href="#" data-id="Cara Pemesanan" data-en="How to Order">Cara Pemesanan</a></li>
                                <li><a href="#" data-id="Pengiriman" data-en="Shipping">Pengiriman</a></li>
                                <li><a href="#" data-id="Hubungi Kami" data-en="Contact Us">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="single_footer">
                        <h4 data-id="KONTAK" data-en="CONTACT">KONTAK</h4>
                        <div class="footer_contact">
                            <ul>
                                <li style="list-style:none; margin-top:10px;">
                                    <a href="<?= e($wa_url) ?>" class="btn-wa" target="_blank" rel="noopener noreferrer">
                                        <i class="fa fa-whatsapp"></i>
                                        <span class="btn-text" data-id="WhatsApp Kami" data-en="WhatsApp Us">WhatsApp Kami</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_copyright">
                        <span class="copyright-text" data-id="© 2026 madujsr.jsrstore.id. Semua hak dilindungi." data-en="© 2026 madujsr.jsrstore.id. All rights reserved.">© Madu JSR. Semua hak dilindungi.</span>
                        <span class="partof-inline">
                            <span data-id="Bagian dari" data-en="Part of">Bagian dari</span>
                            <a href="https://jsrstore.id" target="_blank" rel="noopener noreferrer" aria-label="JSR Store">
                                <img src="assets/img/logo/jsr.png" alt="JSR Store"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                <span class="partof-fallback">jsrstore.id</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ============================================================
         PRODUCT DETAIL PAGE
    ============================================================ -->
    <div class="product-page" id="productPage" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="product-page-bar">
            <button type="button" class="pp-back" id="ppBack">
                <i class="fa fa-arrow-left"></i>
                <span data-id="Kembali" data-en="Back">Kembali</span>
            </button>
            <img src="assets/img/logo1.png" alt="MaduJSR" class="pp-logo" onerror="this.style.display='none'">
        </div>
        <div class="product-page-body">
            <div class="pp-image">
                <div class="pp-blob"></div>
                <img id="ppImg" src="" alt="">
            </div>
            <div class="pp-info">
                <span class="pp-label" id="ppLabel"></span>
                <h1 id="ppTitle"></h1>
                <p class="pp-desc" id="ppDesc"></p>
                <a id="ppBuy" class="pp-buy" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="fa fa-shopping-cart"></i>
                    <span data-id="Beli di JSR Store" data-en="Buy at JSR Store">Beli di JSR Store</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ============================================================
         WHATSAPP CONSULT WIDGET
    ============================================================ -->
    <a href="<?= e($wa_url) ?>"
       class="wa-consult"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Konsultasi via WhatsApp">
        <span class="wa-avatar">
            <span class="wa-circle">
                <i class="fa fa-user"></i>
                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20100%20100'%3E%20%3Cdefs%3E%3ClinearGradient%20id='bg'%20x1='0'%20y1='0'%20x2='0'%20y2='1'%3E%3Cstop%20offset='0'%20stop-color='%23fdf3d8'/%3E%3Cstop%20offset='1'%20stop-color='%23f0d9a0'/%3E%3C/linearGradient%3E%3C/defs%3E%20%3Crect%20width='100'%20height='100'%20fill='url(%23bg)'/%3E%20%3Cpath%20d='M14%20100c0-24%2015-32%2036-32s36%208%2036%2032z'%20fill='%238f1d27'/%3E%20%3Cpath%20d='M30%20100c2-14%209-22%2020-22s18%208%2020%2022z'%20fill='%23ffffff'/%3E%20%3Cellipse%20cx='50'%20cy='44'%20rx='27'%20ry='31'%20fill='%23b3262e'/%3E%20%3Cellipse%20cx='50'%20cy='47'%20rx='17'%20ry='20'%20fill='%23f3cfae'/%3E%20%3Cpath%20d='M33%2040c4-9%2012-13%2017-13s13%204%2017%2013c-6-5-12-7-17-7s-11%202-17%207z'%20fill='%23b3262e'/%3E%20%3Cpath%20d='M41%2041q2-2%205%200M54%2041q3-2%205%200'%20stroke='%234a2c1d'%20stroke-width='1.4'%20fill='none'%20stroke-linecap='round'/%3E%20%3Ccircle%20cx='43.5'%20cy='46'%20r='1.9'%20fill='%233b2418'/%3E%3Ccircle%20cx='56.5'%20cy='46'%20r='1.9'%20fill='%233b2418'/%3E%20%3Ccircle%20cx='39'%20cy='53'%20r='3'%20fill='%23f0a79a'%20opacity='.45'/%3E%3Ccircle%20cx='61'%20cy='53'%20r='3'%20fill='%23f0a79a'%20opacity='.45'/%3E%20%3Cpath%20d='M44%2056q6%206%2012%200'%20stroke='%23b5524a'%20stroke-width='1.6'%20fill='none'%20stroke-linecap='round'/%3E%20%3Cpath%20d='M25%2046c0-20%2011-28%2025-28s25%208%2025%2028'%20stroke='%23211d17'%20stroke-width='3'%20fill='none'%20stroke-linecap='round'/%3E%20%3Crect%20x='21'%20y='44'%20width='7'%20height='12'%20rx='3.5'%20fill='%23211d17'/%3E%3Crect%20x='72'%20y='44'%20width='7'%20height='12'%20rx='3.5'%20fill='%23211d17'/%3E%20%3Cpath%20d='M24%2056q2%2014%2020%2015'%20stroke='%23211d17'%20stroke-width='2'%20fill='none'%20stroke-linecap='round'/%3E%20%3Ccircle%20cx='46'%20cy='71'%20r='3'%20fill='%23d9a441'/%3E%20%3C/svg%3E" alt="Customer Service" class="wa-photo" onerror="this.style.display='none'">
            </span>
            <span class="wa-badge"><i class="fa fa-whatsapp"></i></span>
        </span>
        <span class="wa-text">
            <span class="wa-title" data-id="Ada Pertanyaan?" data-en="Have a Question?">Ada Pertanyaan?</span>
            <span class="wa-desc" data-id="Klik untuk konsultasi GRATIS sekarang!" data-en="Click for a FREE consultation now!">Klik untuk konsultasi GRATIS sekarang!</span>
        </span>
    </a>

    <!-- ============================================================
         FLOATING CTA
    ============================================================ -->
    <div class="floating-cta" id="floatingCta">
        <button class="close-cta" onclick="closeFloatingCta()" aria-label="Tutup">
            <i class="fa fa-times"></i>
        </button>
        <a href="https://jsrstore.id/products?category_name=madu" target="_blank" rel="noopener noreferrer" class="floating-btn">
            <i class="fa fa-shopping-cart"></i>
            <span class="btn-label">
                <small data-id="Belanja Sekarang" data-en="Shop Now">Belanja Sekarang</small>
                <span data-id="Madu Murni JSR" data-en="Pure Madu JSR">Madu Murni JSR</span>
            </span>
        </a>
    </div>

    <!-- ============================================================
         JAVASCRIPT
    ============================================================ -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/modernizr-2.8.3.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/menu.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.mixitup.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/scrolltopcontrol.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/aos/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- ============================================================
         INITIALIZATION
    ============================================================ -->
    <script>
        function toggleTestimonial(btn) {
            var textContainer = btn.previousElementSibling;
            
            if (textContainer.classList.contains('show-full')) {
                textContainer.classList.remove('show-full');
                // Gunakan data-id atau data-en sesuai bahasa yang aktif
                var currentLang = localStorage.getItem('language') || 'id';
                if (currentLang === 'en') {
                    btn.textContent = btn.getAttribute('data-en') || 'Read More';
                } else {
                    btn.textContent = btn.getAttribute('data-id') || 'Baca Selengkapnya';
                }
            } else {
                textContainer.classList.add('show-full');
                // Teks "Sembunyikan" / "Hide" sesuai bahasa
                var currentLang = localStorage.getItem('language') || 'id';
                if (currentLang === 'en') {
                    btn.textContent = 'Hide';
                } else {
                    btn.textContent = 'Sembunyikan';
                }
            }
        }

        function closeFloatingCta() {
            var cta = document.getElementById('floatingCta');
            cta.classList.remove('active');
            localStorage.setItem('floatingCtaClosed', 'true');
        }

        document.addEventListener("DOMContentLoaded", function () {
            if (typeof AOS !== "undefined") {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 80
                });
            }

            window.addEventListener('scroll', function() {
                var navbar = document.querySelector('.site-navbar');
                if (window.scrollY > 80) {
                    navbar.classList.add('sticky');
                } else {
                    navbar.classList.remove('sticky');
                }
            });

            var floatingCta = document.getElementById('floatingCta');
            var whySection = document.getElementById('why-jsr');
            var isCtaClosed = localStorage.getItem('floatingCtaClosed') === 'true';

            function checkFloatingCta() {
                if (isCtaClosed) {
                    floatingCta.classList.remove('active');
                    return;
                }
                if (!whySection) return;
                var rect = whySection.getBoundingClientRect();
                var windowHeight = window.innerHeight;
                if (rect.top < windowHeight * 0.6 && rect.bottom > 0) {
                    floatingCta.classList.add('active');
                } else {
                    floatingCta.classList.remove('active');
                }
            }

            window.addEventListener('scroll', checkFloatingCta);
            window.addEventListener('resize', checkFloatingCta);
            setTimeout(checkFloatingCta, 500);

            const carousel = document.getElementById("productHeroCarousel");
            if (carousel) {
                new bootstrap.Carousel(carousel, {
                    interval: 5000,
                    ride: "carousel",
                    pause: false,
                    wrap: true
                });
            }

            if (typeof jQuery !== "undefined" && typeof jQuery.fn.owlCarousel !== "undefined") {
                $(".testimonial-carousel").owlCarousel({
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 1000,
                    loop: true,
                    margin: 15,
                    nav: false,
                    dots: false,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    responsive: {
                        0: { items: 1 },
                        768: { items: 2 },
                        1200: { items: 3 }
                    }
                });
            } else {
                console.warn("Owl Carousel tidak tersedia.");
            }

            document.querySelectorAll('a[href^="#"]').forEach(function (link) {
                link.addEventListener("click", function (e) {
                    const target = document.querySelector(this.getAttribute("href"));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: "smooth", block: "start" });
                    }
                });
            });
        });
    </script>

    <!-- ============================================================
         LANGUAGE SWITCHER (tombol menampilkan bendera bahasa aktif)
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const languageOptions = document.querySelectorAll('.language-option');

            function changeLanguage(lang) {
                document.querySelectorAll('[data-id][data-en]').forEach(function (el) {
                    el.textContent = (lang === 'en') ? el.getAttribute('data-en') : el.getAttribute('data-id');
                });

                languageOptions.forEach(function (opt) {
                    opt.classList.toggle('active', opt.getAttribute('data-lang') === lang);
                });

                // Ganti bendera di tombol (termasuk salinan menu mobile)
                var flagSrc = (lang === 'en') ? 'assets/img/flag/gb.png' : 'assets/img/flag/id.png';
                document.querySelectorAll('.language-toggle .language-flag').forEach(function (img) {
                    img.src = flagSrc;
                    img.alt = (lang === 'en') ? 'EN' : 'ID';
                });

                localStorage.setItem('language', lang);
                document.documentElement.lang = lang;

                var dropdown = document.querySelector('.language-menu .dropdown');
                if (dropdown) {
                    dropdown.style.display = 'none';
                    setTimeout(function () { dropdown.style.display = ''; }, 150);
                }
            }

            // Event delegation supaya klik di menu mobile (hasil clone) juga bekerja
            document.addEventListener('click', function (e) {
                var option = e.target.closest('.language-option');
                if (option) {
                    e.preventDefault();
                    changeLanguage(option.getAttribute('data-lang'));
                    return;
                }
                var toggle = e.target.closest('.language-toggle');
                if (toggle) {
                    e.preventDefault();
                    var current = localStorage.getItem('language') || 'id';
                    changeLanguage(current === 'id' ? 'en' : 'id');
                }
            });

            // Selalu mulai dari Bahasa Indonesia setiap halaman dibuka
            changeLanguage('id');
        });
    </script>

    <!-- ============================================================
         MOUSE SWIPE UNTUK PRODUCT CAROUSEL
    ============================================================ -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const carouselElement = document.getElementById('productHeroCarousel');
            if (!carouselElement) return;

            let carouselInstance = bootstrap.Carousel.getInstance(carouselElement);
            if (!carouselInstance) {
                carouselInstance = new bootstrap.Carousel(carouselElement, {
                    interval: 5000,
                    ride: 'carousel',
                    pause: false,
                    wrap: true
                });
            }

            let startX = 0, startY = 0;
            let isDragging = false, isSwiping = false, isSwipingHorizontal = false;

            const startDrag = (e) => {
                const clientX = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
                const clientY = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
                startX = clientX;
                startY = clientY;
                isDragging = true;
                isSwiping = false;
                isSwipingHorizontal = false;
                carouselElement.style.cursor = 'grabbing';
                carouselElement.style.userSelect = 'none';
            };

            const moveDrag = (e) => {
                if (!isDragging) return;
                const clientX = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
                const clientY = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
                const diffX = clientX - startX;
                const diffY = clientY - startY;

                if (!isSwiping) {
                    if (Math.abs(diffX) > 8 || Math.abs(diffY) > 8) {
                        isSwiping = true;
                        isSwipingHorizontal = Math.abs(diffX) > Math.abs(diffY);
                    }
                    return;
                }
                if (isSwipingHorizontal) {
                    e.preventDefault();
                }
            };

            const endDrag = (e) => {
                if (!isDragging) return;
                isDragging = false;
                carouselElement.style.cursor = 'grab';
                carouselElement.style.userSelect = '';

                const clientX = e.clientX || (e.changedTouches && e.changedTouches[0] && e.changedTouches[0].clientX) || 0;
                const diffX = clientX - startX;

                if (isSwiping && isSwipingHorizontal && Math.abs(diffX) > 50) {
                    if (diffX > 0) {
                        carouselInstance.prev();
                    } else {
                        carouselInstance.next();
                    }
                }
                isSwiping = false;
                isSwipingHorizontal = false;
            };

            carouselElement.addEventListener('mousedown', startDrag);
            document.addEventListener('mousemove', moveDrag);
            document.addEventListener('mouseup', endDrag);
            carouselElement.addEventListener('touchstart', startDrag, { passive: true });
            document.addEventListener('touchmove', moveDrag, { passive: false });
            document.addEventListener('touchend', endDrag);

            carouselElement.querySelectorAll('img').forEach(img => {
                img.addEventListener('dragstart', (e) => e.preventDefault());
            });

            carouselElement.style.cursor = 'grab';
        });
    </script>

    <!-- ============================================================
         PRODUCT DETAIL PAGE - SCRIPT
    ============================================================ -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Link beli, urutannya sama dengan urutan slide
        var BUY_LINKS = <?= json_encode(array_column($products, 'link'), JSON_UNESCAPED_SLASHES) ?>;

        var page     = document.getElementById('productPage');
        var ppImg    = document.getElementById('ppImg');
        var ppLabel  = document.getElementById('ppLabel');
        var ppTitle  = document.getElementById('ppTitle');
        var ppDesc   = document.getElementById('ppDesc');
        var ppBuy    = document.getElementById('ppBuy');
        var ppBack   = document.getElementById('ppBack');
        var carouselEl = document.getElementById('productHeroCarousel');
        var slides   = Array.prototype.slice.call(carouselEl.querySelectorAll('.carousel-item'));
        var openedByClick = false;

        function copyText(target, source) {
            // data-id / data-en ikut disalin, jadi teks ikut berganti saat bahasa diubah
            target.setAttribute('data-id', source.getAttribute('data-id') || source.textContent.trim());
            target.setAttribute('data-en', source.getAttribute('data-en') || source.textContent.trim());
            target.textContent = source.textContent.trim();
        }

        function fill(i) {
            var s = slides[i];
            var img = s.querySelector('.product-image-wrapper img');
            ppImg.src = img.getAttribute('src');
            ppImg.alt = img.alt;
            copyText(ppLabel, s.querySelector('.product-label'));
            copyText(ppTitle, s.querySelector('.product-info h2'));
            copyText(ppDesc,  s.querySelector('.product-info p'));
            ppBuy.href = BUY_LINKS[i] || '#';
        }

        function openPage(i) {
            fill(i);
            page.classList.add('open');
            page.setAttribute('aria-hidden', 'false');
            page.scrollTop = 0;
            document.body.style.overflow = 'hidden';
            var inst = bootstrap.Carousel.getInstance(carouselEl);
            if (inst) inst.pause();
        }

        function closePage() {
            if (!page.classList.contains('open')) return;
            page.classList.remove('open');
            page.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            var inst = bootstrap.Carousel.getInstance(carouselEl);
            if (inst) inst.cycle();
        }

        function route() {
            var m = /^#produk-(\d+)$/.exec(location.hash);
            if (m && slides[+m[1]]) openPage(+m[1]);
            else closePage();
        }

        // Klik tombol "Lihat Produk"
        carouselEl.querySelectorAll('.product-info .btn').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                var idx = slides.indexOf(btn.closest('.carousel-item'));
                openedByClick = true;
                location.hash = '#produk-' + idx;
            });
        });

        // Tombol Kembali
        ppBack.addEventListener('click', function () {
            if (openedByClick) {
                openedByClick = false;
                history.back();
            } else {
                history.replaceState(null, '', location.pathname + location.search);
                route();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && page.classList.contains('open')) ppBack.click();
        });

        window.addEventListener('hashchange', route);
        route(); // jika halaman dibuka langsung dengan #produk-N
    });
    </script>
</body>
</html>