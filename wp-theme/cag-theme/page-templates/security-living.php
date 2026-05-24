<?php
/**
 * Template Name: Security Living
 *
 * Ported from the static prototype's pages/security-living/index.html.
 * Body content is editable via ACF (group_cag_security_living); the original
 * static content is kept as the fallback when no fields are set.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ גלריה ══ -->
	<?php
	$cag_sl_gal_h    = cag_field( 'sl_gallery_heading', 'מגורים שמותאמים' );
	$cag_sl_gal_hl   = cag_field( 'sl_gallery_highlight', 'לצרכים מבצעיים' );
	$cag_sl_gal_txt  = cag_field( 'sl_gallery_text', 'א.ג קראוונים מתמחה בתכנון וייצור מבני לינה ייעודיים לגופי הביטחון. הפתרונות שלנו מיועדים לצבא, משטרה, חיל הרפואה ויחידות שדה — תוך הקפדה על אמינות, בטיחות ותפקוד מלא בתנאים מורכבים.' );
	$cag_sl_gallery  = cag_field( 'sl_gallery', array() );
	?>
	<section class="section sl-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_sl_gal_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_sl_gal_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_sl_gal_txt ); ?></p>
			</div>

			<div class="sl-carousel-wrap" data-anim="fade-up">
				<div class="sl-carousel" id="sl-carousel">
					<div class="sl-carousel-track" id="sl-carousel-track">
						<?php if ( is_array( $cag_sl_gallery ) && ! empty( $cag_sl_gallery ) ) : ?>
							<?php foreach ( $cag_sl_gallery as $cag_sl_img ) : ?>
								<?php
								$cag_sl_img_url = is_array( $cag_sl_img ) && ! empty( $cag_sl_img['url'] ) ? $cag_sl_img['url'] : '';
								$cag_sl_img_alt = is_array( $cag_sl_img ) && ! empty( $cag_sl_img['alt'] ) ? $cag_sl_img['alt'] : '';
								if ( ! $cag_sl_img_url ) {
									continue;
								}
								?>
								<div class="sl-carousel-slide">
									<img src="<?php echo esc_url( $cag_sl_img_url ); ?>" alt="<?php echo esc_attr( $cag_sl_img_alt ); ?>" draggable="false">
									<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.02.jpeg' ) ); ?>" alt="מתחם לינה למגזר הביטחוני" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>" alt="מבנה לינה בטחוני בשטח" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>" alt="מבנה לינה בטחוני 3" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>" alt="מבנה לינה בטחוני 4" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>" alt="מבנה לינה בטחוני 5" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="sl-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>" alt="מבנה לינה בטחוני 6" draggable="false">
								<div class="sl-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<button class="sl-car-arrow sl-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
				<button class="sl-car-arrow sl-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
			</div>
			<div class="sl-car-dots" id="sl-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ פתרונות מגורים — use-case cubes ══ -->
	<?php
	$cag_sl_use_h   = cag_field( 'sl_use_heading', 'שימושים ייעודיים' );
	$cag_sl_use_hl  = cag_field( 'sl_use_highlight', 'למגזר הביטחוני' );
	$cag_sl_use_sub = cag_field( 'sl_use_intro', 'מבני הלינה שלנו מותאמים למגוון ייעודים מבצעיים — מגורים קבועים או זמניים, בשטח פתוח או בתוך בסיס' );
	?>
	<section class="section sl-use-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_sl_use_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_sl_use_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_sl_use_sub ); ?></p>
			</div>

			<div class="sl-use-grid">
				<?php if ( function_exists( 'have_rows' ) && have_rows( 'sl_use_items' ) ) : ?>
					<?php
					$cag_sl_use_i = 0;
					while ( have_rows( 'sl_use_items' ) ) :
						the_row();
						$cag_sl_use_icon  = get_sub_field( 'icon' );
						$cag_sl_use_title = get_sub_field( 'title' );
						$cag_sl_use_desc  = get_sub_field( 'desc' );
						$cag_sl_use_delay = number_format( $cag_sl_use_i * 0.06, 2 );
						?>
						<div class="sl-use-card" data-anim="fade-up" data-delay="<?php echo esc_attr( $cag_sl_use_delay ); ?>">
							<?php if ( $cag_sl_use_icon ) : ?><div class="sl-use-icon"><i class="<?php echo esc_attr( $cag_sl_use_icon ); ?>"></i></div><?php endif; ?>
							<?php if ( $cag_sl_use_title ) : ?><h4><?php echo esc_html( $cag_sl_use_title ); ?></h4><?php endif; ?>
							<?php if ( $cag_sl_use_desc ) : ?><p><?php echo esc_html( $cag_sl_use_desc ); ?></p><?php endif; ?>
						</div>
						<?php
						$cag_sl_use_i++;
					endwhile;
					?>
				<?php else : ?>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0">
					<div class="sl-use-icon"><i class="fa-solid fa-bed"></i></div>
					<h4>מגורי חיילים</h4>
					<p>יחידות לינה רב-מיטות לחיילים בשדה — נוחות, אוורור וניצול חלל מיטבי</p>
				</div>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0.06">
					<div class="sl-use-icon"><i class="fa-solid fa-shield-halved"></i></div>
					<h4>מגורי שמירה ואבטחה</h4>
					<p>עמדות לינה לכוחות שמירה, עם מבנה מחוזק ומוגן לתנאי פעילות מבצעית</p>
				</div>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0.12">
					<div class="sl-use-icon"><i class="fa-solid fa-user-tie"></i></div>
					<h4>מגורי קצינים ומפקדים</h4>
					<p>מבני לינה ייצוגיים עם פרטיות, מתאימים לקצינים ולכוחות מטה</p>
				</div>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0.18">
					<div class="sl-use-icon"><i class="fa-solid fa-kit-medical"></i></div>
					<h4>חיל הרפואה</h4>
					<p>מתחמי לינה לאנשי חיל הרפואה בשטח, עם אפשרות חיבור לציוד רפואי</p>
				</div>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0.24">
					<div class="sl-use-icon"><i class="fa-solid fa-graduation-cap"></i></div>
					<h4>מחנות הכשרה</h4>
					<p>פתרונות לינה קבועים וזמניים לבסיסי אימון ומחנות הכשרה</p>
				</div>
				<div class="sl-use-card" data-anim="fade-up" data-delay="0.30">
					<div class="sl-use-icon"><i class="fa-solid fa-tower-observation"></i></div>
					<h4>בסיסי שדה ועמדות</h4>
					<p>מבנים עמידים להקמה מהירה בשטח פתוח, בבסיסים ניידים ובעמדות מרוחקות</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ מגורים בהתאמה למפרט הביטחוני ══ -->
	<?php
	$cag_sl_in_h     = cag_field( 'sl_intro_heading', 'מגורים בטחוניים' );
	$cag_sl_in_hl    = cag_field( 'sl_intro_highlight', 'שנבנים למציאות השטח' );
	$cag_sl_in_lead  = cag_field( 'sl_intro_lead', 'מבני לינה לגופי ביטחון אינם קראוונים רגילים — הם מערכות מגורים שלמות שתוכננו לפעול בתנאי שטח קיצוניים, תחת לוחות זמנים לחוצים ועם דרישות טכניות קפדניות. א.ג קראוונים מתמחה בדיוק בזה: בנייה שמתאימה לדרישות הביטחוניות ולא להיפך.' );
	$cag_sl_in_body  = cag_field( 'sl_intro_body', 'כל מתחם מגורים שאנחנו מקימים כולל מערכות חשמל, תאורה, אוורור ומיזוג, בידוד תרמי ואקוסטי — הכל לפי מפרט שנגזר מהפרויקט הספציפי. בין אם מדובר בבסיס קבע, אתר אימונים, מוצב שדה או מתחם לינה למשטרה — הפתרון נבנה סביב הצורך.' );
	$cag_sl_in_img   = cag_field( 'sl_intro_image', '' );
	$cag_sl_in_cta   = cag_field( 'sl_intro_cta', false );
	$cag_sl_in_url   = ( is_array( $cag_sl_in_cta ) && ! empty( $cag_sl_in_cta['url'] ) ) ? $cag_sl_in_cta['url'] : '#contact';
	$cag_sl_in_label = ( is_array( $cag_sl_in_cta ) && ! empty( $cag_sl_in_cta['title'] ) ) ? $cag_sl_in_cta['title'] : 'קבלו הצעת מחיר לפרויקט שלכם';
	$cag_sl_in_tgt   = ( is_array( $cag_sl_in_cta ) && ! empty( $cag_sl_in_cta['target'] ) ) ? $cag_sl_in_cta['target'] : '';
	?>
	<section class="section sl-intro-section" id="about">
		<div class="container">
			<div class="sl-intro">
				<div class="sl-intro-content" data-anim="fade-right">
					<h2><?php echo esc_html( $cag_sl_in_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_sl_in_hl ); ?></span></h2>
					<?php if ( $cag_sl_in_lead ) : ?><p class="sl-intro-lead"><?php echo esc_html( $cag_sl_in_lead ); ?></p><?php endif; ?>
					<?php if ( $cag_sl_in_body ) : ?><p class="sl-intro-body"><?php echo esc_html( $cag_sl_in_body ); ?></p><?php endif; ?>
					<ul class="bullets">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'sl_intro_bullets' ) ) : ?>
							<?php
							while ( have_rows( 'sl_intro_bullets' ) ) :
								the_row();
								$cag_sl_bullet = get_sub_field( 'text' );
								if ( ! $cag_sl_bullet ) {
									continue;
								}
								?>
								<li><i class="fa-solid fa-check"></i><span><?php echo esc_html( $cag_sl_bullet ); ?></span></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><i class="fa-solid fa-check"></i><span>בידוד תרמי לתנאי קיץ ישראלי קשה</span></li>
							<li><i class="fa-solid fa-check"></i><span>עמידות מבנית גבוהה לשימוש אינטנסיבי</span></li>
							<li><i class="fa-solid fa-check"></i><span>הקמה מהירה — תוך ימים, לא חודשים</span></li>
							<li><i class="fa-solid fa-check"></i><span>התאמה מלאה למפרט הגורם המזמין</span></li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_sl_in_url ); ?>" class="btn btn-primary"<?php echo $cag_sl_in_tgt ? ' target="' . esc_attr( $cag_sl_in_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_sl_in_label ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="sl-intro-media" data-anim="fade-left">
					<?php if ( $cag_sl_in_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_sl_in_img, 'large', false, array( 'class' => 'sl-intro-img', 'loading' => 'lazy', 'alt' => 'מתחם מגורים בטחוני של א.ג קראוונים' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>"
						     alt="מתחם מגורים בטחוני של א.ג קראוונים" class="sl-intro-img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ Mini contact ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<!-- ══ Lightbox ══ -->
<div class="sl-lightbox" id="sl-lightbox" role="dialog" aria-modal="true" aria-hidden="true">
	<button class="sl-lb-close" aria-label="סגור"><i class="fa-solid fa-xmark"></i></button>
	<button class="sl-lb-arrow sl-lb-prev" aria-label="תמונה קודמת"><i class="fa-solid fa-chevron-right"></i></button>
	<div class="sl-lb-img-wrap">
		<img class="sl-lb-img" id="sl-lb-img" src="" alt="">
	</div>
	<button class="sl-lb-arrow sl-lb-next" aria-label="תמונה הבאה"><i class="fa-solid fa-chevron-left"></i></button>
	<div class="sl-lb-counter" id="sl-lb-counter"></div>
</div>

<?php
get_footer();
