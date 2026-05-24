<?php
/**
 * Template Name: Kachol Lavan
 *
 * Ported from the static prototype's pages/kachol-lavan/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ הדגמים שלנו ══ -->
	<?php
	// Singular fields fall back to the original copy when empty (ACF unset).
	$cag_kl_models_heading = function_exists( 'get_field' ) ? get_field( 'kl_models_heading' ) : '';
	if ( ! $cag_kl_models_heading ) {
		$cag_kl_models_heading = 'הדגמים שלנו בא.ג קראוונים';
	}
	$cag_kl_models_intro = function_exists( 'get_field' ) ? get_field( 'kl_models_intro' ) : '';
	if ( ! $cag_kl_models_intro ) {
		$cag_kl_models_intro = '<p>מגוון מבני לינה ומתחמים תוכננו מתוך הבנה אמיתית של השטח – עם גמישות מלאה להתאמה אישית לפי צורך, שימוש ותקציב, <strong>כל הדגמים מיוצרים כחול לבן, בייצור מקומי מוקפד</strong>, המאפשר שליטה מלאה בתהליך, זמינות גבוהה ויכולת לבצע התאמות מדויקות לאורך הדרך הצוות שלנו מלווה את הפרויקט משלב התכנון ועד סיום הבנייה, עם זמינות גבוהה וחשיבה פרקטית המביאה תוצאות בשטח</p>';
	}
	// CTA: ACF link field (title=label, url=href, target). Falls back to the original button.
	$cag_kl_models_cta = function_exists( 'get_field' ) ? get_field( 'kl_models_cta' ) : false;
	$cag_kl_cta_url    = ( is_array( $cag_kl_models_cta ) && ! empty( $cag_kl_models_cta['url'] ) ) ? $cag_kl_models_cta['url'] : home_url( '/#models' );
	$cag_kl_cta_label  = ( is_array( $cag_kl_models_cta ) && ! empty( $cag_kl_models_cta['title'] ) ) ? $cag_kl_models_cta['title'] : 'הכירו את הדגמים שלנו';
	$cag_kl_cta_target = ( is_array( $cag_kl_models_cta ) && ! empty( $cag_kl_models_cta['target'] ) ) ? $cag_kl_models_cta['target'] : '';
	?>
	<section class="section" id="models">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_kl_models_heading ); ?></h2>
			</div>

			<div class="kl-models-intro" data-anim="fade-up">
				<?php echo $cag_kl_models_intro; // ACF wysiwyg / hardcoded fallback — trusted HTML. ?>
				<div class="kl-intro-cta">
					<a href="<?php echo esc_url( $cag_kl_cta_url ); ?>" class="btn btn-primary"<?php echo $cag_kl_cta_target ? ' target="' . esc_attr( $cag_kl_cta_target ) . '"' : ''; ?>><?php echo esc_html( $cag_kl_cta_label ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>

			<div class="models-grid">
				<?php if ( function_exists( 'have_rows' ) && have_rows( 'kl_models' ) ) : ?>
					<?php
					$cag_kl_model_i = 0;
					while ( $cag_kl_model_i < 4 && have_rows( 'kl_models' ) ) :
						the_row();
						$cag_kl_model_img   = get_sub_field( 'image' );
						$cag_kl_model_tag   = get_sub_field( 'tag' );
						$cag_kl_model_title = get_sub_field( 'title' );
						$cag_kl_model_delay = number_format( $cag_kl_model_i * 0.08, 2 );
						?>
						<div class="model-card" data-anim="zoom-in" data-delay="<?php echo esc_attr( $cag_kl_model_delay ); ?>">
							<?php if ( $cag_kl_model_img ) { echo wp_get_attachment_image( $cag_kl_model_img, 'large', false, array( 'class' => 'model-card-img', 'loading' => 'lazy' ) ); } ?>
							<div class="model-card-body">
								<?php if ( $cag_kl_model_tag ) : ?><span class="model-tag"><?php echo esc_html( $cag_kl_model_tag ); ?></span><?php endif; ?>
								<?php if ( $cag_kl_model_title ) : ?><h3><?php echo esc_html( $cag_kl_model_title ); ?></h3><?php endif; ?>
							</div>
						</div>
						<?php
						$cag_kl_model_i++;
					endwhile;
					?>
				<?php else : ?>
					<div class="model-card" data-anim="zoom-in" data-delay="0">
						<img class="model-card-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>" alt="דגם שחף" loading="lazy">
						<div class="model-card-body">
							<span class="model-tag">דגם לינה מתקדם</span>
							<h3>דגם שחף</h3>
						</div>
					</div>
					<div class="model-card" data-anim="zoom-in" data-delay="0.08">
						<img class="model-card-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>" alt="דגם לופט" loading="lazy">
						<div class="model-card-body">
							<span class="model-tag">מבנה לינה דו-קומתי</span>
							<h3>דגם לופט</h3>
						</div>
					</div>
					<div class="model-card" data-anim="zoom-in" data-delay="0.16">
						<img class="model-card-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>" alt="דגם חדש" loading="lazy">
						<div class="model-card-body">
							<span class="model-tag">קראוון חדר שינה בודד</span>
							<h3>דגם חדש</h3>
						</div>
					</div>
					<div class="model-card" data-anim="zoom-in" data-delay="0.24">
						<img class="model-card-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>" alt="דגם בית ספר שדה" loading="lazy">
						<div class="model-card-body">
							<span class="model-tag">מיטות דו-קומתיות</span>
							<h3>דגם בית ספר שדה</h3>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ מקטעי תמונה + טקסט (מתחמי נופש, פודטראקים, …) — repeater עם פריסה מתחלפת ══ -->
	<?php if ( function_exists( 'have_rows' ) && have_rows( 'kl_splits' ) ) : ?>
		<?php
		$cag_kl_split_i = 0;
		while ( have_rows( 'kl_splits' ) ) :
			the_row();
			$cag_kl_s_heading = get_sub_field( 'heading' );
			$cag_kl_s_body    = get_sub_field( 'body' );
			$cag_kl_s_img_top = get_sub_field( 'image_top' );
			$cag_kl_s_img_bot = get_sub_field( 'image_bot' );
			if ( ! $cag_kl_s_img_bot ) {
				$cag_kl_s_img_bot = $cag_kl_s_img_top; // bottom falls back to top.
			}
			$cag_kl_s_cta     = get_sub_field( 'cta' );
			$cag_kl_s_reverse = ( 1 === $cag_kl_split_i % 2 ); // auto-zigzag: every other section flips sides + order.
			$cag_kl_text_anim = $cag_kl_s_reverse ? 'fade-left' : 'fade-right';
			$cag_kl_img_anim  = $cag_kl_s_reverse ? 'fade-right' : 'fade-left';
			?>
			<section class="section">
				<div class="container">
					<div class="resort-split">
						<?php if ( $cag_kl_s_reverse ) : ?>
							<div class="resort-img-grid" data-anim="<?php echo esc_attr( $cag_kl_img_anim ); ?>">
								<?php if ( $cag_kl_s_img_top ) { echo wp_get_attachment_image( $cag_kl_s_img_top, 'large', false, array( 'class' => 'resort-img--top', 'loading' => 'lazy' ) ); } ?>
								<?php if ( $cag_kl_s_img_bot ) { echo wp_get_attachment_image( $cag_kl_s_img_bot, 'large', false, array( 'class' => 'resort-img--bot', 'loading' => 'lazy' ) ); } ?>
							</div>
						<?php endif; ?>
						<div class="resort-content" data-anim="<?php echo esc_attr( $cag_kl_text_anim ); ?>">
							<?php if ( $cag_kl_s_heading ) : ?><h2><?php echo esc_html( $cag_kl_s_heading ); ?></h2><?php endif; ?>
							<?php echo $cag_kl_s_body; // ACF wysiwyg — trusted, already-formatted HTML. ?>
							<?php if ( have_rows( 'features' ) ) : ?>
								<div class="feature-icons">
									<?php
									while ( have_rows( 'features' ) ) :
										the_row();
										$cag_kl_f_icon  = get_sub_field( 'icon' );
										$cag_kl_f_label = get_sub_field( 'label' );
										?>
										<div class="feature-icon-card">
											<?php if ( $cag_kl_f_icon ) : ?><i class="<?php echo esc_attr( $cag_kl_f_icon ); ?>"></i><?php endif; ?>
											<?php if ( $cag_kl_f_label ) : ?><span><?php echo esc_html( $cag_kl_f_label ); ?></span><?php endif; ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<?php if ( is_array( $cag_kl_s_cta ) && ! empty( $cag_kl_s_cta['url'] ) ) : ?>
								<a href="<?php echo esc_url( $cag_kl_s_cta['url'] ); ?>" class="btn btn-primary"<?php echo ! empty( $cag_kl_s_cta['target'] ) ? ' target="' . esc_attr( $cag_kl_s_cta['target'] ) . '"' : ''; ?>><?php echo esc_html( ! empty( $cag_kl_s_cta['title'] ) ? $cag_kl_s_cta['title'] : 'גלו עוד' ); ?> <i class="fa-solid fa-arrow-left"></i></a>
							<?php endif; ?>
						</div>
						<?php if ( ! $cag_kl_s_reverse ) : ?>
							<div class="resort-img-grid" data-anim="<?php echo esc_attr( $cag_kl_img_anim ); ?>">
								<?php if ( $cag_kl_s_img_top ) { echo wp_get_attachment_image( $cag_kl_s_img_top, 'large', false, array( 'class' => 'resort-img--top', 'loading' => 'lazy' ) ); } ?>
								<?php if ( $cag_kl_s_img_bot ) { echo wp_get_attachment_image( $cag_kl_s_img_bot, 'large', false, array( 'class' => 'resort-img--bot', 'loading' => 'lazy' ) ); } ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php
			$cag_kl_split_i++;
		endwhile;
		?>
	<?php else : ?>

	<!-- ══ מתחמי נופש ותיירות ══ -->
	<section class="section" id="resort">
		<div class="container">
			<div class="resort-split">
				<div class="resort-content" data-anim="fade-right">
					<h2>מתחמי נופש ותיירות</h2>
					<p>בא.ג קראוונים מקימים מתחמי לינה ותיירות לפרויקטים בכל היקף – מבנים בודדים ועד מתחמים שלמים. הייצור מתבצע כחול לבן, בתהליך מוקפד במפעל, עם שליטה מלאה בכל שלב ויכולת התאמה מדויקת לצרכי הפרויקט.</p>
					<p>המתחמים כוללים שילוב של יחידות לינה, חדרי אוכל, משרדים, מזכירות וכיתות לימוד – <strong style="color:var(--blue-700);font-weight:700;">בתכנון אחיד המחבר בין מבנים שונים למתחם שלם ומתואם, עם כל מה שצריך במקום אחד.</strong></p>
					<div class="feature-icons">
						<div class="feature-icon-card">
							<i class="fa-solid fa-briefcase"></i>
							<span>משרדים</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-bed"></i>
							<span>חדרי לינה</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-headset"></i>
							<span>סוכנות</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-utensils"></i>
							<span>חדר אוכל</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-campground"></i>
							<span>מתחמי נופש</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-chalkboard-user"></i>
							<span>כיתות לימוד</span>
						</div>
					</div>
					<a href="#contact" class="btn btn-primary">גלו עוד על מתחמי נופש ותיירות <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="resort-img-grid" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/imagestacking.png' ) ); ?>" alt="מתחמי נופש" class="resort-img--top">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/imagestacking.png' ) ); ?>" alt="מתחמי נופש" class="resort-img--bot">
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פודטראקים ══ -->
	<section class="section" id="foodtrucks">
		<div class="container">
			<div class="resort-split">
				<div class="resort-img-grid" data-anim="fade-right">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/imagestacking.png' ) ); ?>" alt="פודטראקים" class="resort-img--top">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/imagestacking.png' ) ); ?>" alt="פודטראקים" class="resort-img--bot">
				</div>
				<div class="resort-content" data-anim="fade-left">
					<h2>פודטראקים</h2>
					<p>בא.ג קראוונים מייצרים פודטראקים מקצועיים בייצור כחול לבן, מתוכננים במדויק לצרכי כל עסק – מאירועי רחוב ושווקים ועד פתרונות קבע. כל פודטראק נבנה עם תכנון פנימי חכם, מפרט ציוד מתקדם ועיצוב חיצוני המותאם למיתוג העסק.</p>
					<p>הפודטראקים מיוצרים לעמידה בתקני משרד הבריאות, עם מטבח מצויד, חיבורי חשמל ומים, חלון שירות נוח ופתרונות אחסון יעילים – <strong style="color:var(--blue-700);font-weight:700;">הכול בייצור מקומי, עם ליווי מקצועי משלב התכנון ועד היציאה לדרך.</strong></p>
					<div class="feature-icons">
						<div class="feature-icon-card">
							<i class="fa-solid fa-utensils"></i>
							<span>מטבח מצויד</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-bolt"></i>
							<span>חשמל ומים</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-window-maximize"></i>
							<span>חלון שירות</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-certificate"></i>
							<span>תקני בריאות</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-palette"></i>
							<span>מיתוג מותאם</span>
						</div>
						<div class="feature-icon-card">
							<i class="fa-solid fa-truck"></i>
							<span>ניידות מלאה</span>
						</div>
					</div>
					<a href="<?php echo esc_url( home_url( '/foodtrucks/' ) ); ?>" class="btn btn-primary">גלו עוד על הפודטראקים שלנו <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>

	<!-- ══ שאלות נפוצות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
