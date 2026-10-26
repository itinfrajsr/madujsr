<?php
/* =========================================================
   RENDER BAGIAN HALAMAN INFO (FAQ & halaman biasa)
   Markup sama dengan versi hardcode sebelumnya.
========================================================= */
// teks polos -> HTML aman dengan <br>, siap dipakai sebagai nilai atribut data-*
function cms_text_html(string $t): string { return nl2br(e(trim($t)), false); }

function render_faq_page(): void
{
    $faqs = cms_load_faqs();
    $img  = setting('faq_image');
    ?>
			<div class="empty-page-content" data-page="faq">
				<div class="container-fluid bg-breadcrumb">
					<div class="container text-center py-5" style="max-width: 900px;">
						<h4 class="text-white display-4 mb-4 fw-bolder" data-id="FAQ" data-en="FAQ">FAQ</h4>
					</div>
				</div>
				<div class="container py-5 faq-layout" style="max-width: 1200px;">
					<div class="row g-4 g-lg-5 align-items-center">
						<div class="<?= $img !== '' ? 'col-lg-7' : 'col-lg-12' ?>">
							<div class="faq-acc">
								<?php foreach ($faqs as $f):
									$qid = $f['q_id']; $qen = $f['q_en'] !== '' ? $f['q_en'] : $qid;
									$aid = cms_text_html($f['a_id']);
									$aen = $f['a_en'] !== '' ? cms_text_html($f['a_en']) : $aid; ?>
								<div class="faq-acc-item">
									<button type="button" class="faq-acc-head"<?= bia($qid, $qen) ?>><?= e($qid) ?></button>
									<div class="faq-acc-body"><p data-html data-id="<?= e($aid) ?>" data-en="<?= e($aen) ?>"><?= $aid ?></p></div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php if ($img !== ''): ?>
						<div class="col-lg-5">
							<img src="<?= e($img) ?>" alt="FAQ Madu JSR" class="faq-side-img" loading="lazy" decoding="async">
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
    <?php
}

