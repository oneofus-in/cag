<?php
/**
 * Template Name: Contact Us
 *
 * Ported from the static prototype's pages/contact-us/index.html.
 *
 * Note: the static page loaded mini-contact / contact-shell / faq CSS but
 * rendered none of them (no #mini-contact div, #site-faq was commented out).
 * Faithful port: inner-hero only. Real contact submission is the footer's
 * pre-footer-contact form (footer.php) plus the method cards below.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Quick contact methods ══ -->
	<section class="section cu-methods-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<span class="eyebrow">איך נוח לכם</span>
				<h2>בחרו את <span class="gradient-text">דרך הפנייה</span></h2>
				<p>זמינים בטלפון, בוואטסאפ ובאימייל. מוזמנים גם לקפוץ אלינו לשולחן בכפר סבא — קפה עלינו.</p>
			</div>

			<div class="cu-methods">
				<a href="tel:050-550-0180" class="cu-method-card" data-anim="fade-up">
					<div class="cu-method-icon"><i class="fa-solid fa-phone"></i></div>
					<span class="cu-method-label">חייגו אלינו</span>
					<strong class="cu-method-value">050-550-0180</strong>
					<span class="cu-method-cta">להתקשרות <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="https://wa.me/972505500180" target="_blank" rel="noopener" class="cu-method-card cu-method-card--wa" data-anim="fade-up" data-delay="0.05">
					<div class="cu-method-icon"><i class="fa-brands fa-whatsapp"></i></div>
					<span class="cu-method-label">וואטסאפ</span>
					<strong class="cu-method-value">שליחת הודעה מיידית</strong>
					<span class="cu-method-cta">פתיחת צ׳אט <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="mailto:ag0505500180@gmail.com" class="cu-method-card" data-anim="fade-up" data-delay="0.1">
					<div class="cu-method-icon"><i class="fa-solid fa-envelope"></i></div>
					<span class="cu-method-label">אימייל</span>
					<strong class="cu-method-value">ag0505500180@gmail.com</strong>
					<span class="cu-method-cta">לשליחת מייל <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="https://maps.google.com/?q=יוחנן הסנדלר 8 כפר סבא" target="_blank" rel="noopener" class="cu-method-card" data-anim="fade-up" data-delay="0.15">
					<div class="cu-method-icon"><i class="fa-solid fa-location-dot"></i></div>
					<span class="cu-method-label">בואו לבקר</span>
					<strong class="cu-method-value">יוחנן הסנדלר 8, אזור תעשייה כפר סבא</strong>
					<span class="cu-method-cta">פתיחה במפות <i class="fa-solid fa-arrow-left"></i></span>
				</a>
			</div>
		</div>
	</section>

	<!-- ══ Hours + Map ══ -->
	<section class="section cu-visit-section">
		<div class="container">
			<div class="cu-visit-grid">
				<div class="cu-visit-info" data-anim="fade-right">
					<span class="eyebrow">בואו לבקר</span>
					<h2>שעות פתיחה <span class="gradient-text">ומיקום</span></h2>
					<p>מוזמנים להגיע למפגש פנים אל פנים, להתרשם מהדגמים ולקבל יעוץ אישי. מומלץ לתאם מראש כדי שנפנה לכם זמן ייעוץ.</p>

					<ul class="cu-hours">
						<li><span>ימים א׳ – ה׳</span><span>08:00 – 16:00</span></li>
						<li><span>יום שישי</span><span>08:00 – 12:00</span></li>
						<li><span>שבת</span><span class="cu-closed">סגור</span></li>
					</ul>

					<div class="cu-visit-actions">
						<a href="https://maps.google.com/?q=יוחנן הסנדלר 8 כפר סבא" target="_blank" rel="noopener" class="btn btn-primary">
							ניווט במפות <i class="fa-solid fa-arrow-left"></i>
						</a>
						<a href="tel:050-550-0180" class="btn btn-outline">
							לתיאום הגעה <i class="fa-solid fa-phone"></i>
						</a>
					</div>
				</div>

				<div class="cu-map-wrap" data-anim="fade-left">
					<iframe
						class="cu-map"
						src="https://www.google.com/maps?q=יוחנן+הסנדלר+8+כפר+סבא&output=embed"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						allowfullscreen
						title="מיקום א.ג קראוונים על המפה"></iframe>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
