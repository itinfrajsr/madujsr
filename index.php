<?php
	/* =========================================================
	   KONTEN DIKELOLA OLEH CMS (lihat folder /cms)
	   Panel admin: /cms/admin/
	========================================================= */
	require __DIR__ . '/cms/bootstrap.php';

	$wa_url = cms_wa_url();

	[$products, $details] = cms_load_products();   // produk + detail
	$trust        = cms_load_trust();               // "Alasan Dipercaya"
	$services     = cms_load_services();            // 4 kotak highlight
	$advantages   = cms_load_advantages();          // kartu keunggulan
	$testimonials = cms_load_testimonials();
	$social = array_filter([
		'Facebook'  => ['fa-facebook',  setting('facebook')],
		'Instagram' => ['fa-instagram', setting('instagram')],
		'YouTube'   => ['fa-youtube',   setting('youtube')],
	], function ($s) { return $s[1] !== ''; });

	$product_hash_map = [];
	foreach ($products as $i => $p) $product_hash_map['#' . $p['slug']] = $i;
	?>
	<!DOCTYPE html>
	<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= e(setting('site_title', 'MaduJSR')) ?></title>

		<link rel="preconnect" href="https://res.cloudinary.com" crossorigin>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="assets/img/logo1.png" />
		<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,500;1,800&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link rel="stylesheet" href="assets/fonts/themify-icons.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/fonts.css">
		<link rel="stylesheet" href="assets/css/prettyPhoto.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/menu.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		<link rel="stylesheet" href="assets/aos/aos.css">

		<style>
			html { scroll-behavior: smooth; }
			body { margin: 0; font-family: 'Exo', sans-serif; background: #ffffff; }
			section { position: relative; }

			/* HERO */
			#home {
				position: relative; width: 100%; height: 100vh; min-height: 600px; overflow: hidden;
				background-image: url("assets/img/bg/honeycomb-dripping-honey-with-bees-flying.jpg");
				background-size: cover; background-position: center center; background-repeat: no-repeat;
			}
			#home .hero-video {
				position: absolute; top: 50%; left: 50%; width: 100%; height: 100%;
				transform: translate(-50%, -50%); object-fit: cover; z-index: 0; pointer-events: none;
			}
			#home .hero-overlay {
				position: absolute; top: 0; left: 0; width: 100%; height: 100%;
				background: linear-gradient(90deg, rgba(20,15,8,.60) 0%, rgba(20,15,8,.28) 48%, rgba(20,15,8,.14) 100%);
				z-index: 1; pointer-events: none;
			}
			#home .hero-content {
				position: relative; z-index: 2; height: 100%; display: flex; align-items: center; padding-top: 70px;
			}
			#home .hero-text { position: relative; z-index: 3; max-width: 850px; margin: 0 auto; }
			#home .hero-text h2 {
				position: relative; z-index: 3; margin: 0 0 18px; color: #ffffff;
				font-size: clamp(38px, 5.2vw, 70px); line-height: 1.08; font-weight: 800;
				letter-spacing: -1.2px; text-shadow: 0 5px 25px rgba(0,0,0,.30);
			}
			#home .hero-text p {
				position: relative; z-index: 3; max-width: 680px; margin: 0 auto;
				color: rgba(255,255,255,.94); font-size: clamp(16px, 1.6vw, 21px);
				line-height: 1.7; font-weight: 400; text-shadow: 0 2px 10px rgba(0,0,0,.28);
			}

			/* FEATURED SERVICES */
			#featured-services { position: relative; margin: 0; padding: 90px 0; background: #f2e7cb; overflow: hidden; }
			#featured-services::before {
				content: ""; position: absolute; top: -90px; left: -130px; width: 420px; height: 420px;
				background-image: url('assets/img/template/graphic-hexagon.png');
				background-size: 60px 104px; background-repeat: repeat; opacity: .55; pointer-events: none; z-index: 0;
				}
			#featured-services::after {
				content: ""; position: absolute; bottom: -110px; right: -130px; width: 420px; height: 420px;
				background-image: url('assets/img/template/graphic-hexagon.png');
				background-size: 60px 104px; background-repeat: repeat; opacity: .55; pointer-events: none; z-index: 0;
			}
			#featured-services .service-item1, .service-item2, .service-item3, .service-item4 {
				position: relative; z-index: 1; width: 100%; max-width: 250px; margin: 0 auto;
				padding: 50px 18px 30px;
				background-size: 100% 100% !important; background-position: center !important;
				background-repeat: no-repeat !important; text-align: center; min-height: 350px;
				display: flex; align-items: center; justify-content: center;
				transition: transform .35s ease, box-shadow .35s ease;
			}
			#featured-services .service-item1:hover, .service-item2:hover,
			#featured-services .service-item3:hover, .service-item4:hover { transform: translateY(-8px); }
			#featured-services .service-content { width: 100%; padding-top: 20px; }
			#featured-services .service-item1 h4, .service-item2 h4,
			#featured-services .service-item3 h4, .service-item4 h4 {
				margin: 0 0 8px; font-size: 1.05rem; font-weight: 700; color: #2b2018;
			}
			#featured-services .service-item1 p, .service-item2 p,
			#featured-services .service-item3 p, .service-item4 p {
				margin: 0; color: #2b2018; opacity: .85; font-size: .82rem; line-height: 1.55;
				max-width: 200px; margin-left: auto; margin-right: auto;
			}
			@media (max-width: 767px) {
				#featured-services { padding: 60px 0 50px; }
				#featured-services .service-item1, .service-item2, .service-item3, .service-item4 {
					max-width: 200px; min-height: 240px; padding: 40px 12px 20px;
				}
				#featured-services .service-item1 h4, .service-item2 h4,
				#featured-services .service-item3 h4, .service-item4 h4 { font-size: 0.9rem; }
				#featured-services .service-item1 p, .service-item2 p,
				#featured-services .service-item3 p, .service-item4 p { font-size: 0.75rem; max-width: 160px; }
			}

			/* ABOUT */
			#about-jsr {
				position: relative; min-height: 620px; display: flex; align-items: center; justify-content: center;
				overflow: hidden;
				background: linear-gradient(rgba(25,18,8,.35), rgba(25,18,8,.40)), url("assets/img/bg/honeycomb-dripping-honey-with-bees-flying (1).jpg");
				background-size: cover; background-position: center; background-attachment: fixed;
			}
			#about-jsr .about-overlay {
				position: absolute; inset: 0; background: radial-gradient(circle at center, rgba(0,0,0,.05), rgba(0,0,0,.40)); z-index: 1;
			}
			#about-jsr .about-content {
				position: relative; z-index: 2; max-width: 850px; margin: 0 auto;
				padding: 100px 20px; color: #ffffff; text-align: center;
			}
			#about-jsr .about-content h2 {
				margin-bottom: 22px; font-size: clamp(36px, 5vw, 58px);
				line-height: 1.15; font-weight: 800; text-shadow: 0 4px 20px rgba(0,0,0,.35);
			}
			#about-jsr .about-content h2 em { color: #f0b44d; font-style: italic; }
			#about-jsr .about-content p {
				margin-bottom: 14px; color: rgba(255,255,255,.94);
				font-size: 17px; line-height: 1.8; text-shadow: 0 2px 10px rgba(0,0,0,.3);
			}

			/* PRODUCTS */
			#products { position: relative; overflow: hidden; background: #ffffff; z-index: 2; }
			#productHeroCarousel { width: 100%; overflow: hidden; }
			#productHeroCarousel .carousel-control-prev,
			#productHeroCarousel .carousel-control-next {
				position: absolute; top: 50%; bottom: auto; width: 52px; height: 52px;
				transform: translateY(-50%); opacity: 1; z-index: 20; border: 0; border-radius: 50%;
				background: rgba(217, 164, 65, 0.95); box-shadow: 0 8px 22px rgba(80, 60, 25, 0.20);
				transition: all .3s ease;
			}
			#productHeroCarousel .carousel-control-prev { left: 22px; }
			#productHeroCarousel .carousel-control-next { right: 22px; }
			#productHeroCarousel .carousel-control-prev:hover,
			#productHeroCarousel .carousel-control-next:hover {
				background: #c27f3a; transform: translateY(-50%) scale(1.08);
				box-shadow: 0 12px 28px rgba(80, 60, 25, 0.28);
			}
			#productHeroCarousel .carousel-control-prev-icon,
			#productHeroCarousel .carousel-control-next-icon { width: 22px; height: 22px; background-size: 100% 100%; }
			@media (max-width: 767px) {
				#productHeroCarousel .carousel-control-prev,
				#productHeroCarousel .carousel-control-next { width: 42px; height: 42px; }
				#productHeroCarousel .carousel-control-prev { left: 10px; }
				#productHeroCarousel .carousel-control-next { right: 10px; }
				#productHeroCarousel .carousel-control-prev-icon,
				#productHeroCarousel .carousel-control-next-icon { width: 17px; height: 17px; }
			}
			#products .carousel-item { width: 100%; }
			.product-slide {
				min-height: 620px; padding: 80px 8%;
				display: flex; align-items: center; justify-content: center; gap: 80px;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
			}
			.product-image-wrapper {
				position: relative; width: 50%; min-height: 480px;
				display: flex; align-items: center; justify-content: center;
			}
			.product-image, .product-image1, .product-image2, .product-image3, .product-image4 {
				position: relative; z-index: 5; max-width: 480px; width: 100%;
				max-height: 500px; object-fit: contain;
				filter: drop-shadow(0 25px 30px rgba(65,45,20,.18));
				animation: productFloat 5s ease-in-out infinite;
			}
			.product-image1, .product-image2, .product-image3, .product-image4 { max-height: 400px; }
			@keyframes productFloat {
				0%, 100% { transform: translateY(0); }
				50% { transform: translateY(-12px); }
			}
			.honey-blob { position: absolute; border-radius: 50%; filter: blur(1px); pointer-events: none; }
			.blob-1 { width: 270px; height: 270px; background: rgba(229,176,66,.18); top: 50%; left: 50%; transform: translate(-50%, -50%); }
			.blob-2 { width: 130px; height: 130px; background: rgba(216,133,25,.10); top: 20%; left: 18%; animation: blobFloat 4s ease-in-out infinite; }
			.blob-3 { width: 100px; height: 100px; background: rgba(242,193,87,.16); right: 15%; bottom: 18%; animation: blobFloat 5s ease-in-out infinite reverse; }
			@keyframes blobFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }

			.product-info { position: relative; z-index: 10; width: 45%; max-width: 550px; }
			.product-label { display: inline-block; margin-bottom: 14px; color: #c7771b; font-size: 12px; font-weight: 800; letter-spacing: 2px; }
			.product-info h2 {
				margin: 0 0 20px; color: #202020; font-size: clamp(40px, 5vw, 64px);
				line-height: 1.05; font-weight: 800;
			}
			.product-info p { max-width: 500px; margin-bottom: 28px; color: #625b50; font-size: 17px; line-height: 1.75; }
			.product-info .btn {
				position: relative; z-index: 20;
				display: inline-flex; align-items: center; justify-content: center;
				min-width: 145px; min-height: 48px; padding: 12px 25px;
				border: none; border-radius: 50px; background: #d9a441; color: #ffffff;
				font-weight: 700; box-shadow: 0 10px 25px rgba(217,164,65,.35);
				transition: transform .3s ease, background .3s ease, box-shadow .3s ease;
			}
			.product-info .btn:hover {
				background: #c27f3a; transform: translateY(-3px);
				box-shadow: 0 15px 30px rgba(194,127,58,.40);
			}

			/* WHY JSR */
			#why-jsr {
				position: relative; z-index: 10; margin-top: 90px; padding: 100px 0 120px; overflow: hidden;
				background: radial-gradient(circle at 15% 15%, rgba(255,255,255,.75), transparent 32%),
							linear-gradient(135deg, #faf3df 0%, #f5ecd3 55%, #efe3c1 100%);
			}
			.jsr-heading { position: relative; z-index: 5; margin-bottom: 45px; }
			.jsr-heading-label {
				display: flex; align-items: center; gap: 10px; margin-bottom: 15px;
				color: #c8751c; font-size: 11px; font-weight: 800; letter-spacing: 2px;
			}
			.jsr-heading-label span { width: 40px; height: 3px; display: inline-block; border-radius: 99px; background: #d2781d; }
			.jsr-heading h2 {
				margin: 0; color: #191919; font-size: clamp(38px, 4vw, 55px);
				line-height: 1.08; font-weight: 800; letter-spacing: -1.5px;
			}
			.jsr-heading h2 em { color: #d2781d; font-style: italic; }
			.jsr-heading p { max-width: 900px; margin: 18px 0 0; color: #303030; font-size: 16px; line-height: 1.75; }
			.jsr-quality-card {
				position: relative; height: 100%; min-height: 310px; padding: 32px; overflow: hidden;
				background: #ffffff; border: 1px solid rgba(255,255,255,.95); border-radius: 24px;
				box-shadow: 0 12px 32px rgba(80,60,25,.09);
				opacity: 1 !important; visibility: visible !important;
				transition: transform .45s cubic-bezier(.2,.8,.2,1), box-shadow .45s ease, border-color .45s ease;
			}
			.jsr-quality-card:hover {
				transform: translateY(-10px); border-color: rgba(210,120,29,.35);
				box-shadow: 0 25px 50px rgba(80,60,25,.15);
			}
			.jsr-card-number {
				position: absolute; top: 20px; right: 25px;
				color: rgba(210,120,29,.18); font-size: 13px; font-weight: 800; letter-spacing: 1px;
			}
			.jsr-card-icon {
				width: 58px; height: 58px; display: flex; align-items: center; justify-content: center;
				margin-bottom: 18px; border-radius: 18px; background: #fff3d8; color: #d2781d;
				font-size: 28px; transition: .4s ease;
			}
			.jsr-quality-card:hover .jsr-card-icon { transform: translateY(-3px) rotate(-5deg) scale(1.08); background: #ffe7b2; }
			.jsr-stat {
				color: #d2781d; font-size: clamp(42px, 4vw, 53px); line-height: 1;
				font-weight: 800; letter-spacing: -2px; margin-bottom: 10px;
			}
			.jsr-badge {
				display: inline-block; margin-bottom: 15px; padding: 5px 10px;
				border-radius: 50px; background: #fff1d2; color: #7b4c14; font-size: 9px; font-weight: 800;
			}
			.jsr-quality-card h3 {
				position: relative; z-index: 2; margin: 0 0 14px; color: #191919;
				font-size: 23px; line-height: 1.3; font-weight: 750;
			}
			.jsr-quality-card p { position: relative; z-index: 2; margin: 0; color: #292929; font-size: 14px; line-height: 1.7; }
			.jsr-card-line {
				position: absolute; left: 32px; bottom: 22px; width: 0; height: 3px;
				border-radius: 99px; background: #d2781d; transition: width .45s ease;
			}
			.jsr-quality-card:hover .jsr-card-line { width: 55px; }
			.jsr-honeycomb { position: absolute; width: 250px; height: 300px; z-index: 1; pointer-events: none; opacity: .55; }
			.jsr-honeycomb-top { top: 20px; right: -40px; }
			.jsr-honeycomb-bottom { bottom: 0; left: -60px; transform: rotate(180deg); }
			.jsr-honeycomb span {
				position: absolute; width: 52px; height: 60px;
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
			@keyframes jsrHoneyFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-7px); } }
			.jsr-quality-card { animation: jsrCardIn .7s ease both; }
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

			/* TESTIMONIAL */
			.testimonial { position: relative; padding: 90px 0 100px; background: #fffaf0; overflow: hidden; }
			.testimonial h4.text-uppercase { color: #d2781d !important; font-weight: 800; letter-spacing: 2px; }
			.testimonial h1 { color: #211d17; font-weight: 800; margin-bottom: 15px; }
			.testimonial .testimonial-item {
				height: 100%; margin: 8px; padding: 22px 18px !important;
				background: #ffffff; border: 1px solid rgba(210,120,29,.15); border-radius: 20px;
				box-shadow: 0 8px 25px rgba(80,60,25,.09);
				transition: transform .35s ease, box-shadow .35s ease;
				display: flex !important; flex-direction: column; min-height: 240px !important;
			}
			.testimonial .testimonial-item:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(80,60,25,.14); }
			.testimonial .testimonial-item .testimonial-text { flex: 0 1 auto; margin-bottom: 6px; font-size: 13px; line-height: 1.5; }
			.testimonial .testimonial-item .testimonial-text .short-text { display: block; }
			.testimonial .testimonial-item .testimonial-text .full-text { display: none; }
			.testimonial .testimonial-item .testimonial-text.show-full .short-text { display: none; }
			.testimonial .testimonial-item .testimonial-text.show-full .full-text { display: block; }
			.testimonial .testimonial-item .read-more-btn {
				display: inline-block; margin-top: 2px; padding: 2px 14px;
				background: transparent; border: 1px solid #d9a441; border-radius: 20px;
				color: #d2781d; font-size: 10px; font-weight: 600; cursor: pointer;
				transition: all 0.3s ease; align-self: flex-start;
			}
			.testimonial .testimonial-item .read-more-btn:hover { background: #d9a441; color: #ffffff; }
			.testimonial .testimonial-item > p:first-child {
				min-height: 30px !important; color: #625b50; font-size: 13px; line-height: 1.6;
			}
			.testimonial .testimonial-item img {
				width: 60px !important; height: 60px !important;
				margin-top: 4px; margin-bottom: 4px; object-fit: cover;
				border: 3px solid #d9a441 !important; border-radius: 50% !important;
			}
			.testimonial .testimonial-item h4 {
				margin-bottom: 0px; color: #211d17 !important; font-size: 16px; font-weight: 800; line-height: 1.3;
			}
			.testimonial .testimonial-item .stars {
				display: flex; justify-content: center; gap: 3px; color: #d9a441; font-size: 11px; margin-top: 2px;
			}
			.testimonial .owl-nav .owl-prev {
				position: absolute; top: -58px; right: 0; background: #d2781d; color: #ffffff;
				padding: 5px 30px; border-radius: 30px; transition: .5s;
			}
			.testimonial .owl-nav .owl-prev:hover { background: #a85c13; color: #ffffff; }
			.testimonial .owl-nav .owl-next {
				position: absolute; top: -58px; right: 88px; background: #d2781d; color: #ffffff;
				padding: 5px 30px; border-radius: 30px; transition: .5s;
			}
			.testimonial .owl-nav .owl-next:hover { background: #a85c13; color: #ffffff; }
			.testimonial-carousel .owl-dots { display: none !important; }

			.testimonial .testimonial-item {
				height: 300px !important;
				overflow: hidden;
			}
			.testimonial .testimonial-item .testimonial-text {
				flex: 1 1 auto;
				min-height: 0;
				margin-bottom: 8px;
				overflow-y: auto;
				scrollbar-width: thin;
				scrollbar-color: #d9a441 transparent;
			}
			.testimonial .testimonial-item .testimonial-text::-webkit-scrollbar { width: 4px; }
			.testimonial .testimonial-item .testimonial-text::-webkit-scrollbar-thumb { background: #d9a441; border-radius: 4px; }
			.testimonial .testimonial-item .read-more-btn {
				flex: 0 0 auto;
				align-self: center;
				margin-bottom: 6px;
			}
			.testimonial .testimonial-item > .d-flex:not(.stars) { margin-top: auto; flex: 0 0 auto; }
			@media (max-width: 767px) {
				.testimonial .testimonial-item { height: 330px !important; }
			}
			@media (min-width: 992px) {
				.testimonial .testimonial-item { margin: 10px; }
				.testimonial .container .row:first-child { margin-bottom: 30px; }
			}
			@media (max-width: 767px) {
				.testimonial { padding: 60px 0 70px; }
				.testimonial .testimonial-item { margin: 4px; padding: 16px 14px !important; min-height: 200px !important; }
				.testimonial .testimonial-item .testimonial-text { font-size: 12px; }
				.testimonial .testimonial-item > p:first-child { min-height: 20px !important; font-size: 12px; }
				.testimonial .testimonial-item img { width: 48px !important; height: 48px !important; border-width: 2px !important; }
				.testimonial .testimonial-item h4 { font-size: 14px; }
				.testimonial .owl-nav .owl-prev,
				.testimonial .owl-nav .owl-next { top: -30px; padding: 3px 18px; font-size: 12px; }
				.testimonial .owl-nav .owl-next { right: 55px; }
				.testimonial .owl-nav .owl-prev { right: 0; }
				.testimonial .testimonial-item .read-more-btn { font-size: 9px; padding: 1px 12px; }
			}
			@media (max-width: 991px) {
				.testimonial .owl-nav .owl-prev,
				.testimonial .owl-nav .owl-next { top: -30px; padding: 3px 20px; }
				.testimonial .owl-nav .owl-next { right: 60px; }
			}

			/* MOBILE */
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
			@media (max-width: 991px) {
				#about-jsr {
					background-attachment: scroll !important;
					background-position: center center !important;
					min-height: 480px;
				}
			}

			/* MENU + FLAG */
			.site-menu-toggle {
				display: block; text-align: right; padding: 5px 0;
				color: #333; font-size: 28px; line-height: 1; text-decoration: none;
			}
			.site-menu-toggle:hover { color: #d9a441; }
			@media (max-width: 991.98px) {
				.site-navbar .container .row { position: relative; }
				.site-navbar .col-6.d-inline-block {
					display: flex !important; justify-content: flex-end; align-items: center;
				}
				.site-menu-toggle { margin-right: 0; padding-right: 5px; }
			}
			.site-menu .language-menu { display: inline-flex; align-items: center; vertical-align: middle; }
			.language-toggle {
				display: inline-flex !important; align-items: center; gap: 6px;
				vertical-align: middle; line-height: normal;
			}
			.language-toggle .language-flag,
			.language-option img {
				display: block; width: 22px; height: 15px; object-fit: cover;
				border-radius: 2px; box-shadow: 0 0 0 1px rgba(255,255,255,.25);
				vertical-align: middle;
			}
			.language-toggle .language-flag { width: 26px; height: 18px; cursor: pointer; }
			.language-option.active img { box-shadow: 0 0 0 2px #d9a441 !important; }

			.site-menu .has-children.language-menu > a::after,
			.site-menu .has-children.language-menu > a::before,
			.site-menu .language-menu .language-toggle::after,
			.site-menu .language-menu .language-toggle::before,
			.site-menu .language-menu > a::after,
			.site-menu .language-menu > a::before {
				display: none !important;
				content: none !important;
				background: none !important;
				border: 0 !important;
				width: 0 !important;
				height: 0 !important;
			}
			.site-menu .language-menu .language-toggle,
			.site-menu .has-children.language-menu > a {
				background-image: none !important;
				padding-right: 0 !important;
			}
			.site-menu .language-menu .language-toggle i,
			.site-menu .language-menu .language-toggle .ti-angle-down,
			.site-menu .language-menu .language-toggle .icon-keyboard_arrow_down,
			.site-menu .language-menu .language-toggle .fa-angle-down,
			.site-menu .language-menu .language-toggle .fa-chevron-down {
				display: none !important;
			}

			/* MENU MOBILE BARU */
			.site-mobile-menu { display: none !important; }
			.mnav-toggle {
				margin-left: auto; padding: 4px 6px; background: none; border: 0;
				line-height: 0; cursor: pointer; color: #333;
			}
			.mnav-toggle:hover { color: #d9a441; }
			.mnav { position: fixed; inset: 0; z-index: 10050; visibility: hidden; pointer-events: none; transition: visibility 0s .35s; }
			.mnav.open { visibility: visible; pointer-events: auto; transition-delay: 0s; }
			.mnav-backdrop { position: absolute; inset: 0; background: rgba(20,15,8,.55); opacity: 0; transition: opacity .3s ease; }
			.mnav.open .mnav-backdrop { opacity: 1; }
			.mnav-panel {
				position: absolute; top: 0; right: 0; height: 100%; width: min(300px, 82vw); box-sizing: border-box;
				padding: 76px 28px 30px; overflow-y: auto; background: #211d17;
				box-shadow: -10px 0 40px rgba(0,0,0,.35);
				transform: translateX(100%); transition: transform .35s cubic-bezier(.2,.8,.2,1);
			}
			.mnav.open .mnav-panel { transform: none; }
			.mnav-close {
				position: absolute; top: 14px; right: 16px; width: 44px; height: 44px;
				background: none; border: 0; color: #ffffff; font-size: 34px; line-height: 1; cursor: pointer;
			}
			.mnav-list { margin: 0; padding: 0; list-style: none; }
			.mnav-list li { border-bottom: 1px solid rgba(255,255,255,.10); }
			.mnav-list a {
				display: block; padding: 15px 4px; color: #ffffff; font-size: 17px; font-weight: 600;
				text-decoration: none; transition: color .2s ease, padding-left .2s ease;
			}
			.mnav-list a:hover, .mnav-list a:active { color: #f4d98d; padding-left: 10px; }
			.mnav-lang { display: flex; gap: 14px; margin-top: 26px; }
			.mnav-lang .language-option { display: block !important; padding: 4px; border-radius: 4px; }
			.mnav-lang .language-option img { width: 30px; height: 20px; object-fit: cover; border-radius: 2px; display: block; }
			.mnav-lang .language-option.active { background: rgba(217,164,65,.25); }
			@media (min-width: 1200px) { .mnav, .mnav-toggle { display: none !important; } }

			/* FOOTER */
			.footer-area {
				position: relative; z-index: 20; padding-top: 0;
				background: #211d17; color: rgba(255,255,255,.72);
			}
			.footer-area .footer_social { padding: 38px 0 28px; border-bottom: 1px solid rgba(255,255,255,.10); }
			.footer-area .footer_social ul {
				display: flex; justify-content: center; align-items: center;
				gap: 10px; margin: 0; padding: 0; list-style: none;
			}
			.footer-area .footer_social ul li { margin: 0 !important; }
			.footer-area .footer_social ul li a {
				width: 42px; height: 42px; display: flex; align-items: center; justify-content: center;
				border: 1px solid rgba(255,255,255,.16); border-radius: 50%; color: #ffffff;
				background: rgba(255,255,255,.05); text-decoration: none; transition: .25s ease;
			}
			.footer-area .footer_social ul li a:hover {
				color: #ffffff; background: #d9a441; border-color: #d9a441; transform: translateY(-3px);
			}
			.footer-area .footer-padding { padding: 58px 0 35px; }
			.footer-area .single_footer { margin-bottom: 28px; }
			.footer-area .single_footer h4 {
				position: relative; margin: 0 0 20px; padding-bottom: 12px;
				color: #ffffff; font-size: 17px; font-weight: 700;
			}
			.footer-area .single_footer h4::after {
				content: ""; position: absolute; left: 0; bottom: 0;
				width: 38px; height: 3px; border-radius: 99px; background: #d9a441;
			}
			.footer-area .footer_contact ul { margin: 0; padding: 0; list-style: none; }
			.footer-area .footer_contact li {
				display: flex; align-items: flex-start; gap: 12px;
				margin: 0 0 13px; color: rgba(255,255,255,.68); line-height: 1.65;
			}
			.footer-area .footer_contact li > i {
				flex: 0 0 18px; margin-top: 4px; color: #f4d98d; text-align: center;
			}
			.footer-area .footer_contact a {
				color: rgba(255,255,255,.68); text-decoration: none; transition: .2s ease;
			}
			.footer-area .footer_contact a:hover { color: #f4d98d; padding-left: 4px; }
			.footer-area .footer_copyright {
				margin: 0; padding: 23px 0; border-top: 1px solid rgba(255,255,255,.10);
				color: rgba(255,255,255,.48); font-size: 13px;
			}
			.footer-logo { max-width: 80px; height: auto; margin-bottom: 10px; }
			.footer-social-inline { margin-top: 15px; }
			.footer-social-inline .social-label {
				display: block; color: rgba(255,255,255,0.7); font-size: 13px;
				font-weight: 600; letter-spacing: 1px; margin-bottom: 10px;
			}
			.footer-social-inline .social-icon {
				display: inline-flex; align-items: center; justify-content: center;
				width: 36px; height: 36px; border-radius: 50%;
				background: rgba(255,255,255,0.08); color: #fff; font-size: 15px;
				margin-right: 6px; transition: 0.3s ease; text-decoration: none;
			}
			.footer-social-inline .social-icon:hover {
				background: #d9a441; color: #fff; transform: translateY(-3px);
			}
			.btn-wa {
				display: inline-flex; align-items: center; gap: 10px;
				background: #c27f3a; color: #ffffff; padding: 10px 20px; border-radius: 50px;
				font-weight: 700; font-size: 14px; text-decoration: none;
				transition: all 0.3s ease; border: none; white-space: nowrap;
			}
			.btn-wa:hover { background: #2f2820; color: #ffffff; transform: translateY(-3px); }
			.btn-wa i { font-size: 20px; }
			.footer-area .footer_contact .btn-wa { color: #ffffff !important; }
			.footer-area .footer_contact .btn-wa:hover { color: #ffffff !important; }
			.btn-wa i.fa-whatsapp {
				font-family: 'FontAwesome' !important; font-size: 20px !important;
				color: #ffffff !important; display: inline-block !important; line-height: 1 !important;
			}
			.footer-area .row.footer-padding { display: flex; flex-wrap: wrap; align-items: stretch; }
			.footer-area .single_footer { height: 100%; display: flex; flex-direction: column; }
			.footer-area .single_footer .footer_contact { flex: 1; }
			.footer-area .footer_contact ul { padding-left: 0; }
			.footer-area .footer_contact ul li { list-style: none; margin-bottom: 10px; }
			.footer-area .footer_contact ul li a {
				color: rgba(255,255,255,0.7); text-decoration: none;
				transition: 0.3s ease; font-size: 14px;
			}
			.footer-area .footer_contact ul li a:hover { color: #f4d98d; padding-left: 4px; }
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

			/* FLOATING CTA */
			.floating-cta {
				position: fixed; bottom: 10px; right: 30px; z-index: 9999;
				opacity: 0; visibility: hidden; transform: translateY(30px) scale(0.95);
				transition: all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
				display: flex; flex-direction: column; align-items: flex-end; gap: 10px;
			}
			.floating-cta.active { opacity: 1; visibility: visible; transform: translateY(0) scale(1); }
			.floating-cta .floating-btn {
				display: inline-flex; align-items: center; gap: 12px; padding: 14px 28px;
				background: #d9a441; color: #ffffff; border: none; border-radius: 60px;
				font-size: 16px; font-weight: 700; box-shadow: 0 12px 35px rgba(217,164,65,0.45);
				cursor: pointer; transition: all 0.3s ease; text-decoration: none;
				position: relative; overflow: hidden;
			}
			.floating-cta .floating-btn::before {
				content: ''; position: absolute; top: 0; left: -100%;
				width: 100%; height: 100%;
				background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
				transition: left 0.6s ease;
			}
			.floating-cta .floating-btn:hover::before { left: 100%; }
			.floating-cta .floating-btn:hover {
				background: #c27f3a; transform: translateY(-3px) scale(1.02);
				box-shadow: 0 18px 40px rgba(194,127,58,0.50);
			}
			.floating-cta .floating-btn i { font-size: 22px; animation: pulseIcon 2s ease-in-out infinite; }
			.floating-cta .floating-btn .btn-label {
				display: flex; flex-direction: column; align-items: flex-start; line-height: 1.2;
			}
			.floating-cta .floating-btn .btn-label small { font-size: 11px; font-weight: 400; opacity: 0.85; }
			.floating-cta .floating-btn .btn-label span { font-size: 16px; }
			@keyframes pulseIcon {
				0%, 100% { transform: scale(1); }
				50% { transform: scale(1.15); }
			}
			.floating-cta .close-cta {
				width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;
				background: rgba(0,0,0,0.6); color: #fff; border: none; border-radius: 50%;
				font-size: 14px; cursor: pointer; transition: all 0.3s ease; backdrop-filter: blur(4px);
			}
			.floating-cta .close-cta:hover { background: rgba(0,0,0,0.8); transform: scale(1.1); }
			@media (max-width: 576px) {
				.floating-cta { bottom: 20px; right: 20px; left: 20px; align-items: stretch; }
				.floating-cta .floating-btn {
					padding: 12px 20px; font-size: 14px; justify-content: center; width: 100%;
				}
				.floating-cta .floating-btn .btn-label small { font-size: 10px; }
				.floating-cta .floating-btn .btn-label span { font-size: 14px; }
				.floating-cta .close-cta {
					position: absolute; top: -10px; right: -5px;
					width: 24px; height: 24px; font-size: 12px; background: rgba(0,0,0,0.7);
				}
			}

			/* NAVBAR COMPACT */
			.site-navbar { transition: padding 0.25s ease, min-height 0.25s ease, box-shadow 0.25s ease; }
			.site-navbar.sticky {
				padding-top: 5px !important; padding-bottom: 5px !important; min-height: 60px;
			}
			.site-navbar.sticky .logo {
				max-height: 42px; width: auto; transition: max-height 0.25s ease;
			}
			.site-logo .logo-scroll-img, .site-logo .logo-scroll-text { display: none; }
			.site-logo .logo-scroll-text { font-weight: 800; font-size: 24px; letter-spacing: .5px; line-height: 1; }
			.site-navbar.sticky .site-logo[data-scroll-logo="image"] .logo-main,
			.site-navbar.sticky .site-logo[data-scroll-logo="text"] .logo-main { display: none; }
			.site-navbar.sticky .site-logo[data-scroll-logo="image"] .logo-scroll-img { display: inline-block; }
			.site-navbar.sticky .site-logo[data-scroll-logo="text"] .logo-scroll-text { display: inline-block; }
			@media (max-width: 991.98px) {
				.site-navbar.sticky {
					padding-top: 4px !important; padding-bottom: 4px !important; min-height: 54px;
				}
				.site-navbar.sticky .logo { max-height: 38px; }
			}

			/* WHATSAPP WIDGET */
			.wa-consult {
				position: fixed; right: 0; bottom: 120px; z-index: 9998;
				display: flex; align-items: center; gap: 14px;
				width: 76px; height: 76px; padding: 0 0 0 12px; overflow: hidden;
				background: #211d17; border: 2px solid #d9a441; border-right: 0;
				border-radius: 40px 0 0 40px; color: #ffffff; text-decoration: none;
				box-shadow: 0 10px 30px rgba(0,0,0,.30);
				transition: width .4s cubic-bezier(.2,.8,.2,1), background .3s ease;
			}
			.wa-consult:hover { width: 330px; background: #2f2820; color: #ffffff; }
			.wa-consult .wa-avatar { position: relative; flex: 0 0 52px; width: 52px; height: 52px; }
			.wa-consult .wa-avatar .wa-circle {
				position: relative; width: 52px; height: 52px;
				display: flex; align-items: center; justify-content: center;
				overflow: hidden; border: 2px solid #ffffff; border-radius: 50%;
				background: #f5ecd3; color: #d9a441; font-size: 26px; line-height: 1;
			}
			.wa-consult .wa-avatar .wa-circle img.wa-photo {
				position: absolute; inset: 0; width: 100%; height: 100%;
				object-fit: cover; display: block; font-size: 0; color: transparent;
			}
			.wa-consult .wa-avatar .wa-badge {
				position: absolute; left: -4px; bottom: -2px; width: 22px; height: 22px;
				display: flex; align-items: center; justify-content: center;
				background: #25d366; border: 2px solid #211d17; border-radius: 50%;
				color: #ffffff; font-size: 12px; line-height: 1;
			}
			.wa-consult .wa-text {
				display: flex; flex-direction: column; gap: 3px; padding-right: 22px;
				white-space: nowrap; opacity: 0; transform: translateX(10px);
				transition: opacity .3s ease .1s, transform .3s ease .1s;
			}
			.wa-consult:hover .wa-text { opacity: 1; transform: translateX(0); }
			.wa-consult .wa-text .wa-title { font-size: 14px; font-weight: 800; color: #f4d98d; }
			.wa-consult .wa-text .wa-desc { font-size: 12px; font-weight: 500; color: rgba(255,255,255,.9); }
			.wa-consult .wa-text .wa-desc b { color: #ffffff; }
			@media (max-width: 576px) {
				.wa-consult { bottom: 100px; width: 66px; height: 66px; padding-left: 8px; }
				.wa-consult:hover { width: 66px; background: #211d17; }
				.wa-consult { touch-action: pan-y; -webkit-user-select: none; user-select: none; -webkit-tap-highlight-color: transparent; }
				.wa-consult .wa-text { display: flex; opacity: 0; transform: translateX(10px); pointer-events: none; padding-right: 18px; }
				/* ditarik ke kiri -> melebar dan teks terlihat; tarik ke kanan -> menutup */
				.wa-consult.open, .wa-consult.open:hover { width: min(330px, calc(100vw - 10px)); background: #2f2820; }
				.wa-consult.open .wa-text { opacity: 1; transform: translateX(0); }
				.wa-consult .wa-avatar { -webkit-user-drag: none; }
			}

			/* =========================================================
			   PRODUCT DETAIL PAGE (OVERLAY)
			========================================================= */
			.product-page {
				position: fixed; inset: 0; z-index: 10001; overflow-y: auto;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
				opacity: 0; visibility: hidden; transform: translateY(24px);
				transition: opacity .4s ease, transform .4s ease, visibility .4s;
			}
			.product-page.open { opacity: 1; visibility: visible; transform: none; }

			.product-page.image-only .pp-info,
			.product-page.image-only .pp-extra,
			.product-page.image-only .pp-nav { display: none !important; }

			.product-page.image-only {
				overflow: hidden;
				display: flex;
				flex-direction: column;
				height: 100vh;
				height: 100dvh;
			}
			.product-page.image-only .product-page-bar {
				position: absolute;
				top: 0; left: 0; right: 0;
				padding: 16px 5%;
				background: transparent;
				backdrop-filter: none;
				border-bottom: 0;
				pointer-events: none;
				z-index: 20;
			}
			.product-page.image-only .product-page-bar .pp-back { pointer-events: auto; }
			.product-page.image-only .product-page-bar .pp-logo { display: none; }

			.product-page.image-only .pp-hero {
				flex: 1 1 auto;
				min-height: 0;
				display: block;
				padding: 0;
				margin: 0;
				max-width: 100%;
				overflow: hidden;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
				position: relative;
			}
			.product-page.image-only .pp-left,
			.product-page.image-only .pp-media,
			.product-page.image-only .pp-img-link {
				display: block;
				width: 100%;
				max-width: 100%;
				height: 100%;
				min-height: 0;
				margin: 0;
				padding: 0;
				background: transparent;
				border-radius: 0;
				overflow: hidden;
				transform: none;
			}
			.product-page.image-only .pp-img-link { cursor: default; }
			.product-page.image-only .pp-img-link:hover { transform: none; }
			.product-page.image-only .pp-img-link img {
				display: block;
				width: 100%;
				height: 100%;
				max-height: none;
				object-fit: cover;
				object-position: center;
				filter: none;
				animation: none;
				border-radius: 0;
				transition: opacity .3s ease;
			}

			@media (max-aspect-ratio: 6/5) {
				.product-page.image-only .pp-img-link img {
					object-fit: cover;
					object-position: center center;
					background: #faf4e5;
				}
			}

			.product-page.image-only .pp-img-link img.is-loading {
				opacity: 0;
			}

			.pp-store-badge {
				position: absolute;
				left: 24px;
				bottom: 24px;
				z-index: 15;
				display: flex;
				flex-direction: column;
				align-items: center;
				gap: 8px;
				padding: 0;
				background: transparent;
				border-radius: 0;
				box-shadow: none;
				pointer-events: auto;
				cursor: pointer;
				text-decoration: none;
			}
			.pp-store-badge .pp-store-label {
				font-size: 11px;
				font-weight: 800;
				letter-spacing: 1.2px;
				color: #4a4338;
				text-transform: uppercase;
				line-height: 1.1;
				text-align: center;
			}
			.pp-store-badge .pp-store-logo-img {
				display: block;
				height: 90px;
				width: auto;
				object-fit: contain;
				filter: drop-shadow(0 0 6px rgba(255,255,255,.85)) drop-shadow(0 2px 6px rgba(0,0,0,.25));
			}
			.product-page:not(.image-only) .pp-store-badge { left: 12px; bottom: 12px; z-index: 6; gap: 4px; }
			.product-page:not(.image-only) .pp-store-badge .pp-store-logo-img { height: 56px; }
			.product-page.image-only .pp-store-label { display: none; }

			.pp-store-badge { opacity: 0; transition: opacity .35s ease; }
			.pp-store-badge.placed { opacity: 1; }
			.pp-store-badge .pp-store-logo-img { transition: transform .25s ease; }
			.pp-store-badge:hover .pp-store-logo-img,
			.pp-store-badge:focus-visible .pp-store-logo-img { transform: scale(1.06); }
			.pp-store-badge.is-anchored { flex-direction: row; align-items: center; justify-content: center; gap: 0; }
			.pp-store-badge.is-anchored .pp-store-logo-img { width: 100%; height: 100%; object-fit: contain; }

			.pp-store-badge.logo-hexabrain  { --logo-vw: 1918; --logo-vh: 876; --logo-x: 985; --logo-y: 500; --logo-w: 86; --logo-h: 101; }
			.pp-store-badge.logo-multiflora { --logo-vw: 1918; --logo-vh: 876; --logo-x: 985; --logo-y: 500; --logo-w: 86; --logo-h: 101; }
			.pp-store-badge.logo-sangket    { --logo-vw: 1918; --logo-vh: 876; --logo-x: 985; --logo-y: 536; --logo-w: 86; --logo-h: 101; }
			.pp-store-badge.logo-hitam      { --logo-vw: 1918; --logo-vh: 876; --logo-x: 885; --logo-y: 536; --logo-w: 86; --logo-h: 101; }
			.pp-store-badge.logo-gold       { --logo-vw: 1918; --logo-vh: 876; --logo-x: 989; --logo-y: 570; --logo-w: 86; --logo-h: 101; }
			.pp-store-badge.logo-imun       { --logo-vw: 1918; --logo-vh: 876; --logo-x: 987; --logo-y: 500; --logo-w: 86; --logo-h: 101; }

			.pp-store-badge.logo-hexabrain,
			.pp-store-badge.logo-multiflora,
			.pp-store-badge.logo-sangket,
			.pp-store-badge.logo-hitam,
			.pp-store-badge.logo-gold,
			.pp-store-badge.logo-imun {
				--logo-mobile-vw: 375; --logo-mobile-vh: 667;
				--logo-mobile-x: 150; --logo-mobile-y: 610;
				--logo-mobile-w: 75; --logo-mobile-h: 52;
			}

			@media (max-width: 767px) {
				.pp-store-badge {
					left: 14px;
					bottom: 14px;
					padding: 0;
					gap: 6px;
					border-radius: 0;
				}
				.pp-store-badge .pp-store-label { font-size: 9px; letter-spacing: 1px; }
				.pp-store-badge .pp-store-logo-img { height: 60px; }
			}
			@media (max-width: 380px) {
				.pp-store-badge { padding: 0; }
				.pp-store-badge .pp-store-logo-img { height: 52px; }
			}

			#emptyPage.image-only .product-page-bar .pp-logo {
				display: block !important;
			}
			#emptyPage.image-only .product-page-bar {
				pointer-events: none;
			}
			#emptyPage.image-only .product-page-bar .pp-back,
			#emptyPage.image-only .product-page-bar .pp-logo {
				pointer-events: auto;
			}

			.product-page-bar {
				position: sticky; top: 0; z-index: 5;
				display: flex; align-items: center; justify-content: space-between;
				padding: 14px 5%;
				background: rgba(255,255,255,.92);
				backdrop-filter: blur(8px);
				border-bottom: 1px solid rgba(210,120,29,.15);
			}
			.product-page-bar .pp-logo { max-height: 40px; width: auto; }
			.pp-back {
				display: inline-flex; align-items: center; gap: 8px; padding: 9px 22px;
				background: #d9a441; color: #ffffff; border: 0; border-radius: 50px;
				font-weight: 700; font-size: 14px; cursor: pointer;
				box-shadow: 0 8px 20px rgba(217,164,65,.35);
				transition: background .3s ease, transform .3s ease;
			}
			.pp-back:hover { background: #c27f3a; transform: translateX(-3px); }

			.pp-hero {
				display: grid;
				grid-template-columns: 1fr 1fr;
				align-items: start;
				gap: 40px;
				max-width: 1400px;
				margin: 0 auto;
				padding: 30px 5% 60px;
				min-height: calc(100vh - 68px);
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
			}

			.pp-left {
				display: flex;
				flex-direction: column;
				gap: 24px;
				width: 100%;
			}

			.pp-media {
				position: relative;
				display: flex;
				align-items: center;
				justify-content: center;
				min-height: 480px;
				padding: 20px;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
				border-radius: 24px;
			}

			.pp-img-link {
				position: relative;
				z-index: 2;
				display: block;
				max-width: 380px;
				width: 100%;
				cursor: default;
				text-decoration: none;
				transition: transform .4s ease;
			}
			.pp-img-link:hover { transform: scale(1.04); }
			.pp-img-link img {
				display: block;
				width: 100%;
				max-height: 460px;
				object-fit: contain;
				filter: drop-shadow(0 30px 40px rgba(0,0,0,.25));
				animation: productFloat 5s ease-in-out infinite;
			}

			.pp-nav {
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
				z-index: 3;
				width: 48px; height: 48px;
				display: flex; align-items: center; justify-content: center;
				background: transparent;
				border: 0;
				color: #111;
				font-size: 32px;
				cursor: pointer;
				opacity: .75;
				transition: opacity .25s ease, transform .25s ease;
			}
			.pp-nav:hover { opacity: 1; transform: translateY(-50%) scale(1.15); }
			.pp-nav.prev { left: 0; }
			.pp-nav.next { right: 0; }
			.pp-nav i { font-weight: 300; }

			.pp-info {
				position: relative;
				z-index: 2;
				max-width: 560px;
				width: 100%;
				padding: 10px 0;
			}

			.pp-badge {
				display: inline-flex;
				align-items: center;
				gap: 8px;
				padding: 8px 18px;
				margin-bottom: 22px;
				border: 1.5px solid #f0b95a;
				border-radius: 50px;
				color: #c98a1f;
				background: #fffdf6;
				font-size: 13px;
				font-weight: 600;
				letter-spacing: .2px;
			}
			.pp-badge i { font-size: 14px; }

			.pp-info h1 {
				margin: 0 0 6px;
				color: #111;
				font-size: clamp(34px, 4.5vw, 52px);
				line-height: 1.08;
				font-weight: 800;
				letter-spacing: -1px;
			}

			.pp-subtitle {
				margin: 0 0 22px;
				color: #111;
				font-size: clamp(24px, 3vw, 36px);
				line-height: 1.15;
				font-weight: 700;
				letter-spacing: -0.5px;
			}
			.pp-subtitle sup {
				font-size: .55em;
				vertical-align: super;
				margin-left: 2px;
			}
			.pp-subtitle .sep {
				color: #b8b8b8;
				margin: 0 6px;
				font-weight: 400;
			}

			.pp-price {
				margin: 0 0 26px;
				color: #111;
				font-size: 20px;
				font-weight: 500;
			}
			.pp-price .price-value { font-weight: 600; }
			.pp-price .price-note {
				color: #666;
				font-size: 15px;
				margin-left: 6px;
				font-weight: 400;
			}

			.pp-features {
				display: grid;
				grid-template-columns: repeat(3, 1fr);
				gap: 18px;
				margin-bottom: 24px;
				text-align: center;
			}
			.pp-feature { display: flex; flex-direction: column; align-items: center; gap: 10px; }
			.pp-feature-icon {
				width: 58px; height: 58px;
				display: flex; align-items: center; justify-content: center;
				border-radius: 50%;
				background: transparent;
				color: #d9a441;
				font-size: 42px;
				line-height: 1;
			}
			.pp-feature-icon i { font-size: 46px; }
			.pp-feature-label {
				color: #222;
				font-size: 13px;
				font-weight: 600;
				line-height: 1.35;
				max-width: 140px;
			}

			.img-trace {
				display: block;
				width: 100%;
				max-width: 100%;
				height: auto;
				margin: 0 0 16px;
				border-radius: 14px;
				box-shadow: 0 10px 26px rgba(200,150,40,.25);
			}

			.pp-trust-buttons {
				display: flex;
				flex-wrap: wrap;
				gap: 12px;
				margin: 0 0 22px;
			}
			.trust-btn-wrap {
				position: relative;
				display: inline-block;
			}
			.trust-btn {
				display: inline-flex;
				align-items: center;
				gap: 10px;
				padding: 11px 22px;
				background: #f7f7f7;
				color: #4a4a4a;
				border: 1.5px solid #e2e2e2;
				border-radius: 50px;
				font-size: 14px;
				font-weight: 600;
				cursor: pointer;
				transition: all .3s ease;
				font-family: inherit;
				white-space: nowrap;
			}
			.trust-btn:hover {
				background: #ffffff;
				border-color: #d0d0d0;
				box-shadow: 0 6px 18px rgba(0,0,0,.08);
				color: #111;
			}
			.trust-btn i { font-size: 16px; color: #666; }

			.pp-trust-buttons {
				display: flex;
				flex-wrap: nowrap;
				gap: 8px;
				margin: 0 0 22px;
			}
			.pp-trust-buttons .trust-btn-wrap {
				flex: 1 1 0;
				min-width: 0;
			}
			.pp-trust-buttons .trust-btn {
				width: 100%;
				justify-content: center;
				padding: 9px 10px;
				font-size: 12px;
				gap: 6px;
				overflow: hidden;
				text-overflow: ellipsis;
			}
			.pp-trust-buttons .trust-btn i { font-size: 14px; }
			.pp-trust-buttons .trust-btn span {
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				}
			@media (max-width: 380px) {
				.pp-trust-buttons .trust-btn { font-size: 10.5px; padding: 8px 6px; gap: 4px; }
				.pp-trust-buttons .trust-btn i { font-size: 12px; }
			}
			@media (min-width: 768px) {
				.pp-trust-buttons { flex-wrap: wrap; gap: 12px; }
					.pp-trust-buttons .trust-btn-wrap { flex: 0 0 auto; }
					.pp-trust-buttons .trust-btn {
						width: auto; padding: 11px 22px; font-size: 14px; gap: 10px;
					}
					.pp-trust-buttons .trust-btn i { font-size: 16px; }
				}

			.trust-popup {
				position: absolute;
				left: 50%;
				top: calc(100% + 14px);
				transform: translateX(-50%) translateY(-8px);
				width: 380px;
				background: #ffffff;
				border-radius: 16px;
				box-shadow: 0 20px 50px rgba(0,0,0,.18);
				padding: 26px 24px 22px;
				z-index: 100;
				opacity: 0;
				visibility: hidden;
				pointer-events: none;
				transition: opacity .25s ease, transform .25s ease, visibility .25s ease;
				text-align: center;
			}
			.trust-popup::after {
				content: "";
				position: absolute;
				top: -10px;
				left: 50%;
				transform: translateX(-50%);
				width: 0; height: 0;
				border-left: 12px solid transparent;
				border-right: 12px solid transparent;
				border-bottom: 12px solid #ffffff;
				filter: drop-shadow(0 -2px 3px rgba(0,0,0,.06));
			}
				.trust-btn-wrap:hover .trust-popup {
				opacity: 1;
				visibility: visible;
				pointer-events: auto;
				transform: translateX(-50%) translateY(0);
			}
			.trust-popup h4 {
				margin: 0 0 4px;
				color: #333;
				font-size: 20px;
				font-weight: 800;
			}
			.trust-popup .popup-subtitle {
				margin: 0 0 20px;
				color: #555;
				font-size: 14px;
				font-weight: 500;
			}
			.sf-row {
				display: grid;
				grid-template-columns: 100px 1fr auto;
				align-items: center;
				gap: 10px;
				padding: 8px 0;
				border-bottom: 1px solid #ececec;
				text-align: left;
				font-size: 15px;
			}
			.sf-row:last-of-type { border-bottom: 0; }
			.sf-img {
				grid-row: span 5;
				align-self: start;
				padding-top: 8px;
			}
			.sf-img img { width: 80px; height: auto; display: block; }
			.sf-table {
				grid-column: 2 / 4;
				display: flex;
				flex-direction: column;
			}
			.sf-item {
				display: flex;
				justify-content: space-between;
				padding: 8px 0;
				border-bottom: 1px solid #ececec;
				font-size: 15px;
				color: #444;
			}
			.sf-item:last-child { border-bottom: 0; }
			.sf-item strong { color: #111; font-weight: 700; }

			.cert-grid {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 12px;
				margin-top: 6px;
			}
			.cert-item {
				background: #f4f4f4;
				border-radius: 10px;
				height: 100px;
				display: flex;
				align-items: center;
				justify-content: center;
				padding: 8px;
				transition: background .2s ease;
			}
			.cert-item:hover { background: #ececec; }
			.cert-item img { max-width: 100%; max-height: 100%; object-fit: contain; }

			.sf-close,
			.cert-close {
				margin-top: 16px;
				background: none;
				border: 0;
				font-weight: 800;
				letter-spacing: 1px;
				font-size: 14px;
				color: #333;
				cursor: pointer;
				text-decoration: underline;
				text-underline-offset: 4px;
				font-family: inherit;
			}
			.sf-close:hover,
			.cert-close:hover { color: #000; }

			@media (max-width: 575px) {
				.trust-popup { width: 280px; padding: 18px 16px 14px; }
				.trust-popup h4 { font-size: 17px; }
				.trust-popup .popup-subtitle { font-size: 12px; margin-bottom: 14px; }
				.sf-img img { width: 60px; }
				.sf-item { font-size: 13px; padding: 6px 0; }
				.cert-item { height: 80px; }
			}

			.pp-desc {
				margin: 0 0 26px;
				color: #4a4338;
				font-size: 15px;
				line-height: 1.75;
			}

			.pp-buy {
				display: inline-flex; align-items: center; justify-content: center;
				gap: 10px;
				min-height: 52px; padding: 14px 34px;
				background: #d9a441; color: #ffffff;
				border-radius: 50px; font-weight: 700; font-size: 15px;
				text-decoration: none;
				box-shadow: 0 10px 25px rgba(217,164,65,.35);
				transition: background .3s ease, transform .3s ease;
				margin-bottom: 12px;
			}
			.pp-buy:hover { background: #c27f3a; color: #ffffff; transform: translateY(-3px); }

			.pp-extra {
				width: 100%;
				max-width: 100%;
				margin: 0;
				padding: 0;
				background: transparent;
			}
			.pp-acc { margin-bottom: 0; }
			.pp-acc-item {
				margin-bottom: 14px; background: #ffffff;
				border: 1px solid rgba(210,120,29,.18); border-radius: 18px;
				box-shadow: 0 8px 24px rgba(80,60,25,.07); overflow: hidden;
				transition: box-shadow .3s ease, border-color .3s ease;
			}
			.pp-acc-item.open { border-color: rgba(210,120,29,.40); box-shadow: 0 14px 32px rgba(80,60,25,.12); }
			.pp-acc-head {
				width: 100%; display: flex; align-items: center; gap: 14px;
				padding: 18px 22px; background: none; border: 0;
				text-align: left; cursor: pointer;
			}
			.pp-acc-icon {
				flex: 0 0 42px; width: 42px; height: 42px;
				display: flex; align-items: center; justify-content: center;
				border-radius: 14px; background: #fff3d8; color: #d2781d; font-size: 19px;
			}
			.pp-acc-title { flex: 1; display: flex; flex-direction: column; gap: 2px; }
			.pp-acc-title strong {
				color: #191919; font-size: 16px; font-weight: 800;
				letter-spacing: .5px; text-transform: uppercase;
			}
			.pp-acc-title small { color: #c7771b; font-size: 11px; font-weight: 700; letter-spacing: 1px; }
			.pp-acc-head::after {
				content: "\f067"; font-family: 'FontAwesome'; color: #211d17; font-size: 16px;
			}
			.pp-acc-item.open .pp-acc-head::after { content: "\f068"; }
			.pp-acc-body { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .35s ease; }
			.pp-acc-item.open .pp-acc-body { grid-template-rows: 1fr; }
			.pp-acc-inner { overflow: hidden; min-height: 0; }
			.pp-acc-inner > p, .pp-acc-inner > ul { margin: 0 22px 20px; }
			.pp-acc-inner p, .pp-acc-inner li { color: #4a4338; font-size: 15px; line-height: 1.7; }
			.pp-acc-inner ul { padding: 0; list-style: none; }
			.pp-acc-inner li { position: relative; padding-left: 26px; margin-bottom: 10px; }
			.pp-acc-inner li::before {
				content: "\f00c"; font-family: 'FontAwesome';
				position: absolute; left: 0; top: 0; color: #d2781d; font-size: 14px;
			}

			@media (max-width: 991px) {
				.pp-hero {
					grid-template-columns: 1fr;
					gap: 10px;
					padding: 20px 6% 40px;
					min-height: auto;
				}
				.pp-left { order: 1; }
				.pp-media { min-height: 380px; }
				.pp-img-link { max-width: 280px; }
				.pp-nav.prev { left: 6px; }
				.pp-nav.next { right: 6px; }
				.pp-info { order: 2; max-width: 100%; padding: 0 4px; }
				.pp-info h1 { font-size: 32px; }
				.pp-subtitle { font-size: 24px; }
				.pp-features { gap: 10px; }
				.pp-feature-icon i { font-size: 36px; }
				.pp-feature-label { font-size: 11px; }
			}
			@media (max-width: 575px) {
				.pp-media { min-height: 320px; padding: 10px; }
				.pp-img-link { max-width: 220px; }
				.pp-info h1 { font-size: 28px; }
				.pp-subtitle { font-size: 20px; margin-bottom: 16px; }
				.pp-price { font-size: 17px; margin-bottom: 20px; }
				.pp-features { gap: 6px; margin-bottom: 20px; }
				.pp-feature-icon { width: 44px; height: 44px; }
				.pp-feature-icon i { font-size: 30px; }
				.pp-feature-label { font-size: 10px; }
				.pp-buy { width: 100%; padding: 12px 20px; }
			}

			.pp-buy { box-sizing: border-box; }

			@media (max-width: 991px) {
				.product-page:not(.image-only) .pp-left { display: contents; }
				.product-page:not(.image-only) .pp-media { order: 1; }
				.product-page:not(.image-only) .pp-info  { order: 2; }
				.product-page:not(.image-only) .pp-extra { order: 3; margin-top: 8px; }
			}

			@media (max-width: 767px) {
				.pp-hero { grid-template-columns: minmax(0, 1fr); }
				.pp-info, .pp-left { min-width: 0; }
				.pp-info .img-trace { max-width: 100%; }
				.product-page { overflow-x: hidden; }

				.pp-trust-buttons { position: relative; }
				.pp-trust-buttons .trust-btn-wrap { position: static; }
				.pp-trust-buttons .trust-popup { left: 0; right: 0; width: auto; transform: translateY(-8px); }
				.pp-trust-buttons .trust-btn-wrap:hover .trust-popup,
				.pp-trust-buttons .trust-btn-wrap:focus-within .trust-popup {
					opacity: 1; visibility: visible; pointer-events: auto; transform: translateY(0);
				}
				.pp-trust-buttons .trust-popup::after { display: none; }
			}

			.footer-area .footer_copyright {
				display: flex; align-items: center; justify-content: space-between;
				flex-wrap: wrap; gap: 12px 24px;
			}
			.footer_copyright .partof-inline {
				display: inline-flex; align-items: center; gap: 10px;
				color: rgba(255,255,255,.55); letter-spacing: .5px;
			}
			.footer_copyright .partof-inline a {
				display: inline-flex; align-items: center; color: #f4d98d;
				font-weight: 700; text-decoration: none;
			}
			.footer_copyright .partof-inline img {
				display: block; height: 26px; width: auto; opacity: .85;
				transition: opacity .3s ease, transform .3s ease;
			}
			.footer_copyright .partof-inline a:hover img { opacity: 1; transform: translateY(-2px); }
			.footer_copyright .partof-fallback { display: none; }
			@media (max-width: 767px) {
				.footer-area .footer_copyright {
					flex-direction: column; justify-content: center; text-align: center; gap: 10px;
				}
			}

			/* =========================================================
			   HALAMAN KOSONG — MULTI KONTEN (FAQ, TENTANG KAMI, DLL)
			========================================================= */
			#emptyPage.image-only {
				overflow-y: auto !important;
				display: block !important;
				height: 100dvh;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
			}

			#emptyPage.image-only .product-page-bar {
				position: sticky !important;
				top: 0;
				background: rgba(255,255,255,.92) !important;
				backdrop-filter: blur(8px);
				border-bottom: 1px solid rgba(210,120,29,.15);
				pointer-events: auto !important;
				padding: 14px 5%;
				z-index: 10;
			}

			#emptyPage .empty-page-content { display: none; width: 100%; }
			#emptyPage .empty-page-content.active { display: block; }

			/* =========================================================
			   BANNER HALAMAN (FAQ, TENTANG KAMI, CARA PEMESANAN,
			   HUBUNGI KAMI) — GAMBAR FULL WIDTH
			========================================================= */
			#emptyPage .container-fluid.bg-breadcrumb {
				width: 100%;
				max-width: 100%;
				margin: 0;
				padding-left: 0;
				padding-right: 0;
			}
			#emptyPage .bg-breadcrumb {
				background-color: #faf4e5;
				background-image: url(assets/img/faq/faq_bg.jpeg);
				background-size: cover;            /* sebelumnya: contain */
				background-position: center center;
				background-repeat: no-repeat;
				width: 100%;
				padding: 60px 0;
				min-height: 400px;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			@media (max-width: 767px) {
				#emptyPage .bg-breadcrumb { min-height: 260px; padding: 40px 0; }
			}
			#emptyPage .bg-breadcrumb .breadcrumb-item a {
				color: #ffffff;
				text-decoration: none;
				transition: .3s ease;
			}
			#emptyPage .bg-breadcrumb .breadcrumb-item a:hover { color: #f4d98d; }
			#emptyPage .bg-breadcrumb .breadcrumb-item.active { color: #f4d98d !important; }
			#emptyPage .bg-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
				color: rgba(255,255,255,.6);
			}

			/* Background khusus halaman Tentang Kami */
			#emptyPage .bg-breadcrumb.bg-tentang-kami {
				background-image: url(assets/img/tentang_kami.jpeg);
			}

			/* Background khusus halaman Cara Pemesanan */
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan {
				background-image: none;
				padding: 0;
				min-height: 0;
				display: block;
				position: relative;
			}
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan {
				height: 400px !important;   /* sama dengan banner FAQ */
				overflow: hidden;
				background-color: #e9dcc3;
			}
			/* Latar blur dari gambar yang sama, mengisi sisi kiri-kanan */
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan::before {
				content: "";
				position: absolute;
				inset: -30px;
				background: url(assets/img/cara_pemesanan.jpg) center center / cover no-repeat;
				filter: blur(22px);
				z-index: 0;
			}
			/* Gambar utama tampil utuh (tidak terpotong) di atas latar blur */
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan .banner-img {
				position: relative;
				z-index: 1;
				display: block;
				width: 100%;
				height: 100%;
				object-fit: cover; /* Diubah dari contain ke cover agar full width */
				object-position: center center;
			}
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan > .container {
				z-index: 2;
			}
			@media (max-width: 767px) {
				#emptyPage .bg-breadcrumb.bg-cara-pemesanan { height: 260px !important; }   /* sama dengan FAQ di mobile */
			}
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan > .container {
				position: absolute;
				inset: 0;
				max-width: 100% !important;
				display: flex;
				align-items: center;
				justify-content: center;
				padding: 0 !important;
			}
			#emptyPage .bg-breadcrumb.bg-cara-pemesanan > .container h4 {
				margin: 0 !important;
				text-shadow: 0 3px 18px rgba(0,0,0,.45);
			}
			@media (max-width: 767px) {
				#emptyPage .bg-breadcrumb.bg-cara-pemesanan > .container h4 { font-size: 1.8rem; }
			}

			/* Posisi judul banner khusus HP (diatur dari CMS) */
			@media (max-width: 767px) {
				#emptyPage .bg-breadcrumb h4[style*="--tx"] {
					left: var(--txm, var(--tx)) !important;
					top: var(--tym, var(--ty)) !important;
				}
			}

			/* Langkah Pemesanan (halaman Cara Pemesanan) */
			#emptyPage .steps { font-family: 'Barlow', 'Poppins', sans-serif; color: #111; }
			#emptyPage .steps .step { display: flex; align-items: flex-start; gap: 22px; margin-bottom: 30px; }
			#emptyPage .steps .step:last-child { margin-bottom: 0; }
			@media (min-width: 992px) { #emptyPage .steps { width: max-content; max-width: 100%; margin-left: auto; margin-right: auto; } }   /* desktop: blok langkah di tengah */
			#emptyPage .steps .step-ic { flex: 0 0 34px; width: 34px; height: 34px; margin-top: 4px; color: #111; }
			#emptyPage .steps .step-ic svg { width: 100%; height: 100%; display: block; }
			#emptyPage .steps .step-tx strong { display: block; font-style: italic; font-weight: 800; font-size: 1.55rem; line-height: 1.15; color: #000; }
			#emptyPage .steps .step-tx span { display: block; font-weight: 500; font-size: 1.45rem; line-height: 1.3; color: #111; margin-top: 2px; }
			@media (max-width: 767px) {
				#emptyPage .steps .step { gap: 16px; margin-bottom: 22px; }
				#emptyPage .steps .step-ic { flex-basis: 28px; width: 28px; height: 28px; }
				#emptyPage .steps .step-tx strong { font-size: 1.2rem; }
				#emptyPage .steps .step-tx span { font-size: 1.1rem; }
			}

			/* Kotak Hubungi Kami */
			#emptyPage .contact-box { background: #E9B949; text-align: center; padding: 64px 24px 72px; }
			#emptyPage .contact-box h3 { font-size: 1.9rem; font-weight: 500; color: var(--cb-title, #3d2a05); margin: 0 0 18px; }
			#emptyPage .contact-box p { font-size: 1.3rem; color: var(--cb-text, #5a3f0c); margin: 0 0 32px; line-height: 1.5; }
			#emptyPage .contact-box .contact-box-btn {
				display: inline-flex; align-items: center; justify-content: center; gap: 14px;
				background: var(--cb-btn, #4a3410); color: var(--cb-btntext, #fff); font-weight: 700; font-size: 1.2rem;
				text-transform: uppercase; text-decoration: none; letter-spacing: .6px; padding: 16px 38px;
				box-shadow: 0 8px 22px rgba(0,0,0,.28), inset 0 1px 0 rgba(255,255,255,.18);
				transition: transform .2s ease, box-shadow .2s ease, filter .2s ease;
			}
			#emptyPage .contact-box .contact-box-btn:hover { transform: translateY(-3px); box-shadow: 0 14px 28px rgba(0,0,0,.34), inset 0 1px 0 rgba(255,255,255,.18); }
			#emptyPage .contact-box .contact-box-btn:active { transform: translateY(0); box-shadow: 0 4px 12px rgba(0,0,0,.3); }
			#emptyPage .contact-box .contact-box-btn .cb-ic { font-size: 1.7em; line-height: 1; }
			#emptyPage .contact-box .contact-box-btn .cb-txt { text-align: left; }
			#emptyPage .contact-box .contact-box-btn:hover { filter: brightness(.9); color: var(--cb-btntext, #fff); }
			#emptyPage .contact-box .contact-box-btn .cb-l1,
			#emptyPage .contact-box .contact-box-btn .cb-l2 { display: block; line-height: 1.25; }
						@media (max-width: 767px) {
				#emptyPage .contact-box { padding: 44px 18px 52px; }
				#emptyPage .contact-box h3 { font-size: 1.5rem; }
				#emptyPage .contact-box p { font-size: 1.05rem; }
			}

			#emptyPage .container.py-5 {
				color: #333;
				font-size: 15px;
				line-height: 1.8;
			}
			#emptyPage .container.py-5 h2 {
				color: #211d17;
				font-weight: 800;
				margin-bottom: 18px;
			}
			#emptyPage .container.py-5 ul,
			#emptyPage .container.py-5 ol { padding-left: 22px; }
			#emptyPage .container.py-5 li { margin-bottom: 8px; }

			/* =========================================================
			   FAQ ACCORDION — STYLE BIRU
			   Loading pertama: hanya .faq-acc-head yang tampil,
			   .faq-acc-body tersembunyi sampai item diklik (class "open").
			========================================================= */
			#emptyPage .faq-acc {
				background: #ffffff;
				border: 2px solid #e8c777;
				border-radius: 12px;
				overflow: hidden;
				box-shadow: 0 4px 18px rgba(80, 60, 25, .10);
			}

			#emptyPage .faq-acc-item {
				border-bottom: 1px solid rgba(210, 120, 29, .18);
			}
			#emptyPage .faq-acc-item.open {
				background: #fffaf0;
			}
			#emptyPage .faq-acc-item:last-child {
				border-bottom: 0;
			}

			#emptyPage .faq-acc-head {
				width: 100%;
				padding: 22px 24px;
				background: none;
				border: 0;
				text-align: left;
				font-size: 16px;
				font-weight: 500;
				color: #a85c13;
				cursor: pointer;
				display: flex;
				align-items: center;
				justify-content: space-between;
				gap: 16px;
				font-family: inherit;
				line-height: 1.4;
				transition: background .2s ease;
			}
			#emptyPage .faq-acc-head:hover {
				background: #fff3d8;
				color: #d2781d;
			}
			#emptyPage .faq-acc-item.open .faq-acc-head {
				color: #d2781d;
				font-weight: 600;
			}

			#emptyPage .faq-acc-head::after {
				content: "";
				flex: 0 0 18px;
				width: 18px;
				height: 18px;
				background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23d2781d' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
				background-repeat: no-repeat;
				background-position: center;
				background-size: contain;
				transition: transform .3s ease;
			}
			#emptyPage .faq-acc-item.open .faq-acc-head::after {
				transform: rotate(180deg);
			}

			/* Body: tertutup (tersembunyi penuh) secara default */
			#emptyPage .faq-acc-body {
				display: grid;
				grid-template-rows: 0fr;
				visibility: hidden;
				transition: grid-template-rows .35s ease, visibility 0s linear .35s;
			}
			/* Body: terbuka hanya jika item punya class "open" */
			#emptyPage .faq-acc-item.open .faq-acc-body {
				grid-template-rows: 1fr;
				visibility: visible;
				transition: grid-template-rows .35s ease, visibility 0s;
			}
			#emptyPage .faq-acc-body > p {
				overflow: hidden;
				min-height: 0;
				margin: 0;
				padding: 0 24px;              /* padding bawah hanya saat terbuka */
				color: #4a4338;
				font-size: 14.5px;
				line-height: 1.75;
				transition: padding .35s ease;
			}
			#emptyPage .faq-acc-item.open .faq-acc-body > p {
				padding: 0 24px 20px;
			}


			/* FAQ: 2 kolom (kiri accordion, kanan gambar) */
			#emptyPage .faq-side-img {
				display: block;
				width: 100%;
				height: auto;
				border-radius: 20px;
				box-shadow: 0 14px 36px rgba(80, 60, 25, .16);
			}
			@media (min-width: 992px) {
				#emptyPage .faq-layout .col-lg-5 {
					position: sticky;
					top: 90px;
					align-self: flex-start;
				}
			}
			@media (max-width: 991px) {
				#emptyPage .faq-side-img { max-width: 560px; margin: 8px auto 0; }
			}

			/*** Single Page Hero Header Start ***/
			.bg-breadcrumb {
				position: relative;
				overflow: hidden;
				background-position: center center;
				background-repeat: no-repeat;
				background-size: cover;
				padding: 60px 0 60px 0;
				transition: 0.5s;
			}

			.bg-breadcrumb .breadcrumb {
				position: relative;
			}

			.bg-breadcrumb .breadcrumb .breadcrumb-item a {
				color: var(--bs-white);
			}
			/*** Single Page Hero Header End ***/
		</style>
	</head>
	<body>
		<div class="preloader"><div class="status"><div class="status-mes"></div></div></div>

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>

		<!-- MENU MOBILE -->
		<div id="mobileNav" class="mnav" aria-hidden="true">
			<div class="mnav-backdrop" data-mnav-close></div>
			<nav class="mnav-panel" aria-label="Menu utama">
				<button type="button" class="mnav-close" data-mnav-close aria-label="Tutup menu">&times;</button>
				<ul class="mnav-list">
					<li><a href="#home" data-id="Beranda" data-en="Home">Beranda</a></li>
					<li><a href="#products" data-id="Produk" data-en="Products">Produk</a></li>
					<li><a href="#why-jsr" data-id="Keunggulan" data-en="Why JSR">Keunggulan</a></li>
					<li><a href="#testimonials" data-id="Testimoni" data-en="Testimonials">Testimoni</a></li>
				</ul>
				<div class="mnav-lang">
					<a href="javascript:void(0)" class="language-option" data-lang="id" aria-label="Bahasa Indonesia"><img src="assets/img/flag/id.png" alt="ID"></a>
					<a href="javascript:void(0)" class="language-option" data-lang="en" aria-label="English"><img src="assets/img/flag/gb.png" alt="EN"></a>
				</div>
			</nav>
		</div>

		<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-6 col-xl-2">
						<?php
						$logoMain = setting('site_logo') ?: 'assets/img/logo1.png';
						$logoMode = setting('logo_scroll_mode', 'same');
						$logoAlt  = setting('site_logo_scroll');
						$logoTxt  = trim(setting('site_logo_scroll_text'));
						$logoClr  = preg_match('/^#[0-9a-fA-F]{3,8}$/', setting('site_logo_scroll_color')) ? setting('site_logo_scroll_color') : '#b8860b';
						if ($logoMode === 'image' && $logoAlt === '') $logoMode = 'same';
						if ($logoMode === 'text' && $logoTxt === '') $logoMode = 'same';
						?>
						<h1 class="mb-0 site-logo" data-scroll-logo="<?= e($logoMode) ?>"><a href="/madujsr_new"><img src="<?= e($logoMain) ?>" alt="MaduJSR" class="logo logo-main"><?php if ($logoMode === 'image'): ?><img src="<?= e($logoAlt) ?>" alt="MaduJSR" class="logo logo-scroll-img"><?php elseif ($logoMode === 'text'): ?><span class="logo-scroll-text" style="color:<?= e($logoClr) ?>"><?= e($logoTxt) ?></span><?php endif; ?></a></h1>
					</div>
					<div class="col-12 col-md-10 d-none d-xl-block">
						<nav class="site-navigation position-relative text-right" role="navigation">
							<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
								<li class="active"><a class="nav-link active" href="#home" data-id="Beranda" data-en="Home">Beranda</a></li>
								<li><a class="nav-link" href="#products" data-id="Produk" data-en="Products">Produk</a></li>
								<li><a class="nav-link" href="#why-jsr" data-id="Keunggulan" data-en="Why JSR">Keunggulan</a></li>
								<li><a class="nav-link" href="#testimonials" data-id="Testimoni" data-en="Testimonials">Testimoni</a></li>
								<li class="language-menu">
									<a href="javascript:void(0)" class="nav-link language-toggle" aria-label="Pilih Bahasa">
										<img src="assets/img/flag/id.png" alt="ID" class="language-flag">
									</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
						<button type="button" id="navToggle" class="site-menu-toggle mnav-toggle" aria-label="Menu" aria-expanded="false" aria-controls="mobileNav">
							<svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
						</button>
					</div>
				</div>
			</div>
		</header>

		<section id="home" class="home_bg">
			<video class="hero-video" autoplay muted loop playsinline preload="metadata">
				<source src="<?= e(setting('hero_video')) ?>" type="video/mp4">
			</video>
			<div class="hero-overlay"></div>
			<div class="container hero-content">
				<div class="row w-100">
					<div class="col-lg-10 offset-lg-1 col-sm-12 text-center">
						<div class="hero-text">
							<h2<?= sa('hero_title') ?>><?= st('hero_title') ?></h2>
							<p<?= sa('hero_text') ?>>
								<?= st('hero_text') ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="featured-services" class="featured-services section">
			<div class="container">
				<div class="row gy-5 justify-content-center">
					<?php foreach ($services as $i => $s): ?>
					<div class="col-6 col-md-3 d-flex" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
						<div class="service-item<?= ($i % 4) + 1 ?>" style="background-image: url('<?= e($s['bg_image']) ?>');">
							<div class="service-content">
								<h4<?= bia($s['title_id'], $s['title_en']) ?>><?= e($s['title_id']) ?></h4>
								<p<?= bia($s['text_id'], $s['text_en']) ?>><?= e($s['text_id']) ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section id="about-jsr">
			<div class="about-overlay"></div>
			<div class="container">
				<div class="about-content">
					<h2>
						<span<?= sa('about_h') ?>><?= st('about_h') ?></span>
						<br /><em class="text-madu"><span<?= sa('about_em') ?>><?= st('about_em') ?></span></em>
					</h2>
					<p<?= sa('about_lead') ?>><strong><?= st('about_lead') ?></strong></p>
					<p<?= sa('about_p1') ?>>
						<?= st('about_p1') ?>
					</p>
					<p<?= sa('about_p2') ?>>
						<?= st('about_p2') ?>
					</p>
				</div>
			</div>
		</section>

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
								<img
                                    src="<?= e($p['img']) ?>"
                                    class="<?= e($p['class']) ?>"
                                    alt="<?= e($p['alt']) ?>"
                                    width="600"
                                    height="600"
                                    loading="<?= $i === 0 ? 'eager' : 'lazy' ?>"
                                    decoding="async"
                                    <?= $i === 0 ? 'fetchpriority="high"' : '' ?>
                                >
							</div>
							<div class="product-info">
								<span class="product-label" data-id="MADU MURNI JSR" data-en="PURE HONEY JSR">MADU MURNI JSR</span>
								<h2 data-id="<?= e($p['name']['id']) ?>" data-en="<?= e($p['name']['en']) ?>"><?= e($p['name']['id']) ?></h2>
								<p data-id="<?= e($p['desc']['id']) ?>" data-en="<?= e($p['desc']['en']) ?>">
									<?= e($p['desc']['id']) ?>
								</p>
								<a href="javascript:void(0)" class="btn btn-success" data-id="Lihat Produk" data-en="View Product">Lihat Produk</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>

				<button class="carousel-control-prev" type="button"
						data-bs-target="#productHeroCarousel" data-bs-slide="prev" aria-label="Produk sebelumnya">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				</button>
				<button class="carousel-control-next" type="button"
						data-bs-target="#productHeroCarousel" data-bs-slide="next" aria-label="Produk berikutnya">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
				</button>
			</div>
		</section>

		<section id="why-jsr">
			<div class="jsr-honeycomb jsr-honeycomb-top"><span></span><span></span><span></span><span></span><span></span><span></span></div>
			<div class="jsr-honeycomb jsr-honeycomb-bottom"><span></span><span></span><span></span><span></span></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<div class="jsr-heading">
							<div class="jsr-heading-label"<?= sa('why_label') ?>><span></span><?= st('why_label') ?></div>
							<h2<?= sa('why_title') ?>><?= em_title('why_title', 'why_em') ?></h2>
							<p<?= sa('why_text') ?>>
								<?= st('why_text') ?>
							</p>
						</div>
					</div>
				</div>
				<div class="row g-4 jsr-quality-grid">
					<?php foreach ($advantages as $i => $a): ?>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number"><?= sprintf('%02d', $i + 1) ?></span>
						<?php if ($a['stat'] !== ''): ?>
							<div class="jsr-stat"><?= e($a['stat']) ?></div>
							<?php if ($a['badge_id'] !== ''): ?><span class="jsr-badge"<?= bia($a['badge_id'], $a['badge_en']) ?>><?= e($a['badge_id']) ?></span><?php endif; ?>
						<?php else: ?>
							<div class="jsr-card-icon"><i class="fa <?= e(preg_match('/^fa-[a-z0-9-]+$/', $a['icon']) ? $a['icon'] : 'fa-leaf') ?>"></i></div>
						<?php endif; ?>
						<h3<?= bia($a['title_id'], $a['title_en']) ?>><?= e($a['title_id']) ?></h3>
						<p<?= bia($a['text_id'], $a['text_en']) ?>><?= e($a['text_id']) ?></p>
						<span class="jsr-card-line"></span></div></div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section id="testimonials" class="testimonial pb-5">
			<div class="container pb-5">
				<div class="text-center mx-auto pb-4" style="max-width: 800px;">
					<h2 class="display-4 text-capitalize mb-2"<?= sa('testi_title') ?>><?= st('testi_title') ?></h2>
				</div>
				<div class="owl-carousel owl-theme testimonial-carousel">
					<?php foreach ($testimonials as $t): ?>
					<div class="testimonial-item text-center p-4">
						<p class="testimonial-text">
							<span class="short-text"<?= bia($t['short']['id'], $t['short']['en']) ?>><?= e($t['short']['id']) ?></span>
							<span class="full-text"<?= bia($t['full']['id'], $t['full']['en']) ?>><?= e($t['full']['id']) ?></span>
						</p>
						<?php if ($t['long']): ?><button class="read-more-btn" onclick="toggleTestimonial(this)" data-id="Baca Selengkapnya" data-en="Read More">Baca Selengkapnya</button><?php endif; ?>
						<div class="d-flex justify-content-center"><img src="<?= e($t['photo']) ?>" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="<?= e($t['name']) ?>" loading="lazy" decoding="async"></div>
						<h4 class="text-dark"><?= e($t['name']) ?></h4>
						<p class="m-0" style="font-size: 12px; color: #666;"<?= bia($t['role']['id'], $t['role']['en']) ?>><?= e($t['role']['id']) ?></p>
						<div class="d-flex justify-content-center text-warning stars"><?php for ($s = 0; $s < $t['stars']; $s++): ?><i class="fa fa-star"></i><?php endfor; ?></div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<footer class="footer-area">
			<div class="container">
				<div class="row footer-padding">
					<div class="col-lg col-md-7 col-sm-12">
						<div class="single_footer">
							<a href="#home"><img src="assets/img/logo1.png" alt="MaduJSR" class="footer-logo"></a>
							<p style="color: rgba(255,255,255,.7); line-height: 1.7; margin-top: 10px; font-size: 14px;"<?= sa('footer_desc') ?>>
								<?= st('footer_desc') ?>
							</p>
							<?php if ($social): ?>
							<div class="footer-social-inline">
								<span class="social-label" data-id="IKUTI KAMI DI MEDIA SOSIAL" data-en="FOLLOW US ON SOCIAL MEDIA">IKUTI KAMI DI MEDIA SOSIAL</span>
								<div>
									<?php foreach ($social as $label => $s): ?>
									<a href="<?= e($s[1]) ?>" class="social-icon" title="<?= e($label) ?>" target="_blank" rel="noopener noreferrer"><i class="fa <?= e($s[0]) ?>"></i></a>
									<?php endforeach; ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg col-md-6 col-sm-12">
						<div class="single_footer">
							<h4 data-id="PRODUK" data-en="PRODUCTS">PRODUK</h4>
							<div class="footer_contact">
								<ul>
									<?php foreach ($products as $p): ?>
									<li><a href="#<?= e($p['slug']) ?>"<?= bia($p['name']['id'], $p['name']['en']) ?>><?= e($p['name']['id']) ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg col-md-6 col-sm-12">
						<div class="single_footer">
							<h4 data-id="INFORMASI" data-en="INFORMATION">INFORMASI</h4>
							<div class="footer_contact">
								<ul>
									<li><a href="#info-tentang-kami" data-id="Tentang Kami" data-en="About Us">Tentang Kami</a></li>
									<li><a href="#why-jsr"   data-id="Keunggulan"   data-en="Advantages">Keunggulan</a></li>
									<li><a href="#info-faq"          data-id="FAQ"          data-en="FAQ">FAQ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg col-md-6 col-sm-12">
						<div class="single_footer">
							<h4 data-id="BANTUAN" data-en="HELP">BANTUAN</h4>
							<div class="footer_contact">
								<ul>
									<li><a href="#bantuan-cara-pemesanan" data-id="Cara Pemesanan" data-en="How to Order">Cara Pemesanan</a></li>
									<li><a href="#bantuan-hubungi-kami"   data-id="Hubungi Kami"   data-en="Contact Us">Hubungi Kami</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="footer_copyright">
							<span class="copyright-text"<?= sa('copyright') ?>><?= st('copyright') ?></span>
							<span class="partof-inline">
								<span data-id="Bagian dari" data-en="Part of">Bagian dari</span>
								<a href="https://jsrstore.id" target="_blank" rel="noopener noreferrer" aria-label="JSR Store">
									<img src="assets/img/logo/jsr.png" alt="JSR Store" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
									<span class="partof-fallback">jsrstore.id</span>
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- =========================================================
			 PRODUCT DETAIL PAGE
		========================================================= -->
		<div class="product-page" id="productPage" role="dialog" aria-modal="true" aria-hidden="true">
			<div class="product-page-bar">
				<button type="button" class="pp-back" id="ppBack">
					<i class="fa fa-arrow-left"></i>
					<span data-id="Kembali" data-en="Back">Kembali</span>
				</button>
				<img src="assets/img/logo1.png" alt="MaduJSR" class="pp-logo" onerror="this.style.display='none'">
			</div>

			<div class="pp-hero">
				<div class="pp-left">
					<div class="pp-media">
						<a href="#" id="ppStoreLink" class="pp-store-badge" target="_blank" rel="noopener noreferrer" aria-label="Lihat di JSR Store">
							<span class="pp-store-label" data-id="Tersedia di" data-en="Available at">Tersedia di</span>
							<img src="assets/img/Logo_JSR_Store.png" alt="JSR Store" class="pp-store-logo-img" onerror="this.style.display='none'">
						</a>

						<button type="button" class="pp-nav prev" id="ppPrev" aria-label="Produk sebelumnya"><i class="fa fa-angle-left"></i></button>
						<div id="ppImgLink" class="pp-img-link"><img id="ppImg" src="" alt=""></div>
						<button type="button" class="pp-nav next" id="ppNext" aria-label="Produk berikutnya"><i class="fa fa-angle-right"></i></button>
					</div>

					<div class="pp-extra">
						<div class="pp-acc">
							<div class="pp-acc-item open">
								<button type="button" class="pp-acc-head" aria-expanded="true">
									<span class="pp-acc-icon"><i class="fa fa-user"></i></span>
									<span class="pp-acc-title">
										<strong data-id="Relevansi" data-en="Relevance">Relevansi</strong>
										<small data-id="COCOK UNTUK SIAPA" data-en="WHO IT IS FOR">COCOK UNTUK SIAPA</small>
									</span>
								</button>
								<div class="pp-acc-body"><div class="pp-acc-inner"><p id="ppRelevance"></p></div></div>
							</div>
							<div class="pp-acc-item">
								<button type="button" class="pp-acc-head" aria-expanded="false">
									<span class="pp-acc-icon"><i class="fa fa-shield"></i></span>
									<span class="pp-acc-title">
										<strong data-id="Trust" data-en="Trust">Trust</strong>
										<small data-id="ALASAN DIPERCAYA" data-en="WHY TRUST IT">ALASAN DIPERCAYA</small>
									</span>
								</button>
								<div class="pp-acc-body"><div class="pp-acc-inner"><ul id="ppTrust"></ul></div></div>
							</div>
							<div class="pp-acc-item">
								<button type="button" class="pp-acc-head" aria-expanded="false">
									<span class="pp-acc-icon"><i class="fa fa-heart"></i></span>
									<span class="pp-acc-title">
										<strong data-id="Fungsi" data-en="Function">Fungsi</strong>
										<small data-id="DIGUNAKAN UNTUK" data-en="WHAT IT IS USED FOR">DIGUNAKAN UNTUK</small>
									</span>
								</button>
								<div class="pp-acc-body"><div class="pp-acc-inner"><ul id="ppFunction"></ul></div></div>
							</div>
						</div>
					</div>
				</div>

				<div class="pp-info">
					<span class="pp-badge" id="ppBadge">
						<i class="fa fa-certificate"></i>
						<span data-id="Madu Murni" data-en="Pure Honey">Madu Murni</span>
					</span>

					<h1 id="ppTitle"></h1>
					<div class="pp-subtitle" id="ppSubtitle"></div>
					<div class="pp-price" id="ppPrice"></div>

					<div class="pp-features" id="ppFeatures"></div>

					<img class="img-trace" loading="lazy" decoding="async"
						 src="https://cdn.shopify.com/s/files/1/0071/9755/6794/files/latestpuretrace.png"
						 alt="PureTrace Banner">

					<div class="pp-trust-buttons">
						<div class="trust-btn-wrap">
							<button type="button" class="trust-btn">
								<i class="fa fa-info-circle"></i>
								<span data-id="Informasi Suplemen" data-en="Supplement Facts">Informasi Suplemen</span>
							</button>
							<div class="trust-popup" role="tooltip">
								<h4 data-id="Supplement Info" data-en="Supplement Info">Supplement Info</h4>
								<div class="popup-subtitle" data-id="Per-Serving Information" data-en="Per-Serving Information">Per-Serving Information</div>
								<div class="sf-row">
									<div class="sf-img"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Product" loading="lazy" decoding="async"></div>
									<div class="sf-table">
										<div class="sf-item"><span data-id="Kalori" data-en="Calories">Kalori</span><strong>70</strong></div>
										<div class="sf-item"><span data-id="Lemak Total" data-en="Total Fat">Lemak Total</span><strong>0g</strong></div>
										<div class="sf-item"><span data-id="Natrium" data-en="Sodium">Natrium</span><strong>0g</strong></div>
										<div class="sf-item"><span data-id="Karbohidrat Total" data-en="Total Carbs">Karbohidrat Total</span><strong>16g</strong></div>
										<div class="sf-item"><span data-id="Protein" data-en="Protein">Protein</span><strong>0g</strong></div>
									</div>
								</div>
							</div>
						</div>

						<div class="trust-btn-wrap">
							<button type="button" class="trust-btn">
								<i class="fa fa-clipboard"></i>
								<span data-id="Hasil Tes Pihak Ketiga" data-en="Third-Party Test Results">Hasil Tes Pihak Ketiga</span>
							</button>
							<div class="trust-popup" role="tooltip">
								<h4 data-id="Tested By The Best" data-en="Tested By The Best">Tested By The Best</h4>
								<div class="popup-subtitle">&nbsp;</div>
								<div class="cert-grid">
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Analytical Labs" loading="lazy" decoding="async"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Hill Laboratories" loading="lazy" decoding="async"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Halal" loading="lazy" decoding="async"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Kosher" loading="lazy" decoding="async"></div>
								</div>
							</div>
						</div>
					</div>

					<p class="pp-desc" id="ppDesc"></p>

					<a id="ppBuy2" class="pp-buy" href="#" target="_blank" rel="noopener noreferrer">
						<i class="fa fa-shopping-cart"></i>
						<span data-id="Beli di JSR Store" data-en="Buy at JSR Store">Beli di JSR Store</span>
					</a>
				</div>
			</div>
		</div>

		<!-- =========================================================
			 HALAMAN KOSONG (INFORMASI / BANTUAN) — MULTI KONTEN
		========================================================= -->
		<div class="product-page image-only" id="emptyPage" role="dialog" aria-modal="true" aria-hidden="true">
			<div class="product-page-bar">
				<button type="button" class="pp-back" id="emptyBack">
					<i class="fa fa-arrow-left"></i>
					<span data-id="Kembali" data-en="Back">Kembali</span>
				</button>
				<img src="assets/img/logo1.png" alt="MaduJSR" class="pp-logo" onerror="this.style.display='none'">
			</div>

			<!-- ==================== HALAMAN: FAQ ==================== -->
			<?php render_faq_page(); ?>

			<!-- ==================== HALAMAN: TENTANG KAMI ==================== -->
			<?php render_page('tentang-kami'); ?>

			<!-- ==================== HALAMAN: KEUNGGULAN ==================== -->
			<div class="empty-page-content" data-page="keunggulan">
				<div class="container-fluid bg-breadcrumb">
					<div class="container text-center py-5" style="max-width: 900px;">
						<h4 class="text-white display-4 mb-4" data-id="Keunggulan" data-en="Advantages">Keunggulan</h4>
						<ol class="breadcrumb d-flex justify-content-center mb-0">
							<li class="breadcrumb-item"><a href="#home" data-id="Beranda" data-en="Home">Beranda</a></li>
							<li class="breadcrumb-item active" data-id="Keunggulan" data-en="Advantages">Keunggulan</li>
						</ol>
					</div>
				</div>
				<div class="container py-5" style="max-width: 900px;">
					<ul>
						<li data-id="Madu murni tanpa tambahan" data-en="Pure honey with no additives">Madu murni tanpa tambahan</li>
						<li data-id="Kadar enzim diastase 6,78 (SNI: 3)" data-en="Diastase enzyme level 6.78 (SNI: 3)">Kadar enzim diastase 6,78 (SNI: 3)</li>
						<li data-id="HMF 39,17 (batas maksimal 40)" data-en="HMF 39.17 (maximum limit 40)">HMF 39,17 (batas maksimal 40)</li>
						<li data-id="Bebas logam berat &amp; kloramfenikol" data-en="Free from heavy metals &amp; chloramphenicol">Bebas logam berat &amp; kloramfenikol</li>
						<li data-id="Tersertifikasi halal &amp; P-IRT" data-en="Halal certified &amp; P-IRT registered">Tersertifikasi halal &amp; P-IRT</li>
					</ul>
				</div>
			</div>

			<!-- ==================== HALAMAN: CARA PEMESANAN ==================== -->
			<?php render_page('cara-pemesanan'); ?>

			<!-- ==================== HALAMAN: HUBUNGI KAMI ==================== -->
			<?php render_page('hubungi-kami'); ?>
		</div>

		<!-- WHATSAPP CONSULT WIDGET -->
		<a href="<?= e($wa_url) ?>" class="wa-consult" target="_blank" rel="noopener noreferrer" aria-label="Konsultasi via WhatsApp">
			<span class="wa-avatar">
				<span class="wa-circle">
					<i class="fa fa-user"></i>
					<img src="<?= e(setting('wa_avatar') ?: 'assets/img/cs/cs.png') ?>" alt="Customer Service" class="wa-photo" onerror="this.style.display='none'">
				</span>
				<span class="wa-badge"><i class="fa fa-whatsapp"></i></span>
			</span>
			<span class="wa-text">
				<span class="wa-title"<?= sa('wa_title') ?>><?= st('wa_title') ?></span>
				<span class="wa-desc"<?= sa('wa_desc') ?>><?= st('wa_desc') ?></span>
			</span>
		</a>

		<!-- FLOATING CTA -->
		<div class="floating-cta" id="floatingCta">
			<button class="close-cta" onclick="closeFloatingCta()" aria-label="Tutup"><i class="fa fa-times"></i></button>
			<a href="<?= e(setting('cta_link')) ?>" target="_blank" rel="noopener noreferrer" class="floating-btn">
				<i class="fa fa-shopping-cart"></i>
				<span class="btn-label">
					<small<?= sa('cta_small') ?>><?= st('cta_small') ?></small>
					<span<?= sa('cta_main') ?>><?= st('cta_main') ?></span>
				</span>
			</a>
		</div>

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

		<script>
			window.PRODUCT_HASHES = <?= json_encode(array_keys($product_hash_map), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
			function toggleTestimonial(btn) {
				var textContainer = btn.previousElementSibling;
				if (textContainer.classList.contains('show-full')) {
					textContainer.classList.remove('show-full');
					var currentLang = localStorage.getItem('language') || 'id';
					if (currentLang === 'en') btn.textContent = btn.getAttribute('data-en') || 'Read More';
					else btn.textContent = btn.getAttribute('data-id') || 'Baca Selengkapnya';
				} else {
					textContainer.classList.add('show-full');
					var currentLang = localStorage.getItem('language') || 'id';
					if (currentLang === 'en') btn.textContent = 'Hide';
					else btn.textContent = 'Sembunyikan';
				}
			}
			function closeFloatingCta() {
				var cta = document.getElementById('floatingCta');
				cta.classList.remove('active');
				localStorage.setItem('floatingCtaClosed', 'true');
			}
			document.addEventListener("DOMContentLoaded", function () {
				// Widget WhatsApp di mobile: tarik ke kiri untuk membuka teks, tarik ke kanan / ketuk di luar untuk menutup
				(function () {
					var w = document.querySelector('.wa-consult');
					if (!w) return;
					var mq = window.matchMedia('(max-width: 576px)');
					var sx = null, sy = 0, moved = false, timer = null;
					function setOpen(o) {
						w.classList.toggle('open', o);
						clearTimeout(timer);
						if (o) timer = setTimeout(function () { w.classList.remove('open'); }, 8000);
					}
					w.addEventListener('pointerdown', function (e) { if (!mq.matches) return; sx = e.clientX; sy = e.clientY; moved = false; });
					w.addEventListener('pointermove', function (e) {
						if (sx === null || !mq.matches) return;
						var dx = e.clientX - sx, dy = e.clientY - sy;
						if (Math.abs(dx) < 18 || Math.abs(dx) < Math.abs(dy)) return;
						moved = true;
						if (dx < 0 && !w.classList.contains('open')) setOpen(true);
						else if (dx > 0 && w.classList.contains('open')) setOpen(false);
						sx = e.clientX;
					});
					function end() { sx = null; }
					w.addEventListener('pointerup', end);
					w.addEventListener('pointercancel', function () { sx = null; moved = true; setTimeout(function () { moved = false; }, 300); });
					w.addEventListener('click', function (e) {
						if (moved) { e.preventDefault(); moved = false; }
					});
					document.addEventListener('pointerdown', function (e) { if (!w.contains(e.target)) setOpen(false); });
				})();
				if (typeof AOS !== "undefined") AOS.init({ duration: 800, once: true, offset: 80 });
				window.addEventListener('scroll', function() {
					var navbar = document.querySelector('.site-navbar');
					if (window.scrollY > 80) navbar.classList.add('sticky');
					else navbar.classList.remove('sticky');
				});
				var floatingCta = document.getElementById('floatingCta');
				var whySection = document.getElementById('why-jsr');
				var isCtaClosed = localStorage.getItem('floatingCtaClosed') === 'true';
				function checkFloatingCta() {
					if (isCtaClosed) { floatingCta.classList.remove('active'); return; }
					if (!whySection) return;
					var rect = whySection.getBoundingClientRect();
					var windowHeight = window.innerHeight;
					if (rect.top < windowHeight * 0.6 && rect.bottom > 0) floatingCta.classList.add('active');
					else floatingCta.classList.remove('active');
				}
				window.addEventListener('scroll', checkFloatingCta);
				window.addEventListener('resize', checkFloatingCta);
				setTimeout(checkFloatingCta, 500);
				const carousel = document.getElementById("productHeroCarousel");
				if (carousel) {
					new bootstrap.Carousel(carousel, { interval: 5000, ride: "carousel", pause: false, wrap: true });
				}
				if (typeof jQuery !== "undefined" && typeof jQuery.fn.owlCarousel !== "undefined") {
					$(".testimonial-carousel").owlCarousel({
						autoplay: true, autoplayTimeout: 5000, autoplayHoverPause: true,
						speed: 1000, loop: true, margin: 15, nav: false, dots: false,
						navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
						responsive: { 0: { items: 1 }, 768: { items: 2 }, 1200: { items: 3 } }
					});
				}
				document.querySelectorAll('a[href^="#"]').forEach(function (link) {
					if (link.closest('#mobileNav')) return;
					link.addEventListener("click", function (e) {
						var h = this.getAttribute("href");
						if (!h || h.length < 2) return;
						if (h === '#info-faq' || h === '#info-tentang-kami' || h === '#info-keunggulan' ||
						    h === '#bantuan-cara-pemesanan' || h === '#bantuan-hubungi-kami') return;
						if (window.PRODUCT_HASHES && window.PRODUCT_HASHES.indexOf(h) !== -1) return;
						let target = null;
						try { target = document.querySelector(h); } catch (err) { return; }
						if (target) { e.preventDefault(); target.scrollIntoView({ behavior: "smooth", block: "start" }); }
					});
				});
			});
		</script>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const languageOptions = document.querySelectorAll('.language-option');
				function changeLanguage(lang) {
					document.querySelectorAll('[data-id][data-en]').forEach(function (el) {
						if (el.id === 'ppDesc' || el.classList.contains('pp-desc') || el.hasAttribute('data-html')) {
							el.innerHTML = (lang === 'en') ? el.getAttribute('data-en') : el.getAttribute('data-id');
						} else {
							el.textContent = (lang === 'en') ? el.getAttribute('data-en') : el.getAttribute('data-id');
						}
					});
					languageOptions.forEach(function (opt) {
						opt.classList.toggle('active', opt.getAttribute('data-lang') === lang);
					});
					var flagSrc = (lang === 'en') ? 'assets/img/flag/gb.png' : 'assets/img/flag/id.png';
					document.querySelectorAll('.language-toggle .language-flag').forEach(function (img) {
						img.src = flagSrc;
						img.alt = (lang === 'en') ? 'EN' : 'ID';
					});
					var ppImgLink = document.getElementById('ppImgLink');
					if (ppImgLink && ppImgLink.dataset.captionId && ppImgLink.dataset.captionEn) {
						ppImgLink.setAttribute('data-caption',
							(lang === 'en') ? ppImgLink.dataset.captionEn : ppImgLink.dataset.captionId);
					}
					localStorage.setItem('language', lang);
					document.documentElement.lang = lang;
				}
				document.addEventListener('click', function (e) {
					var toggle = e.target.closest('.language-toggle');
					if (toggle) {
						e.preventDefault();
						var current = localStorage.getItem('language') || 'id';
						changeLanguage(current === 'id' ? 'en' : 'id');
						return;
					}
					var option = e.target.closest('.language-option');
					if (option) {
						e.preventDefault();
						changeLanguage(option.getAttribute('data-lang'));
					}
				});
				changeLanguage(localStorage.getItem('language') || 'id');
			});
		</script>

		<script>
			document.addEventListener("DOMContentLoaded", function() {
				const carouselElement = document.getElementById('productHeroCarousel');
				if (!carouselElement) return;
				let carouselInstance = bootstrap.Carousel.getInstance(carouselElement);
				if (!carouselInstance) {
					carouselInstance = new bootstrap.Carousel(carouselElement, { interval: 5000, ride: 'carousel', pause: false, wrap: true });
				}
				let startX = 0, startY = 0;
				let isDragging = false, isSwiping = false, isSwipingHorizontal = false;
				const startDrag = (e) => {
					const clientX = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
					const clientY = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
					startX = clientX; startY = clientY;
					isDragging = true; isSwiping = false; isSwipingHorizontal = false;
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
					if (isSwipingHorizontal) e.preventDefault();
				};
				const endDrag = (e) => {
					if (!isDragging) return;
					isDragging = false;
					carouselElement.style.cursor = 'grab';
					carouselElement.style.userSelect = '';
					const clientX = e.clientX || (e.changedTouches && e.changedTouches[0] && e.changedTouches[0].clientX) || 0;
					const diffX = clientX - startX;
					if (isSwiping && isSwipingHorizontal && Math.abs(diffX) > 50) {
						if (diffX > 0) carouselInstance.prev();
						else carouselInstance.next();
						}
					isSwiping = false; isSwipingHorizontal = false;
				};
				carouselElement.addEventListener('mousedown', startDrag);
				document.addEventListener('mousemove', moveDrag);
				document.addEventListener('mouseup', endDrag);
				carouselElement.addEventListener('touchstart', startDrag, { passive: true });
				document.addEventListener('touchmove', moveDrag, { passive: false });
				document.addEventListener('touchend', endDrag);
				carouselElement.querySelectorAll('img').forEach(img => { img.addEventListener('dragstart', (e) => e.preventDefault()); });
				carouselElement.style.cursor = 'grab';
			});
		</script>

		<script>
		document.addEventListener('DOMContentLoaded', function () {
			var PRODUCTS = <?= json_encode($products, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?>;
			var DETAILS = <?= json_encode($details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?>;
			var TRUST = <?= json_encode($trust, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?>;

			var HASH_MAP = <?= json_encode($product_hash_map, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
			var HASH_MAP_REVERSE = {};
			Object.keys(HASH_MAP).forEach(function (k) {
				HASH_MAP_REVERSE[HASH_MAP[k]] = k;
			});

			var EMPTY_HASHES = {
				'#info-tentang-kami':      'tentang-kami',
				'#info-keunggulan':        'keunggulan',
				'#info-faq':               'faq',
				'#bantuan-cara-pemesanan': 'cara-pemesanan',
				'#bantuan-hubungi-kami':   'hubungi-kami'
			};

			var page        = document.getElementById('productPage');
			var emptyPage   = document.getElementById('emptyPage');
			var emptyBack   = document.getElementById('emptyBack');
			var ppImg       = document.getElementById('ppImg');
			var ppImgLink   = document.getElementById('ppImgLink');
			var ppBadge     = document.getElementById('ppBadge');
			var ppTitle     = document.getElementById('ppTitle');
			var ppSubtitle  = document.getElementById('ppSubtitle');
			var ppPrice     = document.getElementById('ppPrice');
			var ppFeatures  = document.getElementById('ppFeatures');
			var ppDesc      = document.getElementById('ppDesc');
			var ppBuy2      = document.getElementById('ppBuy2');
			var ppBack      = document.getElementById('ppBack');
			var ppRelevance = document.getElementById('ppRelevance');
			var ppTrust     = document.getElementById('ppTrust');
			var ppFunction  = document.getElementById('ppFunction');
			var ppPrev      = document.getElementById('ppPrev');
			var ppNext      = document.getElementById('ppNext');

			var ppBadgeEl = document.querySelector('.pp-store-badge');
			var ppMedia   = document.querySelector('.pp-media');
			var lastDims  = null;

			var mqContain = window.matchMedia('(max-aspect-ratio: 6/5)');
			function isContainMode() { return mqContain.matches; }

			function coverRect(cw, ch, nw, nh) {
				var s = Math.max(cw / nw, ch / nh);
				var w = nw * s, h = nh * s;
				return { x: (cw - w) / 2, y: (ch - h) / 2, w: w, h: h };
			}

			function containRect(cw, ch, nw, nh) {
				var s = Math.min(cw / nw, ch / nh);
				var w = nw * s, h = nh * s;
				return { x: (cw - w) / 2, y: (ch - h) / 2, w: w, h: h };
			}

			function currentRect(cw, ch, nw, nh) {
				return isContainMode()
					? containRect(cw, ch, nw, nh)
					: coverRect(cw, ch, nw, nh);
			}

			function readLogoBox() {
				var cs = getComputedStyle(ppBadgeEl);
				var b = {};
				var prefix = isContainMode() ? '--logo-mobile-' : '--logo-';
				['vw', 'vh', 'x', 'y', 'w', 'h'].forEach(function (k) {
					b[k] = parseFloat(cs.getPropertyValue(prefix + k));
				});
				for (var k in b) { if (!isFinite(b[k]) || b[k] <= 0 && (k === 'vw' || k === 'vh' || k === 'w' || k === 'h')) return null; }
				return b;
			}

			function placeStoreBadge() {
				if (!ppBadgeEl || !ppMedia) return;
				var anchored = false;
				var cw = ppMedia.clientWidth, ch = ppMedia.clientHeight;
				var LOGO_BOX = readLogoBox();

				if (LOGO_BOX && lastDims && lastDims.w && cw && ch && page.classList.contains('image-only')) {
					var ref = currentRect(LOGO_BOX.vw, LOGO_BOX.vh, lastDims.w, lastDims.h);
					var fx = (LOGO_BOX.x - ref.x) / ref.w,  fy = (LOGO_BOX.y - ref.y) / ref.h;
					var fw = LOGO_BOX.w / ref.w,            fh = LOGO_BOX.h / ref.h;

					var cur = currentRect(cw, ch, lastDims.w, lastDims.h);
					var x = cur.x + fx * cur.w, y = cur.y + fy * cur.h;
					var w = fw * cur.w,         h = fh * cur.h;

					if (x >= 0 && y >= 0 && x + w <= cw && y + h <= ch) {
						ppBadgeEl.style.left   = x + 'px';
						ppBadgeEl.style.top    = y + 'px';
						ppBadgeEl.style.width  = w + 'px';
						ppBadgeEl.style.height = h + 'px';
						ppBadgeEl.style.bottom = 'auto';
						ppBadgeEl.classList.add('is-anchored');
						anchored = true;
					}
				}

				if (!anchored) {
					ppBadgeEl.style.left = ppBadgeEl.style.top = ppBadgeEl.style.width =
					ppBadgeEl.style.height = ppBadgeEl.style.bottom = '';
					ppBadgeEl.classList.remove('is-anchored');
				}
				ppBadgeEl.classList.add('placed');
			}

			window.addEventListener('resize', function () {
				if (ppBadgeEl && ppBadgeEl.classList.contains('placed')) placeStoreBadge();
			});
			if (mqContain.addEventListener) mqContain.addEventListener('change', function () {
				if (ppBadgeEl && ppBadgeEl.classList.contains('placed')) placeStoreBadge();
			});
			else if (mqContain.addListener) mqContain.addListener(function () {
				if (ppBadgeEl && ppBadgeEl.classList.contains('placed')) placeStoreBadge();
			});

			var carouselEl  = document.getElementById('productHeroCarousel');
			var slides      = Array.prototype.slice.call(carouselEl.querySelectorAll('.carousel-item'));
			var openedByClick = false;
			var currentIndex = 0;

			function curLang() { return localStorage.getItem('language') || 'id'; }
			function setBi(el, o) {
				if (!o) return;
				el.setAttribute('data-id', o.id);
				el.setAttribute('data-en', o.en);
				el.textContent = o[curLang()];
			}
			function setBiHtml(el, o) {
				if (!o) return;
				var raw = o[curLang()] || '';
				var safe = raw
					.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
					.replace(/"/g, '&quot;').replace(/\n/g, '<br>');
				el.setAttribute('data-id', raw);
				el.setAttribute('data-en', o.en);
				el.innerHTML = safe;
			}
			function renderList(ul, items) {
				ul.innerHTML = '';
				items.forEach(function (o) {
					var li = document.createElement('li');
					setBi(li, o);
					ul.appendChild(li);
				});
			}
			function renderFeatures(container, features) {
				container.innerHTML = '';
				features.forEach(function (f) {
					var wrap = document.createElement('div');
					wrap.className = 'pp-feature';
					var iconWrap = document.createElement('div');
					iconWrap.className = 'pp-feature-icon';
					var i = document.createElement('i');
					i.className = 'fa ' + f.icon;
					iconWrap.appendChild(i);
					var label = document.createElement('div');
					label.className = 'pp-feature-label';
					label.setAttribute('data-id', f.label_id);
					label.setAttribute('data-en', f.label_en);
					label.textContent = (curLang() === 'en') ? f.label_en : f.label_id;
					wrap.appendChild(iconWrap);
					wrap.appendChild(label);
					container.appendChild(wrap);
				});
			}

			var imgLoadToken = 0;
			function loadDetailImage(src, alt) {
				imgLoadToken++;
				var myToken = imgLoadToken;

				ppImg.classList.add('is-loading');
				ppBadgeEl.classList.remove('placed');

				var pre = new Image();
				pre.onload = function () {
					if (myToken !== imgLoadToken) return;
					lastDims = { w: pre.naturalWidth, h: pre.naturalHeight };
					placeStoreBadge();
					ppImg.src = src;
					ppImg.alt = alt;
					if (ppImg.decode) {
						ppImg.decode().then(function () {
							if (myToken !== imgLoadToken) return;
							ppImg.classList.remove('is-loading');
						}).catch(function () {
							ppImg.classList.remove('is-loading');
						});
					} else {
						requestAnimationFrame(function () {
							if (myToken !== imgLoadToken) return;
							ppImg.classList.remove('is-loading');
						});
					}
				};
				pre.onerror = function () {
					if (myToken !== imgLoadToken) return;
					lastDims = null;
					placeStoreBadge();
					ppImg.src = src;
					ppImg.alt = alt;
					ppImg.classList.remove('is-loading');
				};
				pre.src = src;
			}

			function fill(i) {
				var s = slides[i];
				var p = PRODUCTS[i];
				var d = DETAILS[i];

				var useImageOnly = !!(d && d.is_image_only);
				var carouselImgSrc = s.querySelector('.product-image-wrapper img').getAttribute('src');
				var isMobilePortrait = isContainMode();
				var imgSrc = (useImageOnly && isMobilePortrait && p.mobile_detail_img)
					? p.mobile_detail_img
					: ((useImageOnly && p.detail_img && p.detail_img !== '')
						? p.detail_img
						: carouselImgSrc);
				var imgAlt = s.querySelector('.product-image-wrapper img').alt;

				loadDetailImage(imgSrc, imgAlt);

				ppImgLink.dataset.captionId = p.name.id;
				ppImgLink.dataset.captionEn = p.name.en;

				var badgeSpan = ppBadge.querySelector('span[data-id]');
				if (badgeSpan && p.badge) setBi(badgeSpan, p.badge);
				ppTitle.setAttribute('data-id', p.name.id);
				ppTitle.setAttribute('data-en', p.name.en);
				ppTitle.textContent = (curLang() === 'en') ? p.name.en : p.name.id;
				if (p.subtitle && (p.subtitle.id || p.subtitle.en)) {
					ppSubtitle.innerHTML = (curLang() === 'en') ? p.subtitle.en : p.subtitle.id;
					ppSubtitle.style.display = '';
				} else {
					ppSubtitle.innerHTML = '';
					ppSubtitle.style.display = 'none';
				}
				if (p.price) {
					var priceNote = p.price_note ? p.price_note[curLang()] : '';
					ppPrice.innerHTML = '<span class="price-value">' + p.price + '</span>' +
										(priceNote ? ' <span class="price-note">' + priceNote + '</span>' : '');
					ppPrice.style.display = '';
				} else {
					ppPrice.innerHTML = '';
					ppPrice.style.display = 'none';
				}
				renderFeatures(ppFeatures, p.features || []);
				var longDesc = d && d.long_desc ? d.long_desc : p.desc;
				setBiHtml(ppDesc, longDesc);
				if (d) {
					setBi(ppRelevance, d.relevance);
					renderList(ppFunction, d['function']);
				}
				renderList(ppTrust, TRUST);
				ppBuy2.href = p.link || '#';

				if (p.link) {
					ppBadgeEl.href = p.link;
					ppBadgeEl.title = (curLang() === 'en') ? 'Buy at JSR Store' : 'Beli di JSR Store';
					ppBadgeEl.setAttribute('aria-label', ppBadgeEl.title);
				} else {
					ppBadgeEl.removeAttribute('href');
				}

				if (useImageOnly) {
					page.classList.add('image-only');
				} else {
					page.classList.remove('image-only');
				}

				currentIndex = i;

				PRODUCTS.forEach(function (q) { if (q.logo_class) ppBadgeEl.classList.remove(q.logo_class); });
				if (p.logo_class) ppBadgeEl.classList.add(p.logo_class);

				/* Posisi logo per produk (diatur di CMS > Produk). Menimpa nilai dari kelas CSS di atas. */
				var LG = p.logo;
				if (LG && LG.w > 0 && LG.h > 0) {
					var st = ppBadgeEl.style;
					st.setProperty('--logo-vw', '1918'); st.setProperty('--logo-vh', '876');
					st.setProperty('--logo-x', LG.x);   st.setProperty('--logo-y', LG.y);
					st.setProperty('--logo-w', LG.w);   st.setProperty('--logo-h', LG.h);
					st.setProperty('--logo-mobile-vw', '375'); st.setProperty('--logo-mobile-vh', '667');
					st.setProperty('--logo-mobile-x', '150');  st.setProperty('--logo-mobile-y', '610');
					st.setProperty('--logo-mobile-w', '75');   st.setProperty('--logo-mobile-h', '52');
				}
			}

			/* =========================================================
			   RESET FAQ: semua item tertutup (hanya faq-acc-head tampil)
			========================================================= */
			function resetFaq() {
				emptyPage.querySelectorAll('.faq-acc-item').forEach(function (it) {
					it.classList.remove('open');
				});
			}

			function showEmptyContent(pageName) {
				emptyPage.querySelectorAll('.empty-page-content').forEach(function (el) {
					el.classList.toggle('active', el.dataset.page === pageName);
				});
				/* Setiap buka halaman kosong, FAQ direset tertutup semua */
				resetFaq();
				emptyPage.scrollTop = 0;
			}

			function openPage(i) {
				fill(i);
				page.classList.add('open');
				page.setAttribute('aria-hidden', 'false');
				page.scrollTop = 0;
				Array.prototype.slice.call(page.querySelectorAll('.pp-acc-item')).forEach(function (it, n) {
					it.classList.toggle('open', n === 0);
					it.querySelector('.pp-acc-head').setAttribute('aria-expanded', n === 0 ? 'true' : 'false');
				});
				document.body.style.overflow = 'hidden';
				var inst = bootstrap.Carousel.getInstance(carouselEl);
				if (inst) inst.pause();
			}
			function closePage() {
				if (!page.classList.contains('open')) return;
				page.classList.remove('open');
				page.classList.remove('image-only');
				page.setAttribute('aria-hidden', 'true');
				document.body.style.overflow = '';
				var inst = bootstrap.Carousel.getInstance(carouselEl);
				if (inst) inst.cycle();
			}

			function openEmpty(pageName) {
				closePage();
				showEmptyContent(pageName);
				emptyPage.classList.add('open');
				emptyPage.setAttribute('aria-hidden', 'false');
				document.body.style.overflow = 'hidden';
				var inst = bootstrap.Carousel.getInstance(carouselEl);
				if (inst) inst.pause();
			}
			function closeEmpty() {
				if (!emptyPage.classList.contains('open')) return;
				emptyPage.classList.remove('open');
				emptyPage.setAttribute('aria-hidden', 'true');
				document.body.style.overflow = '';
				var inst = bootstrap.Carousel.getInstance(carouselEl);
				if (inst) inst.cycle();
			}

			function route() {
				var hash = location.hash;

				var emptyPageName = EMPTY_HASHES[hash];
				if (emptyPageName) {
					openEmpty(emptyPageName);
					return;
				}
				if (emptyPage.classList.contains('open')) {
					closeEmpty();
				}

				var idx = HASH_MAP[hash];
				if (idx !== undefined && slides[idx]) openPage(idx);
				else closePage();
			}

			carouselEl.querySelectorAll('.product-info .btn').forEach(function (btn) {
				btn.addEventListener('click', function (e) {
					e.preventDefault();
					var idx = slides.indexOf(btn.closest('.carousel-item'));
					openedByClick = true;
					location.hash = HASH_MAP_REVERSE[idx];
				});
			});
			Array.prototype.slice.call(page.querySelectorAll('.pp-acc-head')).forEach(function (h) {
				h.addEventListener('click', function () {
					var open = h.parentNode.classList.toggle('open');
					h.setAttribute('aria-expanded', open ? 'true' : 'false');
				});
			});

			emptyPage.querySelectorAll('.faq-acc-head').forEach(function (h) {
				h.addEventListener('click', function () {
					var item = h.parentNode;
					var willOpen = !item.classList.contains('open');
					emptyPage.querySelectorAll('.faq-acc-item').forEach(function (it) {
						it.classList.remove('open');
					});
					if (willOpen) item.classList.add('open');
				});
			});

			ppBack.addEventListener('click', function () {
				if (openedByClick) {
					openedByClick = false;
					history.back();
				} else {
					history.replaceState(null, '', location.pathname + location.search);
					route();
				}
			});
			emptyBack.addEventListener('click', function () {
				history.replaceState(null, '', location.pathname + location.search);
				route();
			});
			ppPrev.addEventListener('click', function () {
				var next = (currentIndex - 1 + PRODUCTS.length) % PRODUCTS.length;
				history.replaceState(null, '', HASH_MAP_REVERSE[next]);
				openPage(next);
			});
			ppNext.addEventListener('click', function () {
				var next = (currentIndex + 1) % PRODUCTS.length;
				history.replaceState(null, '', HASH_MAP_REVERSE[next]);
				openPage(next);
			});
			document.addEventListener('keydown', function (e) {
				if (emptyPage.classList.contains('open')) {
					if (e.key === 'Escape') emptyBack.click();
					return;
				}
				if (!page.classList.contains('open')) return;
				if (e.key === 'Escape') ppBack.click();
				if (e.key === 'ArrowLeft' && !page.classList.contains('image-only')) ppPrev.click();
				if (e.key === 'ArrowRight' && !page.classList.contains('image-only')) ppNext.click();
			});

			resetFaq();   /* loading pertama: semua FAQ tertutup, hanya faq-acc-head yang tampil */
			window.addEventListener('hashchange', route);
			route();
		});
		</script>

		<script>
			(function () {
				var nav = document.getElementById('mobileNav');
				var btn = document.getElementById('navToggle');
				if (!nav || !btn) return;

				function setOpen(open) {
					nav.classList.toggle('open', open);
					nav.setAttribute('aria-hidden', open ? 'false' : 'true');
					btn.setAttribute('aria-expanded', open ? 'true' : 'false');
					document.body.style.overflow = open ? 'hidden' : '';
					document.documentElement.style.overflow = open ? 'hidden' : '';
				}

				function scrollToTarget(t, hash) {
					try { t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
					catch (err) { t.scrollIntoView(true); }
					setTimeout(function () {
						if (Math.abs(t.getBoundingClientRect().top) > 150) {
							var y = t.getBoundingClientRect().top + (window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0);
							window.scrollTo(0, y);
							document.documentElement.scrollTop = y;
							document.body.scrollTop = y;
							if (Math.abs(t.getBoundingClientRect().top) > 150) location.hash = hash.slice(1);
						}
					}, 900);
				}

				window.addEventListener('click', function (e) {
					var tg = e.target;
					if (!tg || !tg.closest) return;

					if (tg.closest('#navToggle')) {
						e.preventDefault(); e.stopPropagation();
						setOpen(!nav.classList.contains('open'));
						return;
					}
					if (!tg.closest('#mobileNav')) return;

					if (tg.closest('[data-mnav-close]')) {
						e.preventDefault(); e.stopPropagation();
						setOpen(false);
						return;
					}
					var a = tg.closest('a[href^="#"]');
					if (!a) return;
					var h = a.getAttribute('href');
					var t = null;
					try { t = h.length > 1 ? document.querySelector(h) : null; } catch (err) {}
					e.preventDefault(); e.stopPropagation();
					setOpen(false);
					if (t) setTimeout(function () { scrollToTarget(t, h); }, 80);
				}, true);

				document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });
				window.addEventListener('resize', function () { if (window.innerWidth >= 1200) setOpen(false); });
			})();
		</script>
	</body>
	</html>