function render_page(string $slug): void
{
    $pg = cms_page($slug);
    if (!$pg) return;

    $repl = ['{wa_url}' => cms_wa_url(), '{email}' => setting('email')];
    $bid  = cms_clean_html(strtr($pg['body_id'], $repl));
    $ben  = $pg['body_en'] !== '' ? cms_clean_html(strtr($pg['body_en'], $repl)) : $bid;
    $tid  = $pg['title_id'];
    $ten  = $pg['title_en'] !== '' ? $pg['title_en'] : $tid;
    if ($slug === 'cara-pemesanan' && ($stepsId = cms_steps_html('id')) !== '') {   // langkah-langkah dari menu "Langkah Pemesanan"
        $bid = $stepsId; $ben = cms_steps_html('en');
    }
    $ban  = trim($pg['banner']);
    $side = trim($pg['side_image'] ?? '');

    $bgClass = 'container-fluid bg-breadcrumb';
    $bgStyle = '';
    $bgImg   = '';
    if ($slug === 'cara-pemesanan' && $ban !== '') {
        $bgClass .= ' bg-cara-pemesanan';
        $bgImg    = '<img src="' . e($ban) . '" alt="' . e($tid) . '" class="banner-img">';
    } else {
        if ($slug === 'tentang-kami') $bgClass .= ' bg-tentang-kami';
        if ($ban !== '') $bgStyle = ' style="background-image:url(\'' . e($ban) . '\')"';
    }
    // posisi judul banner (X/Y dalam %) & teks isi, diatur dari CMS; kosong = bawaan (tengah)
    $num = function ($x) { $x = trim((string)$x); return ($x !== '' && is_numeric($x)) ? max(0, min(100, (float)$x)) : null; };
    $px = $num($pg['title_x'] ?? ''); $py = $num($pg['title_y'] ?? '');
    $pxm = $num($pg['title_x_m'] ?? ''); $pym = $num($pg['title_y_m'] ?? '');   // khusus HP
    $sz = $pg['title_size'] ?? ''; $ba = $pg['body_align'] ?? '';
    $cStyle = 'max-width: 900px;';
    $hStyle = '';
    if ($px !== null || $py !== null || $pxm !== null || $pym !== null) {
        $px = $px ?? 50; $py = $py ?? 50;
        $cStyle = 'position:absolute;inset:0;max-width:100% !important;width:100%;padding:0 !important;';
        $hStyle = '--tx:' . $px . '%;--ty:' . $py . '%;'
                . ($pxm !== null ? '--txm:' . $pxm . '%;' : '') . ($pym !== null ? '--tym:' . $pym . '%;' : '')
                . 'position:absolute;left:var(--tx);top:var(--ty);transform:translate(-50%,-50%);margin:0 !important;width:max-content;max-width:90%;';
        $bgStyle = $bgStyle === '' ? ' style="position:relative"' : substr($bgStyle, 0, -1) . ';position:relative"';
    }
    $sizes = ['sm' => '1.6rem,4vw,2.4rem', 'lg' => '2.4rem,6vw,4.5rem', 'xl' => '3rem,8vw,6rem'];
    if (isset($sizes[$sz])) $hStyle .= 'font-size:clamp(' . $sizes[$sz] . ') !important;';
    $hStyle = $hStyle !== '' ? ' style="' . $hStyle . '"' : '';
    $hx  = function ($k, $d) { $v = trim(setting($k)); return preg_match('/^#[0-9a-fA-F]{3,8}$/', $v) ? $v : $d; };
    $pbg = $slug === 'hubungi-kami' ? $hx('contact_bg_color', '') : '';   // latar seluruh halaman di bawah banner
    $aStyle = in_array($ba, ['center', 'right', 'justify'], true) ? ' style="text-align:' . $ba . '"' : '';
    ?>
			<div class="empty-page-content" data-page="<?= e($slug) ?>">
				<div class="<?= $bgClass ?>"<?= $bgStyle ?>>
					<?= $bgImg ?>
					<div class="container text-center py-5" style="<?= e($cStyle) ?>">
						<h4 class="text-white display-4 mb-4 fw-bolder"<?= $hStyle ?><?= bia($tid, $ten) ?>><?= e($tid) ?></h4>
					</div>
				</div>
				<div class="page-body"<?= $pbg !== '' ? ' style="background:' . e($pbg) . '"' : '' ?>>
				<?php if ($side !== ''): ?>
				<div class="container py-5" style="max-width: 1140px;">
					<div class="row g-4 g-lg-5 align-items-center">
						<div class="col-lg-6">
							<div data-html<?= $aStyle ?> data-id="<?= e($bid) ?>" data-en="<?= e($ben) ?>"><?= $bid ?></div>
						</div>
						<div class="col-lg-6">
							<img src="<?= e($side) ?>" alt="<?= e($tid) ?>" class="img-fluid w-100" style="border-radius: 20px; box-shadow: 0 14px 40px rgba(80, 60, 25, .18);" loading="lazy" decoding="async">
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="container py-5" style="max-width: 900px;">
					<div data-html<?= $aStyle ?> data-id="<?= e($bid) ?>" data-en="<?= e($ben) ?>"><?= $bid ?></div>
				</div>
				<?php endif; ?>
				<?php if ($slug === 'hubungi-kami' && setting('contact_box_show', '1') !== '0'):
				    $cl = trim(setting('contact_btn_link')); if ($cl === '') $cl = cms_wa_url();
				    $cc = preg_match('/^#[0-9a-fA-F]{3,8}$/', setting('contact_box_color')) ? setting('contact_box_color') : '#E9B949';
				    $ct = $hx('contact_title_color', '#3D2A05'); $cx = $hx('contact_text_color', '#5A3F0C');
				    $cb = $hx('contact_btn_bg', '#4A3410'); $cbt = $hx('contact_btn_color', '#FFFFFF');
				    $cr = trim(setting('contact_box_radius')); $cr = is_numeric($cr) ? max(0, min(80, (int)$cr)) : 20; ?>
				<div class="container pb-5" style="max-width: 1140px;">
					<div class="contact-box" style="background:<?= e($cc) ?>;border-radius:<?= $cr ?>px;--cb-title:<?= e($ct) ?>;--cb-text:<?= e($cx) ?>;--cb-btn:<?= e($cb) ?>;--cb-btntext:<?= e($cbt) ?>">
						<h3<?= sa('contact_title') ?>><?= st('contact_title') ?></h3>
						<p<?= sa('contact_text') ?>><?= st('contact_text') ?></p>
						<?php $icons = ['whatsapp' => 'fa-whatsapp', 'phone' => 'fa-phone', 'envelope' => 'fa-envelope', 'arrow' => 'fa-arrow-right'];
						      $ic = $icons[setting('contact_btn_icon')] ?? '';
						      $br = trim(setting('contact_btn_radius')); $br = is_numeric($br) ? max(0, min(60, (int)$br)) : 50; ?>
						<a href="<?= e($cl) ?>" class="contact-box-btn" style="border-radius:<?= $br ?>px" target="_blank" rel="noopener noreferrer"><?php if ($ic !== ''): ?><i class="fa <?= $ic ?> cb-ic" aria-hidden="true"></i><?php endif; ?><span class="cb-txt"><?php if (trim(setting('contact_btn2_id')) !== ''): ?><span class="cb-l1"<?= sa('contact_btn') ?>><?= st('contact_btn') ?></span><span class="cb-l2"<?= sa('contact_btn2') ?>><?= st('contact_btn2') ?></span><?php else: ?><span<?= sa('contact_btn') ?>><?= st('contact_btn') ?></span><?php endif; ?></span></a>
					</div>
				</div>
				<?php endif; ?>
				</div>
			</div>
    <?php
}
