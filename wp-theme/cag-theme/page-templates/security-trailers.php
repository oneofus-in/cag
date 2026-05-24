<?php
/**
 * Template Name: Security Trailers
 *
 * Ported from the static prototype's pages/security-trailers/index.html.
 * Body content is editable via ACF (group_cag_security_trailers); the original
 * static content is kept as the fallback when no fields are set.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ גלריה ══ -->
	<?php
	$cag_st_gal_h    = cag_field( 'st_gallery_heading', 'נגררים שמותאמים' );
	$cag_st_gal_hl   = cag_field( 'st_gallery_highlight', 'לצרכים מבצעיים' );
	$cag_st_gal_txt  = cag_field( 'st_gallery_text', 'א.ג קראוונים מתמחה בתכנון וייצור נגררים ביטחוניים לגופי הביטחון. הפתרונות שלנו מיועדים לצבא, משטרה, יחידות שדה ולוגיסטיקה — תוך עמידה בדרישות ביטחוניות קפדניות ופעילות אמינה בכל תנאי שטח.' );
	$cag_st_gallery  = cag_field( 'st_gallery', array() );
	?>
	<section class="section st-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_st_gal_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_st_gal_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_st_gal_txt ); ?></p>
			</div>

			<div class="st-carousel-wrap" data-anim="fade-up">
				<div class="st-carousel" id="st-carousel">
					<div class="st-carousel-track" id="st-carousel-track">
						<?php if ( is_array( $cag_st_gallery ) && ! empty( $cag_st_gallery ) ) : ?>
							<?php foreach ( $cag_st_gallery as $cag_st_img ) : ?>
								<?php
								$cag_st_img_url = is_array( $cag_st_img ) && ! empty( $cag_st_img['url'] ) ? $cag_st_img['url'] : '';
								$cag_st_img_alt = is_array( $cag_st_img ) && ! empty( $cag_st_img['alt'] ) ? $cag_st_img['alt'] : '';
								if ( ! $cag_st_img_url ) {
									continue;
								}
								?>
								<div class="st-carousel-slide">
									<img src="<?php echo esc_url( $cag_st_img_url ); ?>" alt="<?php echo esc_attr( $cag_st_img_alt ); ?>" draggable="false">
									<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="st-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>" alt="נגרר ביטחוני 1" draggable="false">
								<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="st-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.02.jpeg' ) ); ?>" alt="נגרר ביטחוני 2" draggable="false">
								<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="st-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>" alt="נגרר ביטחוני 3" draggable="false">
								<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="st-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>" alt="נגרר ביטחוני 4" draggable="false">
								<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="st-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>" alt="נגרר ביטחוני 5" draggable="false">
								<div class="st-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<button class="st-car-arrow st-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
				<button class="st-car-arrow st-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
			</div>
			<div class="st-car-dots" id="st-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ שימושים ייעודיים ══ -->
	<?php
	$cag_st_use_h   = cag_field( 'st_use_heading', 'שימושים ייעודיים' );
	$cag_st_use_hl  = cag_field( 'st_use_highlight', 'למגזר הביטחוני' );
	$cag_st_use_sub = cag_field( 'st_use_intro', 'הנגררים שלנו מותאמים למגוון ייעודים מבצעיים — כל נגרר מתוכנן מאפס סביב המשימה הספציפית' );
	?>
	<section class="section st-use-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_st_use_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_st_use_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_st_use_sub ); ?></p>
			</div>

			<div class="st-use-grid">
				<?php if ( function_exists( 'have_rows' ) && have_rows( 'st_use_items' ) ) : ?>
					<?php
					$cag_st_use_i = 0;
					while ( have_rows( 'st_use_items' ) ) :
						the_row();
						$cag_st_use_icon  = get_sub_field( 'icon' );
						$cag_st_use_title = get_sub_field( 'title' );
						$cag_st_use_desc  = get_sub_field( 'desc' );
						$cag_st_use_delay = number_format( $cag_st_use_i * 0.06, 2 );
						?>
						<div class="st-use-card" data-anim="fade-up" data-delay="<?php echo esc_attr( $cag_st_use_delay ); ?>">
							<?php if ( $cag_st_use_icon ) : ?><div class="st-use-icon"><i class="<?php echo esc_attr( $cag_st_use_icon ); ?>"></i></div><?php endif; ?>
							<?php if ( $cag_st_use_title ) : ?><h4><?php echo esc_html( $cag_st_use_title ); ?></h4><?php endif; ?>
							<?php if ( $cag_st_use_desc ) : ?><p><?php echo esc_html( $cag_st_use_desc ); ?></p><?php endif; ?>
						</div>
						<?php
						$cag_st_use_i++;
					endwhile;
					?>
				<?php else : ?>
				<div class="st-use-card" data-anim="fade-up" data-delay="0">
					<div class="st-use-icon"><i class="fa-solid fa-tower-broadcast"></i></div>
					<h4>פיקוד ושליטה</h4>
					<p>עמדת פיקוד ניידת לבקרת מבצע ותיאום יחידות — ציוד תקשורת, מסכים ומערכות ניהול משימה</p>
				</div>
				<div class="st-use-card" data-anim="fade-up" data-delay="0.06">
					<div class="st-use-icon"><i class="fa-solid fa-radio"></i></div>
					<h4>תקשורת שדה</h4>
					<p>מערכות קשר, אנטנות ותשתיות סייבר בנגרר נייד — קישוריות אמינה בכל תנאי שטח</p>
				</div>
				<div class="st-use-card" data-anim="fade-up" data-delay="0.12">
					<div class="st-use-icon"><i class="fa-solid fa-wrench"></i></div>
					<h4>תחזוקה וכלי עבודה</h4>
					<p>סדנת שדה ניידת לתיקון ותחזוקת ציוד — מרחב עבודה ארגונומי עם חשמל ותאורה</p>
				</div>
				<div class="st-use-card" data-anim="fade-up" data-delay="0.18">
					<div class="st-use-icon"><i class="fa-solid fa-boxes-stacking"></i></div>
					<h4>אחסון ולוגיסטיקה</h4>
					<p>פתרונות אחסון מאובטחים ומותאמי שטח לציוד, תחמושת ואספקה — עם מערכות קירור וסגירה</p>
				</div>
				<div class="st-use-card" data-anim="fade-up" data-delay="0.24">
					<div class="st-use-icon"><i class="fa-solid fa-shield-halved"></i></div>
					<h4>ביטחון ואבטחה</h4>
					<p>עמדות תצפית ואבטחה ניידות לשמירה על מוקדים — חיזוק מבני, עמידות ותאורת לילה</p>
				</div>
				<div class="st-use-card" data-anim="fade-up" data-delay="0.30">
					<div class="st-use-icon"><i class="fa-solid fa-kit-medical"></i></div>
					<h4>סיוע רפואי</h4>
					<p>נגרר סניטרי ורפואי מצויד לטיפול ופינוי פצועים בשטח — עם חיבור מחולל ואספקת חמצן</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ נגררים בהתאמה למפרט הביטחוני ══ -->
	<?php
	$cag_st_in_h     = cag_field( 'st_intro_heading', 'נגררים ביטחוניים' );
	$cag_st_in_hl    = cag_field( 'st_intro_highlight', 'שנבנים למציאות השטח' );
	$cag_st_in_lead  = cag_field( 'st_intro_lead', 'נגרר ביטחוני אינו רק קרון — הוא מערכת תפעולית שלמה שנבנתה לפעול בתנאי שטח קיצוניים, תחת לחץ מבצעי ועם דרישות טכניות קפדניות. א.ג קראוונים מתמחה בדיוק בזה: כל נגרר מתוכנן ממאפס לפי מפרט הלקוח — לא לפי קטלוג.' );
	$cag_st_in_body  = cag_field( 'st_intro_body', 'כל נגרר שאנחנו בונים כולל מערכות חשמל, תאורה, בידוד תרמי, אוורור ואינטגרציה עם ציוד ספציפי — הכל לפי דרישות הפרויקט. ניסיון של שנים בעבודה עם גורמים ביטחוניים מאפשר לנו לספק פתרונות מהירים, אמינים ומדויקים לכל משימה.' );
	$cag_st_in_img   = cag_field( 'st_intro_image', '' );
	$cag_st_in_cta   = cag_field( 'st_intro_cta', false );
	$cag_st_in_url   = ( is_array( $cag_st_in_cta ) && ! empty( $cag_st_in_cta['url'] ) ) ? $cag_st_in_cta['url'] : '#contact';
	$cag_st_in_label = ( is_array( $cag_st_in_cta ) && ! empty( $cag_st_in_cta['title'] ) ) ? $cag_st_in_cta['title'] : 'קבלו הצעת מחיר לפרויקט שלכם';
	$cag_st_in_tgt   = ( is_array( $cag_st_in_cta ) && ! empty( $cag_st_in_cta['target'] ) ) ? $cag_st_in_cta['target'] : '';
	?>
	<section class="section st-intro-section" id="about">
		<div class="container">
			<div class="st-intro">
				<div class="st-intro-content" data-anim="fade-right">
					<h2><?php echo esc_html( $cag_st_in_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_st_in_hl ); ?></span></h2>
					<?php if ( $cag_st_in_lead ) : ?><p class="st-intro-lead"><?php echo esc_html( $cag_st_in_lead ); ?></p><?php endif; ?>
					<?php if ( $cag_st_in_body ) : ?><p class="st-intro-body"><?php echo esc_html( $cag_st_in_body ); ?></p><?php endif; ?>
					<ul class="bullets">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'st_intro_bullets' ) ) : ?>
							<?php
							while ( have_rows( 'st_intro_bullets' ) ) :
								the_row();
								$cag_st_bullet = get_sub_field( 'text' );
								if ( ! $cag_st_bullet ) {
									continue;
								}
								?>
								<li><i class="fa-solid fa-check"></i><span><?php echo esc_html( $cag_st_bullet ); ?></span></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><i class="fa-solid fa-check"></i><span>עמידה בתקנים ומפרטים ביטחוניים</span></li>
							<li><i class="fa-solid fa-check"></i><span>ייצור מקומי כחול לבן ב-100%</span></li>
							<li><i class="fa-solid fa-check"></i><span>אינטגרציה מלאה עם ציוד ומערכות הלקוח</span></li>
							<li><i class="fa-solid fa-check"></i><span>אספקה מהירה ועמידה בלוחות זמנים</span></li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_st_in_url ); ?>" class="btn btn-primary"<?php echo $cag_st_in_tgt ? ' target="' . esc_attr( $cag_st_in_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_st_in_label ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="st-intro-media" data-anim="fade-left">
					<?php if ( $cag_st_in_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_st_in_img, 'large', false, array( 'class' => 'st-intro-img', 'loading' => 'lazy', 'alt' => 'נגרר ביטחוני של א.ג קראוונים' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>"
						     alt="נגרר ביטחוני של א.ג קראוונים" class="st-intro-img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ Mini contact ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<!-- ══ Lightbox ══ -->
<div class="st-lightbox" id="st-lightbox" role="dialog" aria-modal="true" aria-hidden="true">
	<button class="st-lb-close" aria-label="סגור"><i class="fa-solid fa-xmark"></i></button>
	<button class="st-lb-arrow st-lb-prev" aria-label="תמונה קודמת"><i class="fa-solid fa-chevron-right"></i></button>
	<div class="st-lb-img-wrap">
		<img class="st-lb-img" id="st-lb-img" src="" alt="">
	</div>
	<button class="st-lb-arrow st-lb-next" aria-label="תמונה הבאה"><i class="fa-solid fa-chevron-left"></i></button>
	<div class="st-lb-counter" id="st-lb-counter"></div>
</div>

<?php
get_footer();
