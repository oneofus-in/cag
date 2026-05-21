<?php
/**
 * CAG theme footer.
 *
 * Pre-footer text/image, footer tagline, opening hours, contact details,
 * copyright, bottom links, and the WhatsApp button all come from the ACF
 * "Site Settings" options page (with hardcoded fallbacks via cag_opt()).
 * The "production lines" column renders from the 'footer' menu location.
 */

$cag_logo_white  = cag_opt( 'logo_white', get_theme_file_uri( 'assets/img/logo_white.png' ) );
$cag_footer_tag  = cag_opt( 'footer_tagline', 'מובילים בייצור ובייבוא של קראוונים, גרורי לינה ומתחמי אירוח — תוצרת כחול-לבן ויבוא מהיצרנים הטובים בעולם.' );
$cag_pf_heading  = cag_opt( 'prefooter_heading', 'נשמח לשמוע ממך' );
$cag_pf_text     = cag_opt( 'prefooter_text', 'יש לך שאלה? מחפש קראוון מותאם? צוות המומחים שלנו כאן בשבילך — מלא את הטופס ונחזור אליך בהקדם.' );
$cag_pf_image    = cag_opt( 'prefooter_image', get_theme_file_uri( 'assets/img/aboutimage.png' ) );
$cag_hours_head  = cag_opt( 'hours_heading', 'שעות פתיחה' );
$cag_contact_hd  = cag_opt( 'contact_heading', 'צור קשר' );
$cag_c_phone     = cag_opt( 'contact_phone', '050-550-0180' );
$cag_c_email     = cag_opt( 'contact_email', 'ag0505500180@gmail.com' );
$cag_c_addr      = cag_opt( 'contact_address', 'יוחנן הסנדלר 8, אזור תעשייה כפר סבא' );
$cag_c_addr_url  = cag_link_url( 'contact_address_link', 'https://waze.com/ul?q=יוחנן+הסנדלר+8+כפר+סבא&navigate=yes' );
$cag_c_addr_tgt  = cag_link_target( 'contact_address_link', '_blank' );
$cag_copyright   = cag_opt( 'copyright_text', '© כל הזכויות שמורות לא.ג. קרוואנים בע״מ | האתר עוצב ופותח ע״י ONEOFUS' );
$cag_access_url  = cag_link_url( 'accessibility_link', '#' );
$cag_privacy_url = cag_link_url( 'privacy_link', '#' );
$cag_c_phone_tel = 'tel:' . preg_replace( '/[^0-9+]/', '', $cag_c_phone );
$cag_wa          = preg_replace( '/[^0-9]/', '', cag_opt( 'whatsapp_number', '972505500180' ) );
?>
<section class="pre-footer-contact">
	<div class="container">
		<div class="pfc-grid">

			<div class="pfc-text">
				<h2><?php echo esc_html( $cag_pf_heading ); ?></h2>
				<p class="pfc-desc"><?php echo esc_html( $cag_pf_text ); ?></p>

				<div class="pfc-image-wrap">
					<img src="<?php echo esc_url( $cag_pf_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="pfc-image">
				</div>
			</div>

			<div class="pfc-form-wrap">
				<?php echo do_shortcode( '[contact-form-7 id="755eb9a" title="Footer Form" html_class="pfc-form"]' ); ?>
			</div>

		</div>
	</div>
</section>

<footer class="footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-col">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
					<img src="<?php echo esc_url( $cag_logo_white ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				</a>
				<p><?php echo wp_kses_post( $cag_footer_tag ); ?></p>
			</div>

			<div class="footer-col">
				<h4>קווי הייצור שלנו</h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'menu',
						'depth'          => 1,
						'fallback_cb'    => 'cag_footer_menu_fallback',
					)
				);
				?>
			</div>

			<div class="footer-col">
				<h4><?php echo esc_html( $cag_hours_head ); ?></h4>
				<ul class="hours">
					<?php
					if ( function_exists( 'have_rows' ) && have_rows( 'hours', 'option' ) ) :
						while ( have_rows( 'hours', 'option' ) ) :
							the_row();
							?>
							<li><span><?php echo esc_html( get_sub_field( 'day' ) ); ?></span><span><?php echo esc_html( get_sub_field( 'time' ) ); ?></span></li>
							<?php
						endwhile;
					else :
						?>
						<li><span>א – ה</span><span>08:00 – 16:00</span></li>
						<li><span>שישי</span><span>08:00 – 12:00</span></li>
						<li><span>שבת</span><span>סגור</span></li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h4><?php echo esc_html( $cag_contact_hd ); ?></h4>
				<ul class="contact-list">
					<li><a href="<?php echo esc_attr( $cag_c_phone_tel ); ?>"><i class="fa-solid fa-phone"></i> <?php echo esc_html( $cag_c_phone ); ?></a></li>
					<li><a href="<?php echo esc_attr( 'mailto:' . $cag_c_email ); ?>"><i class="fa-solid fa-envelope"></i> <?php echo esc_html( $cag_c_email ); ?></a></li>
					<li><a href="<?php echo esc_url( $cag_c_addr_url ); ?>"<?php echo $cag_c_addr_tgt ? ' target="' . esc_attr( $cag_c_addr_tgt ) . '" rel="noopener"' : ''; ?>><i class="fa-solid fa-location-dot"></i> <?php echo esc_html( $cag_c_addr ); ?></a></li>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="footer-links">
				<a href="<?php echo esc_url( $cag_access_url ); ?>">הצהרת נגישות</a>
				<span>·</span>
				<a href="<?php echo esc_url( $cag_privacy_url ); ?>">מדיניות פרטיות</a>
			</div>
			<p><?php echo wp_kses_post( $cag_copyright ); ?></p>
		</div>
	</div>
</footer>

<?php if ( $cag_wa ) : ?>
	<a href="<?php echo esc_url( 'https://wa.me/' . $cag_wa ); ?>" class="float-wa" aria-label="WhatsApp">
		<i class="fa-brands fa-whatsapp"></i>
	</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
