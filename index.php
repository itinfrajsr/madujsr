<?php
	/* =========================================================
	   KONFIGURASI
	========================================================= */
	$wa_number = '62XXXXXXXXXXX';
	$wa_text   = 'Halo Madu JSR, saya ingin konsultasi';

	function e($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }

	$wa_url = 'https://api.whatsapp.com/send?phone=' . rawurlencode($wa_number) . '&text=' . rawurlencode($wa_text);

	// Daftar produk
	$products = [
		[
			'img'   => 'assets/img/madu/madu jsr multiflora@4x-8.png',
			'class' => 'product-image',
			'alt'   => 'Madu JSR Multiflora',
			'badge' => ['id' => 'Madu Murni', 'en' => 'Pure Honey'],
			'name'  => ['id' => 'Madu Multiflora', 'en' => 'Multiflora Honey'],
			'subtitle'   => ['id' => 'Aroma Bunga Beragam', 'en' => 'Diverse Floral Aroma'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.93',
			'reviews'    => '547',
			'desc'  => [
				'id' => 'Madu murni yang berasal berbagai macam nektar bunga, dengan aroma bunga yang beraneka ragam.',
				'en' => 'Pure honey from various flower nectars, with a diverse floral aroma.',
			],
			'features' => [
				['icon' => 'fa-shield',      'label_id' => 'Daya Tahan Harian',    'label_en' => 'Superior Daily Defense'],
				['icon' => 'fa-heart',       'label_id' => 'Kesehatan Kulit',      'label_en' => 'Wound & Skincare'],
				['icon' => 'fa-medkit',      'label_id' => 'Anti Bakteri Alami',   'label_en' => 'Antibacterial Relief'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-jsr-murni-multiflora',
		],
		[
			'img'   => 'assets/img/madu/madu jsr sangket@4x-8.png',
			'class' => 'product-image',
			'alt'   => 'Madu JSR Sangket',
			'badge' => ['id' => 'Uniflora', 'en' => 'Uniflora'],
			'name'  => ['id' => 'Madu Sangket', 'en' => 'Sangket Honey'],
			'subtitle'   => ['id' => 'Rasa Lebih Manis', 'en' => 'Sweeter Taste'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.90',
			'reviews'    => '312',
			'desc'  => [
				'id' => 'Madu murni jenis uniflora yang berasal dari nektar bunga sangket. Rasanya yang lebih manis cocok dinikmati langsung maupun sebagai pemanis alami.',
				'en' => 'Pure uniflora honey from sangket flower nectar. Its sweeter taste is perfect for direct consumption or as a natural sweetener.',
			],
			'features' => [
				['icon' => 'fa-shield',  'label_id' => 'Daya Tahan Harian',    'label_en' => 'Superior Daily Defense'],
				['icon' => 'fa-leaf',    'label_id' => 'Pemanis Alami',        'label_en' => 'Natural Sweetener'],
				['icon' => 'fa-star',    'label_id' => 'Kualitas Premium',     'label_en' => 'Premium Quality'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-sangket-jsr',
		],
		[
			'img'   => 'assets/img/madu/madu jsr hitam4x-8 (1).png',
			'class' => 'product-image1',
			'alt'   => 'Madu Hitam',
			'badge' => ['id' => 'Kaya Antioksidan', 'en' => 'Rich Antioxidant'],
			'name'  => ['id' => 'Madu Hitam', 'en' => 'Black Honey'],
			'subtitle'   => ['id' => 'Stamina & Pemulihan', 'en' => 'Stamina & Recovery'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.95',
			'reviews'    => '428',
			'desc'  => [
				'id' => 'Madu murni dengan warna lebih gelap dan kandungan antioksidan yang tinggi cocok untuk membantu menjaga stamina, daya tahan tubuh, kesehatan lambung, dan mendukung pemulihan.',
				'en' => 'Pure honey with a darker colour and high antioxidant content, suitable for maintaining stamina, immunity, stomach health, and supporting recovery.',
			],
			'features' => [
				['icon' => 'fa-shield',  'label_id' => 'Stamina & Daya Tahan', 'label_en' => 'Stamina & Immunity'],
				['icon' => 'fa-heart',   'label_id' => 'Kesehatan Lambung',    'label_en' => 'Stomach Health'],
				['icon' => 'fa-medkit',  'label_id' => 'Mendukung Pemulihan',  'label_en' => 'Recovery Support'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-hitam-manis-jsr',
		],
		[
			'img'   => 'assets/img/madu/Madu Hexa RePos.png',
			'class' => 'product-image2',
			'alt'   => 'Madu Hexabrain',
			'badge' => ['id' => 'Untuk Keluarga', 'en' => 'For Family'],
			'name'  => ['id' => 'Madu Hexabrain', 'en' => 'Hexabrain Honey'],
			'subtitle'   => ['id' => 'Rutinitas Pagi Malam', 'en' => 'Morning & Night Routine'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.88',
			'reviews'    => '265',
			'desc'  => [
				'id' => 'Madu pilihan untuk rutinitas pagi dan malam keluarga, menemani pola hidup sehat.',
				'en' => 'A honey companion for the family\'s morning and evening routine, supporting a healthy lifestyle.',
			],
			'features' => [
				['icon' => 'fa-shield',  'label_id' => 'Daya Tahan Harian',   'label_en' => 'Daily Defense'],
				['icon' => 'fa-heart',   'label_id' => 'Pola Hidup Sehat',    'label_en' => 'Healthy Lifestyle'],
				['icon' => 'fa-star',    'label_id' => 'Kemasan 760 gr',      'label_en' => '760 gr Pack'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-hexabrain',
		],
		[
			'img'   => 'assets/img/madu/Madu Gold RePos.png',
			'class' => 'product-image3',
			'alt'   => 'Madu Gold JSR',
			'badge' => ['id' => 'Premium', 'en' => 'Premium'],
			'name'  => ['id' => 'Madu Gold JSR', 'en' => 'Gold JSR Honey'],
			'subtitle'   => ['id' => 'Pilihan Premium', 'en' => 'Premium Choice'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.91',
			'reviews'    => '198',
			'desc'  => [
				'id' => 'Madu pilihan premium untuk dikonsumsi sendiri maupun dijadikan hadiah istimewa.',
				'en' => 'A premium honey for personal consumption or as a special gift.',
			],
			'features' => [
				['icon' => 'fa-star',    'label_id' => 'Kualitas Premium',  'label_en' => 'Premium Quality'],
				['icon' => 'fa-shield',  'label_id' => 'Menjaga Kebugaran', 'label_en' => 'Maintain Fitness'],
				['icon' => 'fa-heart',   'label_id' => 'Pilihan Hadiah',    'label_en' => 'Gift Choice'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-gold-jsr',
		],
		[
			// MADU IMUN
			'img'        => 'assets/img/madu/Madu Imun RePos.png',
			'detail_img' => 'assets/img/madu/madu-imun-desktop-gabungan.jpg',
			'class' => 'product-image4',
			'alt'   => 'Madu Imun JSR',
			'badge' => ['id' => 'Untuk Imunitas', 'en' => 'For Immunity'],
			'name'  => ['id' => 'Madu Imun', 'en' => 'Immune Honey'],
			'subtitle'   => ['id' => 'Dukung Daya Tahan', 'en' => 'Immunity Support'],
			'price'      => '',
			'price_note' => ['id' => '(Sekali beli)', 'en' => '(One-time)'],
			'rating'     => '4.89',
			'reviews'    => '356',
			'desc'  => [
				'id' => 'Madu untuk mendukung daya tahan tubuh, terutama saat musim pancaroba.',
				'en' => 'Honey to support your immunity, especially during changing seasons.',
			],
			'features' => [
				['icon' => 'fa-shield',  'label_id' => 'Dukung Imunitas',   'label_en' => 'Immunity Support'],
				['icon' => 'fa-medkit',  'label_id' => 'Mudah Dikonsumsi',  'label_en' => 'Easy to Consume'],
				['icon' => 'fa-heart',   'label_id' => 'Rutinitas Harian',  'label_en' => 'Daily Routine'],
			],
			'link'  => 'https://jsrstore.id/products/detail/madu-imun',
		],
	];

	/* =========================================================
	   DETAIL PRODUK
	========================================================= */
	$trust = [
		['id' => 'Madu murni tanpa tambahan; raw honey tidak dipasteurisasi', 'en' => 'Pure honey with no additives; raw honey is not pasteurised'],
		['id' => 'Melalui pengujian laboratorium, bebas logam berat & kloramfenikol', 'en' => 'Laboratory tested, free from heavy metals & chloramphenicol'],
		['id' => 'Tersertifikasi halal', 'en' => 'Halal certified'],
		['id' => 'Terdaftar resmi dengan nomor P-IRT', 'en' => 'Officially registered with a P-IRT number'],
	];

	$details = [
		// 0 Multiflora
		[
			'tagline'   => ['id' => 'Aroma bunga beraneka ragam dalam satu madu.', 'en' => 'A diverse floral aroma in one honey.'],
			'relevance' => ['id' => 'Cocok untuk keluarga yang baru mulai rutin mengonsumsi madu dan menyukai karakter rasa madu yang seimbang.', 'en' => 'Suitable for families starting a regular honey routine who enjoy a well-balanced honey flavour.'],
			'function'  => [
				['id' => 'Pengganti gula alami untuk teh, kopi, dan jus', 'en' => 'Natural sugar substitute for tea, coffee, and juice'],
				['id' => 'Diminum langsung sebagai rutinitas harian', 'en' => 'Taken directly as a daily routine'],
				['id' => 'Pelengkap roti, oatmeal, dan masakan', 'en' => 'Pairs with bread, oatmeal, and cooking'],
			],
			'long_desc' => [
				'id' => "Apa itu madu multiflora?\n\nMadu multiflora adalah madu yang asal nektarnya diambil lebah dari bunga berbagai tanaman. Kaya akan manfaat meningkatkan daya tahan tubuh. Madu adalah superfood yg diciptakan Allah buat kita, ada banyak kandungan penting di sana untuk kita, seperti enzim, asam amino, vitamin dan mineral.\n\nRasulullah Shallallahu alaihi Wassalam bersabda:\n\n\"Sebaik-baik minuman ialah madu karena dia dapat mengkonsentrasikan hati dan menghilangkan dingin yang ada di dalam dada\". (HR. Dailami). Saking istimewanya, madu juga disebutkan di dalam Al-Qur'an:\n\n\"Kemudian, makanlah (wahai lebah) dari segala (macam) buah-buahan lalu tempuhlah jalan-jalan Tuhanmu yang telah dimudahkan (bagimu).\" Dari perutnya itu keluar minuman (madu) yang beraneka warnanya. Di dalamnya terdapat obat bagi manusia. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda (kebesaran Allah) bagi kaum yang berpikir.\" (QS. An-Nahl: 69)\n\nManfaat Madu Multiflora:\n1. Meningkatkan imunitas\n2. Meredakan peradangan\n3. Mengurangi kolesterol dan tekanan darah\n4. Membantu mengontrol gula darah\n5. Sebagai antibakteri yang kuat\n6. Dan banyak manfaat lainnya.\n\nCara Konsumsi:\nMadu Multiflora ini aman untuk dikonsumsi oleh orang dewasa dan juga anak-anak. Dosis untuk dewasa : 3x1sendok makan dan untuk anak 3x1 sendok teh.",
				'en' => "What is multiflora honey?\n\nMultiflora honey is honey whose nectar is collected by bees from the flowers of various plants. It is rich in benefits for boosting the immune system. Honey is a superfood created by Allah for us, containing many important nutrients such as enzymes, amino acids, vitamins, and minerals.\n\nRasulullah Shallallahu alaihi wasallam said:\n\n\"The best of drinks is honey, for it concentrates the heart and removes the cold from the chest.\" (HR. Dailami). Such is its distinction that honey is also mentioned in the Qur'an:\n\n\"Then eat of all fruits and follow the ways of your Lord made easy for you.\" There comes forth from their bellies a drink of varying colours, wherein is healing for mankind. Indeed in that is a sign for a people who give thought. (QS. An-Nahl: 69)\n\nBenefits of Multiflora Honey:\n1. Boosts immunity\n2. Relieves inflammation\n3. Reduces cholesterol and blood pressure\n4. Helps control blood sugar\n5. Acts as a strong antibacterial\n6. And many other benefits.\n\nHow to Consume:\nMultiflora honey is safe for both adults and children. Dosage for adults: 3x1 tablespoon, and for children: 3x1 teaspoon.",
			],
		],
		// 1 Sangket
		[
			'tagline'   => ['id' => 'Madu uniflora dengan rasa lebih manis.', 'en' => 'Uniflora honey with a sweeter taste.'],
			'relevance' => ['id' => 'Cocok untuk Anda yang menyukai rasa madu lebih manis dan ingin satu sumber nektar dengan karakter khas.', 'en' => 'Ideal if you prefer a sweeter honey and want a single nectar source with a distinct character.'],
			'function'  => [
				['id' => 'Pemanis alami untuk minuman dan makanan', 'en' => 'Natural sweetener for drinks and food'],
				['id' => 'Nikmat diminum langsung', 'en' => 'Enjoyable straight from the spoon'],
				['id' => 'Pilihan untuk mengenal madu uniflora', 'en' => 'A great way to discover uniflora honey'],
			],
			'long_desc' => [
				'id' => "Madu Murni Sangket adalah madu murni yang berasal dari satu nektar muda bunga sangket. Madu sangket adalah madu jenis uniflora, artinya nektar bahan baku lebahnya hanya berasal dari satu tanaman sangket.\n\nDiriwayatkan dari Abi Said Radhiyallahu 'Anhu:\n\n\"Sesungguhnya, seorang laki-laki datang kepada Rasulullah Shallahu 'Alaihi Wassallam., ia berkata: 'Sesungguhnya, saudaraku sakit perutnya.' Beliau bersabda: 'Berilah ia minum madu.' Ia pun pergi kemudian kembali dan berkata: 'Aku telah memberinya minum, tetapi belum berhasil.' Ia pun kembali untuk kedua kalinya lalu beliau bersabda pada yang ketiga atau keempat: 'Allah Maha benar dan perut saudaramu berdusta,' kemudian ia memberi saudaranya itu minum lalu ia sembuh.\" (HR. Bukhari dan Muslim)\n\nManfaat Madu Murni Sangket:\n1. Meningkatkan daya tahan tubuh\n2. Menjadi obat radang tenggorokan\n3. Menjadi obat demam\n4. Menjadi tempat bagi tubuh untuk mendapatkan kandungan penting seperti asam amino, enzim, dan mineral\n5. Dan banyak manfaat lainnya.\n\nCara Konsumsi:\nMadu Murni Sangket aman dikonsumsi oleh dewasa dan anak-anak. Dosis untuk dewasa : 3x1sendok makan, untuk anak 3x1 sendok teh.",
				'en' => "Sangket Pure Honey is pure honey derived from a single nectar source — the young sangket flower. Sangket honey is a uniflora type, meaning the bees' raw nectar comes from only one plant, the sangket.\n\nNarrated from Abi Said Radhiyallahu 'Anhu:\n\n\"Verily, a man came to the Messenger of Allah (peace be upon him) and said: 'My brother has a stomach ailment.' He said: 'Give him honey to drink.' He went and returned and said: 'I have given him drink, but it did not work.' He returned for the second time, then the Prophet said on the third or fourth time: 'Allah is true, and your brother's stomach has lied,' then he gave his brother honey to drink, and he was cured.\" (HR. Bukhari and Muslim)\n\nBenefits of Sangket Pure Honey:\n1. Boosts the immune system\n2. Relieves sore throat\n3. Helps relieve fever\n4. Provides important nutrients such as amino acids, enzymes, and minerals\n5. And many other benefits.\n\nHow to Consume:\nSangket Pure Honey is safe for adults and children. Dosage for adults: 3x1 tablespoon, for children: 3x1 teaspoon.",
			],
		],
		// 2 Hitam
		[
			'tagline'   => ['id' => 'Warna gelap, kaya antioksidan.', 'en' => 'Dark in colour, rich in antioxidants.'],
			'relevance' => ['id' => 'Cocok untuk Anda dengan aktivitas padat yang ingin menjaga stamina, daya tahan tubuh, dan mendukung masa pemulihan.', 'en' => 'Suitable for busy people who want to maintain stamina, immunity, and support recovery.'],
			'function'  => [
				['id' => 'Membantu menjaga stamina', 'en' => 'Helps maintain stamina'],
				['id' => 'Membantu menjaga daya tahan tubuh', 'en' => 'Helps maintain immunity'],
				['id' => 'Mendukung kesehatan lambung dan pemulihan', 'en' => 'Supports stomach health and recovery'],
			],
			'long_desc' => [
				'id' => "Madu hitam adalah:\n\nMadu murni pilihan dengan kadar air 18-19%, yang berasal dari berbagai sumber nectar tanaman, seperti dr pohon akasia, jambe dan tanaman hutan/perkebunan lainnya.\n\nKhasiat/manfaat madu hitam insyallah:\n- Meningkatkatkan stamina dan daya tahan Tubuh terhadap serangan berbagai penyakit, terutama usia pada usia lanjut.\n- Mempercepat pemulihan organ pasca kecelakaan, pasca jatuh dan pasca operasi.\n- Mengandung antioksidan tergolong yang terbaik di banding kebanyakan madu murni dr nectar lain, sehingga JK di minum teratur (3x2 Sd m) insyaallah efektif buat membantu penyembuhan sakit maag akut, typus, gastritis dan aneka gangguan lambung lainnya.\n- memelihara kebugaran, kesegaran dan elastisitas pada kulit.",
				'en' => "Black honey is:\n\nA selected pure honey with a moisture content of 18-19%, sourced from various plant nectars, such as acacia trees, jambe, and other forest/plantation plants.\n\nBenefits of black honey, God willing:\n- Increases stamina and the body's immunity against various diseases, especially in the elderly.\n- Accelerates organ recovery after accidents, falls, and surgery.\n- Contains antioxidants considered among the best compared to most other pure nectars, so when consumed regularly (3x2 tablespoons) it is effective, God willing, in helping to cure acute gastritis, typhus, gastritis, and various other stomach disorders.\n- Maintains fitness, freshness, and skin elasticity.",
			],
		],
		// 3 Hexabrain
		[
			'tagline'   => ['id' => 'Pendamping rutinitas madu untuk keluarga.', 'en' => 'A honey companion for the family routine.'],
			'relevance' => ['id' => 'Cocok untuk orang tua yang ingin menjadikan madu bagian dari rutinitas pagi dan malam keluarga.', 'en' => 'Suitable for parents who want honey as part of the family\'s morning and evening routine.'],
			'function'  => [
				['id' => 'Dikonsumsi rutin pagi dan malam', 'en' => 'Taken regularly morning and night'],
				['id' => 'Menemani pola hidup sehat keluarga', 'en' => 'Accompanies a healthy family lifestyle'],
				['id' => 'Tersedia kemasan 760 gr', 'en' => 'Available in 760 gr pack'],
			],
			'long_desc' => [
				'id' => "Madu hexabrain adalah madu yang dilengkapi dengan kandungan nutrisi khusus untuk meningkatkan kecerdasan otak. Sangat baik dikonsumsi oleh anak kecil yang otaknya sedang berkembang.\n\n\"Kemudian, makanlah (wahai lebah) dari segala (macam) buah-buahan lalu tempuhlah jalan-jalan Tuhanmu yang telah dimudahkan (bagimu).\" Dari perutnya itu keluar minuman (madu) yang beraneka warnanya. Di dalamnya terdapat obat bagi manusia. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda (kebesaran Allah) bagi kaum yang berpikir.\" (Q.S Annhl Ayat 69)\n\nManfaat madu hexabrain adalah membantu meningkatkan IQ, dan kecerdasaan otak.\n\nKomposisi : royal jelly, beepollen, propolis strain probiotik\n\nCara Konsumsi: Dosis untuk dewasa: 3x1 sendok makan dan untuk anak-anak 3x1 sendok teh.",
				'en' => "Hexabrain honey is honey enriched with special nutrients to enhance brain intelligence. It is highly recommended for young children whose brains are still developing.\n\n\"Then eat of all fruits and follow the ways of your Lord made easy for you.\" There comes forth from their bellies a drink of varying colours, wherein is healing for mankind. Indeed in that is a sign for a people who give thought. (Q.S An-Nahl: 69)\n\nThe benefit of hexabrain honey is to help improve IQ and brain intelligence.\n\nComposition: royal jelly, bee pollen, propolis, probiotic strain\n\nHow to Consume: Dosage for adults: 3x1 tablespoon and for children 3x1 teaspoon.",
			],
		],
		// 4 Gold
		[
			'tagline'   => ['id' => 'Pilihan premium dari JSR.', 'en' => 'The premium choice from JSR.'],
			'relevance' => ['id' => 'Cocok untuk Anda yang mencari madu pilihan untuk dikonsumsi sendiri maupun dijadikan hadiah.', 'en' => 'Suitable if you want a premium honey for yourself or as a gift.'],
			'function'  => [
				['id' => 'Dikonsumsi rutin untuk menjaga kebugaran', 'en' => 'Taken regularly to maintain fitness'],
				['id' => 'Tersedia dalam dua ukuran kemasan', 'en' => 'Available in two pack sizes'],
				['id' => 'Pilihan hadiah untuk keluarga dan kerabat', 'en' => 'A gift choice for family and friends'],
			],
			'long_desc' => [
				'id' => "Madu Gold adalah varian madu JSR dengan kualitas terbaik. Karena mengandung lebih banyak royal jelly, bee polen dan propolis. Sangat baik dikonsumsi oleh orang tua dan mereka yang ingin menjalankan program hamil.\n\n\"Kemudian, makanlah (wahai lebah) dari segala (macam) buah-buahan lalu tempuhlah jalan-jalan Tuhanmu yang telah dimudahkan (bagimu).\" Dari perutnya itu keluar minuman (madu) yang beraneka warnanya. Di dalamnya terdapat obat bagi manusia. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda (kebesaran Allah) bagi kaum yang berpikir.\" (Q.S Annhl Ayat 69)\n\nKomposisi: Madu, Royal Jelly, Propolis\n\nManfaat:\n1. Sebagai multivitamin dan antioksidan\n2. Sebagai anti infeksi dan anti alergi\n3. Meningkatkan daya tahan tubuh terhadap penyakit\n4. Memperbaiki jaringan tubuh\n5. Mengatasi permasahanan yang bersifat hormonal\n6. Mencegah penuaan dini\n7. Memperbaiki kesuburan reproduksi wanita dan pria\n8. Dan banyak manfaat lainnya.\n\nCara Konsumsi:\n- 1 sendok makan 2 x sehari. Pada pagi hari sebelum makan dan malam hari sebelum tidur.\n- Bisa dicampur dengan segelas air hangat atau air dingin\n- Diaduk dulu sebelum dikonsumsi",
				'en' => "Gold Honey is the premium variant of JSR honey. It contains more royal jelly, bee pollen, and propolis. It is highly recommended for the elderly and those planning a pregnancy program.\n\n\"Then eat of all fruits and follow the ways of your Lord made easy for you.\" There comes forth from their bellies a drink of varying colours, wherein is healing for mankind. Indeed in that is a sign for a people who give thought. (Q.S An-Nahl: 69)\n\nComposition: Honey, Royal Jelly, Propolis\n\nBenefits:\n1. As a multivitamin and antioxidant\n2. As an anti-infection and anti-allergy agent\n3. Increases the body's immunity against diseases\n4. Repairs body tissues\n5. Addresses hormonal-related issues\n6. Prevents premature ageing\n7. Improves reproductive fertility in women and men\n8. And many other benefits.\n\nHow to Consume:\n- 1 tablespoon twice a day. In the morning before eating and at night before sleeping.\n- Can be mixed with a glass of warm or cold water\n- Stir well before consuming",
			],
		],
		// 5 Imun
		[
			'tagline'   => ['id' => 'Madu untuk mendukung daya tahan tubuh.', 'en' => 'Honey to support your immunity.'],
			'relevance' => ['id' => 'Cocok untuk keluarga yang ingin lebih peduli pada daya tahan tubuh, terutama saat musim pancaroba.', 'en' => 'Suitable for families who care about their immunity, especially during changing seasons.'],
			'function'  => [
				['id' => 'Membantu menjaga daya tahan tubuh', 'en' => 'Helps maintain immunity'],
				['id' => 'Mudah dikonsumsi langsung atau dicampur minuman', 'en' => 'Easy to take directly or mix into drinks'],
				['id' => 'Cocok dijadikan rutinitas harian', 'en' => 'Easy to make a daily habit'],
			],
			'is_image_only' => true,
		],
	];
	?>
	<!DOCTYPE html>
	<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MaduJSR</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
		<link rel="icon" type="image/png" href="assets/img/logo1.png" />
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

			/* TESTIMONIAL: tinggi semua card sama (tidak tergantung panjang teks) */
			.testimonial .testimonial-item {
				height: 300px !important;          /* tinggi tetap, sama untuk semua card */
				overflow: hidden;
			}
			.testimonial .testimonial-item .testimonial-text {
				flex: 1 1 auto;                    /* area teks mengisi ruang yang tersisa */
				min-height: 0;
				margin-bottom: 8px;
				overflow-y: auto;                  /* teks panjang (Baca Selengkapnya) scroll di dalam card */
				scrollbar-width: thin;
				scrollbar-color: #d9a441 transparent;
			}
			.testimonial .testimonial-item .testimonial-text::-webkit-scrollbar { width: 4px; }
			.testimonial .testimonial-item .testimonial-text::-webkit-scrollbar-thumb { background: #d9a441; border-radius: 4px; }
			.testimonial .testimonial-item .read-more-btn {
				flex: 0 0 auto;
				align-self: center;                /* tombol di tengah */
				margin-bottom: 6px;
			}
			/* Foto, nama, jabatan, bintang selalu menempel di bagian bawah card */
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

			/* =========================================================
			   HILANGKAN PANAH DROPDOWN DI MENU BAHASA
			========================================================= */
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
			.site-mobile-menu { display: none !important; }       /* menu lama dimatikan */
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
				.wa-consult:hover { width: 66px; }
				.wa-consult .wa-text { display: none; }
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

			/* =========================================================
			   MODE IMAGE-ONLY (Madu Imun) & HALAMAN KOSONG
			   Gambar pas satu layar (setelah navbar), tanpa scroll vertikal
			========================================================= */
			.product-page.image-only .pp-info,
			.product-page.image-only .pp-extra,
			.product-page.image-only .pp-nav { display: none !important; }

			.product-page.image-only {
				overflow: hidden;              /* tidak ada scroll sama sekali */
				display: flex;
				flex-direction: column;
				height: 100vh;
				height: 100dvh;                /* mobile: tinggi layar yang sebenarnya */
			}
			/* Navbar putih dihilangkan: tombol Kembali melayang di atas gambar,
			   sehingga gambar mendapat tinggi layar penuh */
			.product-page.image-only .product-page-bar {
				position: absolute;
				top: 0; left: 0; right: 0;
				padding: 16px 5%;
				background: transparent;
				backdrop-filter: none;
				border-bottom: 0;
				pointer-events: none;          /* area kosong tidak menghalangi klik gambar */
			}
			.product-page.image-only .product-page-bar .pp-back { pointer-events: auto; }
			.product-page.image-only .product-page-bar .pp-logo { display: none; }

			.product-page.image-only .pp-hero {
				flex: 1 1 auto;
				min-height: 0;                 /* penting: agar flex boleh menyusut */
				display: block;
				padding: 0;
				margin: 0;
				max-width: 100%;
				overflow: hidden;
				background: linear-gradient(135deg, #ffffff 0%, #faf4e5 100%);
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
			.product-page.image-only .pp-img-link { cursor: zoom-in; }
			.product-page.image-only .pp-img-link:hover { transform: none; }
			.product-page.image-only .pp-img-link img {
				display: block;
				width: 100%;
				height: 100%;
				max-height: none;
				object-fit: contain;           /* seluruh gambar terlihat, tidak terpotong */
				object-position: center;
				filter: none;
				animation: none;
				border-radius: 0;
			}

			/* =========================================================
			   KHUSUS HALAMAN KOSONG (#emptyPage): tampilkan logo
			========================================================= */
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
				cursor: zoom-in;
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

			/* =========================================================
			   TRUST BUTTONS — paksa horizontal (dua tombol sejajar)
			========================================================= */
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

			/* FOOTER COPYRIGHT */
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

			.fancybox-caption { font-size: 15px !important; font-weight: 600; }
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

		<!-- MENU MOBILE (mandiri, tidak bergantung menu.js) -->
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
						<h1 class="mb-0 site-logo"><a href="/"><img src="assets/img/logo1.png" alt="MaduJSR" class="logo"></a></h1>
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
			<video class="hero-video" autoplay muted loop playsinline preload="auto">
				<source src="https://res.cloudinary.com/ppuqbktw/video/upload/q_auto,f_auto/v1787329277/madu3.mp4" type="video/mp4">
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

		<section id="about-jsr">
			<div class="about-overlay"></div>
			<div class="container">
				<div class="about-content">
					<h2>
						<span data-id="Kebaikan Alami dalam " data-en="Natural Goodness in ">Kebaikan Alami dalam </span>
						<br /><em class="text-madu"><span data-id="Setiap Tetes" data-en="Every Drop">Setiap Tetes</span></em>
					</h2>
					<p data-id="Kami percaya, madu bukan sekedar pemanis." data-en="We believe honey is not just a sweetener."><strong>Kami percaya, madu bukan sekedar pemanis.</strong></p>
					<p data-id="Madu adalah bagian dari alam yang dapat menemani keluarga dalam berbagai momen—diminum langsung, dicampurkan ke minuman, atau menjadi bagian dari rutinitas menjaga kebugaran tubuh." data-en="Honey is part of nature that can accompany families in various moments—drunk directly, mixed into drinks, or as part of a routine to maintain body fitness.">
						Madu adalah bagian dari alam yang dapat menemani keluarga dalam berbagai momen—diminum langsung, dicampurkan ke minuman, atau menjadi bagian dari rutinitas menjaga kebugaran tubuh.
					</p>
					<p data-id="Karena itu, Madu JSR hadir dengan pilihan madu murni dari sumber nektar yang berbeda, sehingga setiap jenis memiliki karakter dan keunikan tersendiri." data-en="Therefore, Madu JSR offers pure honey from different nectar sources, so each type has its own character and uniqueness.">
						Karena itu, Madu JSR hadir dengan pilihan madu murni dari sumber nektar yang berbeda, sehingga setiap jenis memiliki karakter dan keunikan tersendiri.
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
								<img src="<?= e($p['img']) ?>" class="<?= e($p['class']) ?>" alt="<?= e($p['alt']) ?>">
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
							<div class="jsr-heading-label" data-id="KEUNGGULAN MADU JSR" data-en="JSR HONEY ADVANTAGES"><span></span>KEUNGGULAN MADU JSR</div>
							<h2 data-id="Kenapa Memilih Madu JSR?" data-en="Why Choose Madu JSR?">Kenapa Memilih <em>Madu JSR?</em></h2>
							<p data-id="Kualitas madu tidak hanya dilihat dari rasa dan warna. Kami menjaga kualitasnya dengan memperhatikan karakter alami madu dan memastikan produk melalui pengujian yang diperlukan." data-en="Honey quality is not only judged by taste and colour. We maintain quality by paying attention to the natural character of honey and ensuring the product undergoes necessary testing.">
								Kualitas madu tidak hanya dilihat dari rasa dan warna. Kami menjaga kualitasnya dengan memperhatikan karakter alami madu dan memastikan produk melalui pengujian yang diperlukan.
							</p>
						</div>
					</div>
				</div>
				<div class="row g-4 jsr-quality-grid">
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">01</span><div class="jsr-card-icon"><i class="fa fa-leaf"></i></div><h3 data-id="Madu Murni" data-en="Pure Honey">Madu Murni</h3><p data-id="Madu JSR merupakan madu murni tanpa tambahan. Produk raw honey juga tidak melalui proses pasteurisasi, sehingga karakter alaminya tetap terjaga." data-en="Madu JSR is pure honey with no additives. Raw honey products are also not pasteurised, so their natural character is preserved.">Madu JSR merupakan madu murni tanpa tambahan. Produk raw honey juga tidak melalui proses pasteurisasi, sehingga karakter alaminya tetap terjaga.</p><span class="jsr-card-line"></span></div></div>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">02</span><div class="jsr-stat">6,78</div><span class="jsr-badge" data-id="STANDAR SNI: 3" data-en="SNI STANDARD: 3">STANDAR SNI: 3</span><h3 data-id="Kaya Enzim Alami" data-en="Rich in Natural Enzymes">Kaya Enzim Alami</h3><p data-id="Madu JSR memiliki kadar enzim diastase 6,78, lebih tinggi dari standar SNI sebesar 3. Kadar enzim yang terjaga menjadi salah satu indikator madu tidak mengalami pemanasan berlebih." data-en="Madu JSR has a diastase enzyme level of 6.78, higher than the SNI standard of 3. Maintained enzyme levels indicate that the honey has not been overheated.">Madu JSR memiliki kadar enzim diastase 6,78, lebih tinggi dari standar SNI sebesar 3. Kadar enzim yang terjaga menjadi salah satu indikator madu tidak mengalami pemanasan berlebih.</p><span class="jsr-card-line"></span></div></div>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">03</span><div class="jsr-stat">39,17</div><span class="jsr-badge" data-id="BATAS MAKSIMAL: 40" data-en="MAXIMUM LIMIT: 40">BATAS MAKSIMAL: 40</span><h3 data-id="HMF Tetap Terjaga" data-en="HMF Level Maintained">HMF Tetap Terjaga</h3><p data-id="Kadar HMF Madu JSR Multifloral berada di angka 39,17, masih di bawah batas maksimal 40. Hal ini menunjukkan madu tidak terpapar pemanasan berlebihan atau penyimpanan terlalu lama." data-en="The HMF level of Madu JSR Multifloral is 39.17, still below the maximum limit of 40. This shows the honey has not been exposed to excessive heating or long storage.">Kadar HMF Madu JSR Multifloral berada di angka 39,17, masih di bawah batas maksimal 40. Hal ini menunjukkan madu tidak terpapar pemanasan berlebih atau penyimpanan terlalu lama.</p><span class="jsr-card-line"></span></div></div>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">04</span><div class="jsr-card-icon"><i class="fa fa-flask"></i></div><h3 data-id="Teruji Bebas Kontaminasi" data-en="Tested Contaminant-Free">Teruji Bebas Kontaminasi</h3><p data-id="Madu JSR telah melalui pengujian dan terbukti bebas dari logam berat seperti timbal, merkuri, kadmium, dan arsen, serta bebas dari kloramfenikol." data-en="Madu JSR has been tested and proven free of heavy metals such as lead, mercury, cadmium, and arsenic, as well as free from chloramphenicol.">Madu JSR telah melalui pengujian dan terbukti bebas dari logam berat seperti timbal, merkuri, kadmium, dan arsen, serta bebas dari kloramfenikol.</p><span class="jsr-card-line"></span></div></div>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">05</span><div class="jsr-stat">19,08%</div><span class="jsr-badge" data-id="TEKSTUR LEBIH KENTAL" data-en="THICKER TEXTURE">TEKSTUR LEBIH KENTAL</span><h3 data-id="Kadar Air Rendah" data-en="Low Moisture Content">Kadar Air Rendah</h3><p data-id="Kadar air Madu JSR sebesar 19,08%, membuat teksturnya lebih kental dan membantu mengurangi risiko fermentasi. Madu juga tidak mudah berubah menjadi asam." data-en="The moisture content of Madu JSR is 19.08%, giving it a thicker texture and helping reduce the risk of fermentation. The honey is also less likely to turn acidic.">Kadar air Madu JSR sebesar 19,08%, membuat teksturnya lebih kental dan membantu mengurangi risiko fermentasi. Madu juga tidak mudah berubah menjadi asam.</p><span class="jsr-card-line"></span></div></div>
					<div class="col-lg-4 col-md-6"><div class="jsr-quality-card"><span class="jsr-card-number">06</span><div class="jsr-stat">3,02%</div><span class="jsr-badge" data-id="BATAS MAKSIMAL: 5%" data-en="MAXIMUM LIMIT: 5%">BATAS MAKSIMAL: 5%</span><h3 data-id="Sukrosa Rendah" data-en="Low Sucrose">Sukrosa Rendah</h3><p data-id="Kadar sukrosa Madu JSR sebesar 3,02%, masih di bawah batas maksimal 5%. Kadar sukrosa yang rendah juga mendukung karakter madu yang lebih murni." data-en="The sucrose content of Madu JSR is 3.02%, still below the maximum limit of 5%. Low sucrose content also supports a purer honey character.">Kadar sukrosa Madu JSR sebesar 3,02%, masih di bawah batas maksimal 5%. Kadar sukrosa yang rendah juga mendukung karakter madu yang lebih murni.</p><span class="jsr-card-line"></span></div></div>
				</div>
			</div>
		</section>

		<section id="testimonials" class="testimonial pb-5">
			<div class="container pb-5">
				<div class="text-center mx-auto pb-4" style="max-width: 800px;">
					<h2 class="display-4 text-capitalize mb-2" data-id="Apa Kata Mereka?" data-en="What They Say?">Apa Kata Mereka?</h2>
				</div>
				<div class="owl-carousel owl-theme testimonial-carousel">
					<div class="testimonial-item text-center p-4">
						<p class="testimonial-text">
							<span class="short-text" data-id="Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula." data-en="I like the honey, every time I make juice I always add honey as a sugar substitute.">Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula.</span>
							<span class="full-text" data-id="Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula." data-en="I like the honey, every time I make juice I always add honey as a sugar substitute.">Saya suka dengan madu nya, setiap buat juice selalu saya tambahkan madu pengganti gula.</span>
						</p>
						<div class="d-flex justify-content-center"><img src="assets/img/testimonial/chairunnisa.png" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client"></div>
						<h4 class="text-dark" data-id="Chairunnisa" data-en="Chairunnisa">Chairunnisa</h4>
						<p class="m-0" style="font-size: 12px; color: #666;" data-id="Karyawan" data-en="Employee">Karyawan</p>
						<div class="d-flex justify-content-center text-warning stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
					</div>
					<div class="testimonial-item text-center p-4">
						<p class="testimonial-text">
							<span class="short-text" data-id="Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif..." data-en="Since my child consumed hexabrain honey 760gr 3 years ago, Alhamdulillah my child is healthy & smarter & active...">Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif...</span>
							<span class="full-text" data-id="Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif, Sampai skrg anak saya msh minum madu hexabrain pagi & malam." data-en="Since my child consumed hexabrain honey 760gr 3 years ago, Alhamdulillah my child is healthy & smarter & active, Until now my child still drinks hexabrain honey morning & night.">Semenjak anak saya mengkonsumsi madu hexabrain 760gr 3 thn yg lalu, Alhamdulillah anak saya sehat trs & tmbh pinter & aktif, Sampai skrg anak saya msh minum madu hexabrain pagi & malam.</span>
						</p>
						<button class="read-more-btn" onclick="toggleTestimonial(this)" data-id="Baca Selengkapnya" data-en="Read More">Baca Selengkapnya</button>
						<div class="d-flex justify-content-center"><img src="assets/img/testimonial/purnamasari.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client"></div>
						<h4 class="text-dark" data-id="Purnama Sari" data-en="Purnama Sari">Purnama Sari</h4>
						<p class="m-0" style="font-size: 12px; color: #666;" data-id="Ibu Rumah Tangga" data-en="Homemaker">Ibu Rumah Tangga</p>
						<div class="d-flex justify-content-center text-warning stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
					</div>
					<div class="testimonial-item text-center p-4">
						<p class="testimonial-text">
							<span class="short-text" data-id="Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah..." data-en="I once bought too many packages for my child. Alhamdulillah rarely sick even though already in the school environment...">Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah...</span>
							<span class="full-text" data-id="Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah. Sakitpun cepet sembuhnya. Klo saya, baru bulan kmrn ada miom 2cm. Trs jd rutin minum berka. Nanti klo udh kliatan hasilnya dikabarin ya kak. Lebih percaya sama produk jsr sih jelas kualitasnya." data-en="I once bought too many packages for my child. Alhamdulillah rarely sick even though already in the school environment. Even if sick, recovery is quick. For me, just last month I had a 2cm myoma. Then I started regularly drinking berka. Later when the results are visible, I'll let you know. More confident in JSR products because the quality is clear.">Yg pernah kebeli kebanyakan paket buat anak sih kak. Alhamdulillah jarang sakit meski sdh ada di lingkungan sekolah. Sakitpun cepet sembuhnya. Klo saya, baru bulan kmrn ada miom 2cm. Trs jd rutin minum berka. Nanti klo udh kliatan hasilnya dikabarin ya kak. Lebih percaya sama produk jsr sih jelas kualitasnya.</span>
						</p>
						<button class="read-more-btn" onclick="toggleTestimonial(this)" data-id="Baca Selengkapnya" data-en="Read More">Baca Selengkapnya</button>
						<div class="d-flex justify-content-center"><img src="assets/img/testimonial/nina.jpg" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client"></div>
						<h4 class="text-dark" data-id="Nina" data-en="Nina">Nina</h4>
						<p class="m-0" style="font-size: 12px; color: #666;" data-id="Karyawan" data-en="Employee">Karyawan</p>
						<div class="d-flex justify-content-center text-warning stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
					</div>
					<div class="testimonial-item text-center p-4">
						<p class="testimonial-text">
							<span class="short-text" data-id="Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus." data-en="Already on our 5th order. Masya Allah, my child is healthy and doesn't get coughs and colds as often anymore. Hopefully, we'll always have enough blessings to keep ordering again and again.">Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus.</span>
							<span class="full-text" data-id="Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus." data-en="Already on our 5th order. Masya Allah, my child is healthy and doesn't get coughs and colds as often anymore. Hopefully, we'll always have enough blessings to keep ordering again and again.">Udah order ke 5 kalinya, Masya Allah anak saya sehat gak gampang bapil lagi mudahan ada rejeki terus biar bisa co terus.</span>
						</p>
						<div class="d-flex justify-content-center"><img src="assets/img/testimonial/pujiani.png" class="rounded-circle border border-4 border-warning" style="width: 60px; height: 60px; object-fit: cover;" alt="Client"></div>
						<h4 class="text-dark" data-id="Pujiani" data-en="Pujiani">Pujiani</h4>
						<p class="m-0" style="font-size: 12px; color: #666;" data-id="Ibu Rumah Tangga" data-en="Homemaker">Ibu Rumah Tangga</p>
						<div class="d-flex justify-content-center text-warning stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
					</div>
				</div>
			</div>
		</section>

		<footer class="footer-area">
			<div class="container">
				<div class="row footer-padding">
					<div class="col-lg col-md-7 col-sm-12">
						<div class="single_footer">
							<a href="#home"><img src="assets/img/logo1.png" alt="MaduJSR" class="footer-logo"></a>
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
									<li><a href="#madu-multiflora" data-id="Madu Multiflora" data-en="Multiflora Honey">Madu Multiflora</a></li>
									<li><a href="#madu-sangket"    data-id="Madu Sangket"    data-en="Sangket Honey">Madu Sangket</a></li>
									<li><a href="#madu-hitam"      data-id="Madu Hitam"      data-en="Black Honey">Madu Hitam</a></li>
									<li><a href="#madu-hexabrain"  data-id="Madu Hexabrain"  data-en="Hexabrain Honey">Madu Hexabrain</a></li>
									<li><a href="#madu-gold-jsr"   data-id="Madu Gold JSR"   data-en="Gold JSR Honey">Madu Gold JSR</a></li>
									<li><a href="#madu-imun"       data-id="Madu Imun"       data-en="Immune Honey">Madu Imun</a></li>
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
									<li><a href="#info-keunggulan"   data-id="Keunggulan"   data-en="Advantages">Keunggulan</a></li>
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
									<li><a href="#bantuan-pengiriman"     data-id="Pengiriman"     data-en="Shipping">Pengiriman</a></li>
									<li><a href="#bantuan-hubungi-kami"   data-id="Hubungi Kami"   data-en="Contact Us">Hubungi Kami</a></li>
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
						<button type="button" class="pp-nav prev" id="ppPrev" aria-label="Produk sebelumnya"><i class="fa fa-angle-left"></i></button>
						<a id="ppImgLink" class="pp-img-link" href="#" data-caption=""><img id="ppImg" src="" alt=""></a>
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

					<img class="img-trace"
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
									<div class="sf-img"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Product"></div>
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
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Analytical Labs"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Hill Laboratories"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Halal"></div>
									<div class="cert-item"><img src="https://i.ibb.co.com/8nHKmSSx/pngtree-honey-bee-on-a-white-flower-png-image-16573585.png" alt="Kosher"></div>
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
			 HALAMAN KOSONG (INFORMASI / BANTUAN)
		========================================================= -->
		<div class="product-page image-only" id="emptyPage" role="dialog" aria-modal="true" aria-hidden="true">
			<div class="product-page-bar">
				<button type="button" class="pp-back" id="emptyBack">
					<i class="fa fa-arrow-left"></i>
					<span data-id="Kembali" data-en="Back">Kembali</span>
				</button>
				<img src="assets/img/logo1.png" alt="MaduJSR" class="pp-logo" onerror="this.style.display='none'">
			</div>
		</div>

		<!-- WHATSAPP CONSULT WIDGET -->
		<a href="<?= e($wa_url) ?>" class="wa-consult" target="_blank" rel="noopener noreferrer" aria-label="Konsultasi via WhatsApp">
			<span class="wa-avatar">
				<span class="wa-circle">
					<i class="fa fa-user"></i>
					<img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20100%20100'%3E%20%3Cdefs%3E%3ClinearGradient%20id='bg'%20x1='0'%20y1='0'%20x2='0'%20y2='1'%3E%3Cstop%20offset='0'%20stop-color='%23fdf3d8'/%3E%3Cstop%20offset='1'%20stop-color='%23f0d9a0'/%3E%3C/linearGradient%3E%3C/defs%3E%20%3Crect%20width='100'%20height='100'%20fill='url(%23bg)'/%3E%20%3Cpath%20d='M14%20100c0-24%2015-32%2036-32s36%208%2036%2032z'%20fill='%238f1d27'/%3E%20%3Cpath%20d='M30%20100c2-14%209-22%2020-22s18%208%2020%2022z'%20fill='%23ffffff'/%3E%20%3Cellipse%20cx='50'%20cy='44'%20rx='27'%20ry='31'%20fill='%23b3262e'/%3E%20%3Cellipse%20cx='50'%20cy='47'%20rx='17'%20ry='20'%20fill='%23f3cfae'/%3E%20%3Ccircle%20cx='43.5'%20cy='46'%20r='1.9'%20fill='%233b2418'/%3E%3Ccircle%20cx='56.5'%20cy='46'%20r='1.9'%20fill='%233b2418'/%3E%20%3Cpath%20d='M44%2056q6%206%2012%200'%20stroke='%23b5524a'%20stroke-width='1.6'%20fill='none'%20stroke-linecap='round'/%3E%20%3Ccircle%20cx='46'%20cy='71'%20r='3'%20fill='%23d9a441'/%3E%20%3C/svg%3E" alt="Customer Service" class="wa-photo" onerror="this.style.display='none'">
				</span>
				<span class="wa-badge"><i class="fa fa-whatsapp"></i></span>
			</span>
			<span class="wa-text">
				<span class="wa-title" data-id="Ada Pertanyaan?" data-en="Have a Question?">Ada Pertanyaan?</span>
				<span class="wa-desc" data-id="Klik untuk konsultasi GRATIS sekarang!" data-en="Click for a FREE consultation now!">Klik untuk konsultasi GRATIS sekarang!</span>
			</span>
		</a>

		<!-- FLOATING CTA -->
		<div class="floating-cta" id="floatingCta">
			<button class="close-cta" onclick="closeFloatingCta()" aria-label="Tutup"><i class="fa fa-times"></i></button>
			<a href="https://jsrstore.id/products?category_name=madu" target="_blank" rel="noopener noreferrer" class="floating-btn">
				<i class="fa fa-shopping-cart"></i>
				<span class="btn-label">
					<small data-id="Belanja Sekarang" data-en="Shop Now">Belanja Sekarang</small>
					<span data-id="Madu Murni JSR" data-en="Pure Madu JSR">Madu Murni JSR</span>
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
		<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

		<script>
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
						smartSpeed: 1000, loop: true, margin: 15, nav: false, dots: false,
						navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
						responsive: { 0: { items: 1 }, 768: { items: 2 }, 1200: { items: 3 } }
					});
				}
				if (typeof jQuery !== "undefined" && typeof jQuery.fancybox !== "undefined") {
					jQuery(document).on('click', '#ppImgLink', function (e) {
						e.preventDefault();
						var href = jQuery(this).attr('href');
						var caption = jQuery(this).attr('data-caption') || '';
						if (!href || href === '#') return;
						jQuery.fancybox.open({
							src: href,
							opts: { caption: caption, loop: false, smallBtn: true, touch: false,
								clickContent: 'close', clickSlide: 'close',
								buttons: ["zoom", "fullScreen"],
								afterShow: function () { document.body.classList.add('fancybox-active'); },
								afterClose: function () { document.body.classList.remove('fancybox-active'); }
							}
						});
					});
				}
				document.querySelectorAll('a[href^="#"]').forEach(function (link) {
					if (link.closest('#mobileNav')) return;   // menu mobile ditangani script sendiri
					link.addEventListener("click", function (e) {
						var h = this.getAttribute("href");
						if (!h || h.length < 2) return;
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
						if (el.id === 'ppDesc' || el.classList.contains('pp-desc')) {
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
					/* Toggle bahasa: klik bendera di navbar → langsung ganti bahasa */
					var toggle = e.target.closest('.language-toggle');
					if (toggle) {
						e.preventDefault();
						var current = localStorage.getItem('language') || 'id';
						changeLanguage(current === 'id' ? 'en' : 'id');
						return;
					}
					/* Pilihan bahasa di menu mobile */
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
					if (document.body.classList.contains('fancybox-active')) return;
					if (document.querySelector('.fancybox-overlay')) return;
					const clientX = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
					const clientY = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
					startX = clientX; startY = clientY;
					isDragging = true; isSwiping = false; isSwipingHorizontal = false;
					carouselElement.style.cursor = 'grabbing';
					carouselElement.style.userSelect = 'none';
				};
				const moveDrag = (e) => {
					if (!isDragging) return;
					if (document.body.classList.contains('fancybox-active')) return;
					if (document.querySelector('.fancybox-overlay')) return;
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
			var PRODUCTS  = <?= json_encode($products, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
			var DETAILS   = <?= json_encode($details, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
			var TRUST     = <?= json_encode($trust,   JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

			/* =========================================================
			   PEMETAAN HASH ↔ INDEX PRODUK (cara kedua)
			========================================================= */
			var HASH_MAP = {
				'#madu-multiflora': 0,
				'#madu-sangket':    1,
				'#madu-hitam':      2,
				'#madu-hexabrain':  3,
				'#madu-gold-jsr':   4,
				'#madu-imun':       5
			};
			var HASH_MAP_REVERSE = {};
			Object.keys(HASH_MAP).forEach(function (k) {
				HASH_MAP_REVERSE[HASH_MAP[k]] = k;
			});

			/* =========================================================
			   PEMETAAN HASH HALAMAN KOSONG (INFORMASI / BANTUAN)
			========================================================= */
			var EMPTY_HASHES = {
				'#info-tentang-kami':      true,
				'#info-keunggulan':        true,
				'#info-faq':               true,
				'#bantuan-cara-pemesanan': true,
				'#bantuan-pengiriman':     true,
				'#bantuan-hubungi-kami':   true
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

			function fill(i) {
				var s = slides[i];
				var p = PRODUCTS[i];
				var d = DETAILS[i];

				var imgSrc = (p.detail_img && p.detail_img !== '')
					? p.detail_img
					: s.querySelector('.product-image-wrapper img').getAttribute('src');
				var imgAlt = s.querySelector('.product-image-wrapper img').alt;

				ppImg.src = imgSrc;
				ppImg.alt = imgAlt;
				ppImgLink.setAttribute('href', imgSrc);
				ppImgLink.dataset.captionId = p.name.id;
				ppImgLink.dataset.captionEn = p.name.en;
				ppImgLink.setAttribute('data-caption', (curLang() === 'en') ? p.name.en : p.name.id);

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

				if (d && d.is_image_only) {
					page.classList.add('image-only');
				} else {
					page.classList.remove('image-only');
				}

				currentIndex = i;
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

			function openEmpty() {
				closePage();
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

			/* =========================================================
			   ROUTE — pakai HASH_MAP (nama madu) + EMPTY_HASHES
			========================================================= */
			function route() {
				var hash = location.hash;

				if (EMPTY_HASHES[hash]) {
					openEmpty();
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
					if (!a) return;                         // pilihan bahasa dibiarkan lewat
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