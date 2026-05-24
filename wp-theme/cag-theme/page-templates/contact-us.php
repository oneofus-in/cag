<?php
/**
 * Template Name: Contact Us
 *
 * Ported from the static prototype's pages/contact-us/index.html.
 *
 * Contact values are read from the הגדרות אתר options page (cag_opt) — no
 * per-page ACF group needed. Hours come from the global 'hours' repeater.
 * Section headings and intro text stay hardcoded; only the dynamic values
 * (phone, WhatsApp, email, address, hours) are wired.
 */

/* ── Options values (mirror footer.php pattern) ── */
$cu_phone     = cag_opt( 'contact_phone', '050-550-0180' );
$cu_phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $cu_phone );
$cu_wa        = preg_replace( '/[^0-9]/', '', cag_opt( 'whatsapp_number', '972505500180' ) );
$cu_email     = cag_opt( 'contact_email', 'ag0505500180@gmail.com' );
$cu_addr      = cag_opt( 'contact_address', 'יוחנן הסנדלר 8, אזור תעשייה כפר סבא' );
$cu_addr_url  = cag_link_url( 'contact_address_link', 'https://maps.google.com/?q=יוחנן+הסנדלר+8+כפר+סבא' );
$cu_map_embed = 'https://www.google.com/maps?q=' . rawurlencode( $cu_addr ) . '&output=embed';

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
				<a href="<?php echo esc_attr( $cu_phone_tel ); ?>" class="cu-method-card" data-anim="fade-up">
					<div class="cu-method-icon"><i class="fa-solid fa-phone"></i></div>
					<span class="cu-method-label">חייגו אלינו</span>
					<strong class="cu-method-value"><?php echo esc_html( $cu_phone ); ?></strong>
					<span class="cu-method-cta">להתקשרות <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="https://wa.me/<?php echo esc_attr( $cu_wa ); ?>" target="_blank" rel="noopener" class="cu-method-card cu-method-card--wa" data-anim="fade-up" data-delay="0.05">
					<div class="cu-method-icon"><i class="fa-brands fa-whatsapp"></i></div>
					<span class="cu-method-label">וואטסאפ</span>
					<strong class="cu-method-value">שליחת הודעה מיידית</strong>
					<span class="cu-method-cta">פתיחת צ׳אט <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="<?php echo esc_attr( 'mailto:' . $cu_email ); ?>" class="cu-method-card" data-anim="fade-up" data-delay="0.1">
					<div class="cu-method-icon"><i class="fa-solid fa-envelope"></i></div>
					<span class="cu-method-label">אימייל</span>
					<strong class="cu-method-value"><?php echo esc_html( $cu_email ); ?></strong>
					<span class="cu-method-cta">לשליחת מייל <i class="fa-solid fa-arrow-left"></i></span>
				</a>

				<a href="<?php echo esc_url( $cu_addr_url ); ?>" target="_blank" rel="noopener" class="cu-method-card" data-anim="fade-up" data-delay="0.15">
					<div class="cu-method-icon"><i class="fa-solid fa-location-dot"></i></div>
					<span class="cu-method-label">בואו לבקר</span>
					<strong class="cu-method-value"><?php echo esc_html( $cu_addr ); ?></strong>
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
						<?php
						if ( function_exists( 'have_rows' ) && have_rows( 'hours', 'option' ) ) :
							while ( have_rows( 'hours', 'option' ) ) :
								the_row();
								$cu_day  = get_sub_field( 'day' );
								$cu_time = get_sub_field( 'time' );
								$closed  = ( empty( $cu_time ) || $cu_time === 'סגור' );
								?>
								<li>
									<span><?php echo esc_html( $cu_day ); ?></span>
									<span<?php echo $closed ? ' class="cu-closed"' : ''; ?>><?php echo esc_html( $cu_time ?: 'סגור' ); ?></span>
								</li>
								<?php
							endwhile;
						else :
							?>
							<li><span>ימים א׳ – ה׳</span><span>08:00 – 16:00</span></li>
							<li><span>יום שישי</span><span>08:00 – 12:00</span></li>
							<li><span>שבת</span><span class="cu-closed">סגור</span></li>
						<?php endif; ?>
					</ul>

					<div class="cu-visit-actions">
						<a href="<?php echo esc_url( $cu_addr_url ); ?>" target="_blank" rel="noopener" class="btn btn-primary">
							ניווט במפות <i class="fa-solid fa-arrow-left"></i>
						</a>
						<a href="<?php echo esc_attr( $cu_phone_tel ); ?>" class="btn btn-outline">
							לתיאום הגעה <i class="fa-solid fa-phone"></i>
						</a>
					</div>
				</div>

				<div class="cu-map-wrap" data-anim="fade-left">
					<iframe
						class="cu-map"
						src="<?php echo esc_url( $cu_map_embed ); ?>"
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
