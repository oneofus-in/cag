<?php
/**
 * Template Name: Tourist Complexes
 *
 * Ported from the static prototype's pages/tourist-complexes/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Intro / Explanation ══ -->
	<?php
	$cag_tc_intro_h   = cag_field( 'tc_intro_heading', 'מומחים ב' );
	$cag_tc_intro_hl  = cag_field( 'tc_intro_highlight', 'מתחמי תיירות' );
	$cag_tc_intro_ha  = cag_field( 'tc_intro_heading_after', ' ולינה' );
	$cag_tc_intro_txt = cag_field( 'tc_intro_text', 'א.ג קראוונים מתמחה בתכנון והקמת מתחמי תיירות ולינה לאתרי נופש, שמורות טבע, קמפינגים ואתרי אירוח ייחודיים. אנו מציעים פתרונות מבנה מלאים – מהתכנון ועד ההקמה בפועל – עם גמישות מלאה להתאמה אישית לכל פרויקט.' );
	?>
	<section class="tc-intro">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_tc_intro_h ); ?><span class="gradient-text"><?php echo esc_html( $cag_tc_intro_hl ); ?></span><?php echo esc_html( $cag_tc_intro_ha ); ?></h2>
				<p><?php echo esc_html( $cag_tc_intro_txt ); ?></p>
			</div>
		</div>
	</section>

	<!-- ══ Last projects slider ══ -->
	<?php
	$cag_tc_proj_h   = cag_field( 'tc_projects_heading', 'פרויקטים אחרונים' );
	$cag_tc_proj_sub = cag_field( 'tc_projects_subhead', 'מבחר מפרויקטי מתחמי התיירות האחרונים שביצענו ברחבי הארץ' );
	?>
	<section class="tc-projects">
		<div class="container">
			<div class="section-head tc-projects-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_tc_proj_h ); ?></h2>
				<p class="tc-projects-subhead"><?php echo esc_html( $cag_tc_proj_sub ); ?></p>
			</div>

			<div class="tc-slider-wrap" data-anim="fade-up">
				<div class="tc-projects-slider">
					<div class="tc-projects-track" id="tcTrack">

						<?php if ( function_exists( 'have_rows' ) && have_rows( 'tc_projects' ) ) : ?>
							<?php
							while ( have_rows( 'tc_projects' ) ) :
								the_row();
								$cag_tc_p_img   = get_sub_field( 'image' );
								$cag_tc_p_tag   = get_sub_field( 'tag' );
								$cag_tc_p_title = get_sub_field( 'title' );
								$cag_tc_p_desc  = get_sub_field( 'desc' );
								?>
								<div class="tc-project-slide">
									<?php if ( $cag_tc_p_img ) { echo wp_get_attachment_image( $cag_tc_p_img, 'large', false, array( 'class' => 'tc-slide-img', 'loading' => 'lazy' ) ); } ?>
									<div class="tc-slide-overlay">
										<?php if ( $cag_tc_p_tag ) : ?><span class="tc-slide-tag"><?php echo esc_html( $cag_tc_p_tag ); ?></span><?php endif; ?>
										<?php if ( $cag_tc_p_title ) : ?><h3><?php echo esc_html( $cag_tc_p_title ); ?></h3><?php endif; ?>
										<?php if ( $cag_tc_p_desc ) : ?><p><?php echo esc_html( $cag_tc_p_desc ); ?></p><?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php else : ?>

						<div class="tc-project-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="מתחם גלמפינג בגליל" class="tc-slide-img">
							<div class="tc-slide-overlay">
								<span class="tc-slide-tag">גלמפינג</span>
								<h3>מתחם גלמפינג בגליל</h3>
								<p>12 יחידות לינה יוקרתיות בין הטרשים והירוק הגלילי</p>
							</div>
						</div>

						<div class="tc-project-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="בית ספר שדה בנגב" class="tc-slide-img">
							<div class="tc-slide-overlay">
								<span class="tc-slide-tag">בית ספר שדה</span>
								<h3>בית ספר שדה בנגב</h3>
								<p>6 מבנים קבוצתיים לאירוח 80 תלמידים בלב המדבר</p>
							</div>
						</div>

						<div class="tc-project-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="אתר נופש בכנרת" class="tc-slide-img">
							<div class="tc-slide-overlay">
								<span class="tc-slide-tag">אתר נופש</span>
								<h3>אתר נופש בכנרת</h3>
								<p>20 קראוונים על שפת הכנרת עם נוף עוצר נשימה</p>
							</div>
						</div>

						<div class="tc-project-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="חווה אגרי-טוריסטית בשרון" class="tc-slide-img">
							<div class="tc-slide-overlay">
								<span class="tc-slide-tag">אגריטוריזם</span>
								<h3>חווה אגרי-טוריסטית בשרון</h3>
								<p>8 יחידות לינה המשתלבות בנוף החקלאי של השרון</p>
							</div>
						</div>

						<div class="tc-project-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="קמפינג ביער" class="tc-slide-img">
							<div class="tc-slide-overlay">
								<span class="tc-slide-tag">קמפינג</span>
								<h3>קמפינג ביער</h3>
								<p>15 מבני לינה בצל האורנים עם חיבור מלא לטבע</p>
							</div>
						</div>

						<?php endif; ?>

					</div>
				</div>

				<button class="tc-slider-btn tc-slider-prev" id="tcPrev" aria-label="הקודם">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
				<button class="tc-slider-btn tc-slider-next" id="tcNext" aria-label="הבא">
					<i class="fa-solid fa-chevron-left"></i>
				</button>

				<div class="tc-slider-dots" id="tcDots"></div>
			</div>
		</div>
	</section>

	<!-- ══ Solutions grid ══ -->
	<?php
	$cag_tc_sol_h   = cag_field( 'tc_solutions_heading', 'פתרונות לכל' );
	$cag_tc_sol_hl  = cag_field( 'tc_solutions_highlight', 'סוג מתחם' );
	$cag_tc_sol_sub = cag_field( 'tc_solutions_intro', 'מגוון רחב של פתרונות לינה ותיירות – לכל שימוש, גודל ותקציב' );
	?>
	<section class="tc-solutions">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_tc_sol_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_tc_sol_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_tc_sol_sub ); ?></p>
			</div>
			<div class="tc-solutions-grid">
				<?php if ( function_exists( 'have_rows' ) && have_rows( 'tc_solutions_items' ) ) : ?>
					<?php
					$cag_tc_sol_i = 0;
					while ( have_rows( 'tc_solutions_items' ) ) :
						the_row();
						$cag_tc_sol_icon  = get_sub_field( 'icon' );
						$cag_tc_sol_title = get_sub_field( 'title' );
						$cag_tc_sol_desc  = get_sub_field( 'desc' );
						$cag_tc_sol_delay = number_format( $cag_tc_sol_i * 0.06, 2 );
						?>
						<div class="tc-solution-card" data-anim="fade-up" data-delay="<?php echo esc_attr( $cag_tc_sol_delay ); ?>">
							<?php if ( $cag_tc_sol_icon ) : ?><div class="tc-solution-icon"><i class="<?php echo esc_attr( $cag_tc_sol_icon ); ?>"></i></div><?php endif; ?>
							<?php if ( $cag_tc_sol_title ) : ?><h4><?php echo esc_html( $cag_tc_sol_title ); ?></h4><?php endif; ?>
							<?php if ( $cag_tc_sol_desc ) : ?><p><?php echo esc_html( $cag_tc_sol_desc ); ?></p><?php endif; ?>
						</div>
						<?php
						$cag_tc_sol_i++;
					endwhile;
					?>
				<?php else : ?>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0">
					<div class="tc-solution-icon"><i class="fa-solid fa-tree"></i></div>
					<h4>קמפינגים ושמורות</h4>
					<p>מבני לינה עמידים בשטח פתוח, מותאמים לתנאי טבע קשים ולשימוש אינטנסיבי</p>
				</div>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0.06">
					<div class="tc-solution-icon"><i class="fa-solid fa-umbrella-beach"></i></div>
					<h4>אתרי נופש</h4>
					<p>חווילות ויחידות אירוח פרטיות ברמה גבוהה, עם עיצוב מושקע וחוויית אורח ייחודית</p>
				</div>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0.12">
					<div class="tc-solution-icon"><i class="fa-solid fa-people-group"></i></div>
					<h4>אירוח קבוצתי</h4>
					<p>מבנים לכיתות שדה, מחנות נוער ופעילויות חינוכיות עם ניצול חכם של שטח ותקציב</p>
				</div>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0.18">
					<div class="tc-solution-icon"><i class="fa-solid fa-mountain-sun"></i></div>
					<h4>גלמפינג</h4>
					<p>מבני לינה יוקרתיים בטבע, עם גימור מושקע וחוויית לינה שמשלבת אדריכלות ופראיות</p>
				</div>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0.24">
					<div class="tc-solution-icon"><i class="fa-solid fa-building"></i></div>
					<h4>מתחמים עירוניים</h4>
					<p>פתרונות לינה מיוחדים בסביבה עירונית, מותאמים לתקנות בנייה ולמרחב מוגבל</p>
				</div>
				<div class="tc-solution-card" data-anim="fade-up" data-delay="0.30">
					<div class="tc-solution-icon"><i class="fa-solid fa-tractor"></i></div>
					<h4>חוות ואגריטוריזם</h4>
					<p>מבנים לתיירות חקלאית המשתלבים בנוף ובאופי החוות, תוך שמירה על אותנטיות מקומית</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ Model rows ══ -->
	<?php
	$cag_tc_mdl_h   = cag_field( 'tc_models_heading', 'דגמי' );
	$cag_tc_mdl_hl  = cag_field( 'tc_models_highlight', 'מבני לינה' );
	$cag_tc_mdl_ha  = cag_field( 'tc_models_heading_after', 'למתחמי תיירות' );
	$cag_tc_mdl_sub = cag_field( 'tc_models_intro', 'שלושה דגמים עיקריים לכל צורך ותקציב, כולם ניתנים להתאמה אישית מלאה' );
	?>
	<section class="tc-models-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_tc_mdl_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_tc_mdl_hl ); ?></span> <?php echo esc_html( $cag_tc_mdl_ha ); ?></h2>
				<p><?php echo esc_html( $cag_tc_mdl_sub ); ?></p>
			</div>
			<div class="tc-models-list">

				<?php if ( function_exists( 'have_rows' ) && have_rows( 'tc_models' ) ) : ?>
					<?php
					$cag_tc_mdl_i = 0;
					while ( have_rows( 'tc_models' ) ) :
						the_row();
						$cag_tc_m_img       = get_sub_field( 'image' );
						$cag_tc_m_tag       = get_sub_field( 'tag' );
						$cag_tc_m_title     = get_sub_field( 'title' );
						$cag_tc_m_price     = get_sub_field( 'price' );
						$cag_tc_m_price_nt  = get_sub_field( 'price_note' );
						$cag_tc_m_desc      = get_sub_field( 'desc' );
						$cag_tc_m_cta       = get_sub_field( 'cta' );
						$cag_tc_m_reverse   = ( 1 === $cag_tc_mdl_i % 2 ); // auto-zigzag: every other model flips the image side.
						?>
						<article class="tc-model<?php echo $cag_tc_m_reverse ? ' is-reverse' : ''; ?>" data-anim="fade-up">
							<div class="tc-model-media">
								<?php if ( $cag_tc_m_img ) { echo wp_get_attachment_image( $cag_tc_m_img, 'large', false, array( 'class' => 'tc-model-img', 'loading' => 'lazy' ) ); } ?>
							</div>
							<div class="tc-model-card">
								<div class="tc-model-head">
									<span class="tc-model-num"><?php echo esc_html( $cag_tc_mdl_i + 1 ); ?></span>
									<?php if ( $cag_tc_m_tag ) : ?><span class="tc-model-tag"><?php echo esc_html( $cag_tc_m_tag ); ?></span><?php endif; ?>
								</div>
								<?php if ( $cag_tc_m_title ) : ?><h3><?php echo esc_html( $cag_tc_m_title ); ?></h3><?php endif; ?>
								<?php if ( $cag_tc_m_price ) : ?><p class="tc-price"><?php echo esc_html( $cag_tc_m_price ); ?><?php if ( $cag_tc_m_price_nt ) : ?> <small><?php echo esc_html( $cag_tc_m_price_nt ); ?></small><?php endif; ?></p><?php endif; ?>
								<?php if ( $cag_tc_m_desc ) : ?><p class="tc-desc"><?php echo esc_html( $cag_tc_m_desc ); ?></p><?php endif; ?>
								<?php if ( have_rows( 'specs' ) ) : ?>
									<ul class="tc-specs">
										<?php
										while ( have_rows( 'specs' ) ) :
											the_row();
											$cag_tc_spec_icon = get_sub_field( 'icon' );
											$cag_tc_spec_text = get_sub_field( 'text' );
											?>
											<li>
												<?php if ( $cag_tc_spec_icon ) : ?><i class="<?php echo esc_attr( $cag_tc_spec_icon ); ?>"></i><?php endif; ?>
												<?php if ( $cag_tc_spec_text ) : ?><span><?php echo esc_html( $cag_tc_spec_text ); ?></span><?php endif; ?>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
								<?php if ( is_array( $cag_tc_m_cta ) && ! empty( $cag_tc_m_cta['url'] ) ) : ?>
									<a href="<?php echo esc_url( $cag_tc_m_cta['url'] ); ?>" class="tc-btn tc-btn-primary tc-btn-block"<?php echo ! empty( $cag_tc_m_cta['target'] ) ? ' target="' . esc_attr( $cag_tc_m_cta['target'] ) . '"' : ''; ?>>
										<?php echo esc_html( ! empty( $cag_tc_m_cta['title'] ) ? $cag_tc_m_cta['title'] : 'לצפייה בפרטים נוספים ובפרויקטים' ); ?> <i class="fa-solid fa-arrow-left"></i>
									</a>
								<?php endif; ?>
							</div>
						</article>
						<?php
						$cag_tc_mdl_i++;
					endwhile;
					?>
				<?php else : ?>

				<!-- Model 1 -->
				<article class="tc-model" data-anim="fade-up">
					<div class="tc-model-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/aboutimage.png' ) ); ?>" alt="קראוון לינה בודד" class="tc-model-img">
					</div>
					<div class="tc-model-card">
						<div class="tc-model-head">
							<span class="tc-model-num">1</span>
							<span class="tc-model-tag">יחידת גלמפינג</span>
						</div>
						<h3>קראוון לינה בודד</h3>
						<p class="tc-price">₪150,000 <small>(לא כולל מע״מ)</small></p>
						<p class="tc-desc">יחידת לינה קומפקטית ואיכותית, מושלמת לאתרי גלמפינג ונופש זוגי. משלבת עיצוב מודרני, נוחות מרבית ועמידות גבוהה לתנאי חוץ.</p>
						<ul class="tc-specs">
							<li>
								<i class="fa-solid fa-vector-square"></i>
								<span>22 מ״ר</span>
							</li>
							<li>
								<i class="fa-solid fa-bed"></i>
								<span>2–3 אנשים</span>
							</li>
							<li>
								<i class="fa-solid fa-layer-group"></i>
								<span>קומה אחת</span>
							</li>
						</ul>
						<a href="#contact" class="tc-btn tc-btn-primary tc-btn-block">
							לצפייה בפרטים נוספים ובפרויקטים <i class="fa-solid fa-arrow-left"></i>
						</a>
					</div>
				</article>

				<!-- Model 2 (image left) -->
				<article class="tc-model is-reverse" data-anim="fade-up">
					<div class="tc-model-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/imagestacking.png' ) ); ?>" alt="מבנה לינה קבוצתי" class="tc-model-img">
					</div>
					<div class="tc-model-card">
						<div class="tc-model-head">
							<span class="tc-model-num">2</span>
							<span class="tc-model-tag">אירוח קבוצתי</span>
						</div>
						<h3>מבנה לינה קבוצתי</h3>
						<p class="tc-price">₪220,000 <small>(לא כולל מע״מ)</small></p>
						<p class="tc-desc">מבנה מרווח לאירוח קבוצתי – מתאים לבתי ספר שדה, קמפינגים ומחנות נוער. עיצוב פונקציונלי עם ניצול חכם של השטח הפנימי.</p>
						<ul class="tc-specs">
							<li>
								<i class="fa-solid fa-vector-square"></i>
								<span>40 מ״ר</span>
							</li>
							<li>
								<i class="fa-solid fa-bed"></i>
								<span>8–10 אנשים</span>
							</li>
							<li>
								<i class="fa-solid fa-layer-group"></i>
								<span>מיטות דו-קומתיות</span>
							</li>
						</ul>
						<a href="#contact" class="tc-btn tc-btn-primary tc-btn-block">
							לצפייה בפרטים נוספים ובפרויקטים <i class="fa-solid fa-arrow-left"></i>
						</a>
					</div>
				</article>

				<!-- Model 3 -->
				<article class="tc-model" data-anim="fade-up">
					<div class="tc-model-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/aboutimage.png' ) ); ?>" alt="יחידת נופש זוגית" class="tc-model-img">
					</div>
					<div class="tc-model-card">
						<div class="tc-model-head">
							<span class="tc-model-num">3</span>
							<span class="tc-model-tag">נופש פרטי</span>
						</div>
						<h3>יחידת נופש זוגית</h3>
						<p class="tc-price">₪180,000 <small>(לא כולל מע״מ)</small></p>
						<p class="tc-desc">יחידת נופש מפנקת לזוגות, עם דגש על פרטיות, גימור מושקע ואינטגרציה מלאה עם הסביבה הטבעית. חוויית לינה שלא ישכחו.</p>
						<ul class="tc-specs">
							<li>
								<i class="fa-solid fa-vector-square"></i>
								<span>28 מ״ר</span>
							</li>
							<li>
								<i class="fa-solid fa-bed"></i>
								<span>2 אנשים</span>
							</li>
							<li>
								<i class="fa-solid fa-layer-group"></i>
								<span>מפואר</span>
							</li>
						</ul>
						<a href="#contact" class="tc-btn tc-btn-primary tc-btn-block">
							לצפייה בפרטים נוספים ובפרויקטים <i class="fa-solid fa-arrow-left"></i>
						</a>
					</div>
				</article>

				<?php endif; ?>

			</div>
		</div>
	</section>

	<!-- ══ Characteristics ══ -->
	<?php
	$cag_tc_ch_img    = cag_field( 'tc_chars_image', '' );
	$cag_tc_ch_imgtag = cag_field( 'tc_chars_img_tag', 'ניסיון של למעלה מ-15 שנה' );
	$cag_tc_ch_h      = cag_field( 'tc_chars_heading', 'למה לבחור' );
	$cag_tc_ch_hl     = cag_field( 'tc_chars_highlight', 'א.ג קראוונים?' );
	$cag_tc_ch_cta    = cag_field( 'tc_chars_cta', false );
	$cag_tc_ch_url    = ( is_array( $cag_tc_ch_cta ) && ! empty( $cag_tc_ch_cta['url'] ) ) ? $cag_tc_ch_cta['url'] : '#contact';
	$cag_tc_ch_label  = ( is_array( $cag_tc_ch_cta ) && ! empty( $cag_tc_ch_cta['title'] ) ) ? $cag_tc_ch_cta['title'] : 'בואו נדבר על הפרויקט שלכם';
	$cag_tc_ch_target = ( is_array( $cag_tc_ch_cta ) && ! empty( $cag_tc_ch_cta['target'] ) ) ? $cag_tc_ch_cta['target'] : '';
	?>
	<section class="tc-chars">
		<div class="container">
			<div class="tc-chars-split">
				<div class="tc-chars-image" data-anim="fade-right">
					<?php if ( $cag_tc_ch_imgtag ) : ?><span class="tc-chars-img-tag"><?php echo esc_html( $cag_tc_ch_imgtag ); ?></span><?php endif; ?>
					<?php if ( $cag_tc_ch_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_tc_ch_img, 'large', false, array( 'class' => 'tc-chars-img', 'loading' => 'lazy' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt="מאפיינים ויתרונות" class="tc-chars-img">
					<?php endif; ?>
				</div>
				<div class="tc-chars-content" data-anim="fade-left">
					<h2><?php echo esc_html( $cag_tc_ch_h ); ?><br><span class="gradient-text"><?php echo esc_html( $cag_tc_ch_hl ); ?></span></h2>
					<ul class="tc-checklist">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'tc_chars_items' ) ) : ?>
							<?php
							while ( have_rows( 'tc_chars_items' ) ) :
								the_row();
								$cag_tc_ch_title = get_sub_field( 'title' );
								$cag_tc_ch_desc  = get_sub_field( 'desc' );
								?>
								<li>
									<i class="fa-solid fa-check"></i>
									<div>
										<?php if ( $cag_tc_ch_title ) : ?><h4><?php echo esc_html( $cag_tc_ch_title ); ?></h4><?php endif; ?>
										<?php if ( $cag_tc_ch_desc ) : ?><p><?php echo esc_html( $cag_tc_ch_desc ); ?></p><?php endif; ?>
									</div>
								</li>
							<?php endwhile; ?>
						<?php else : ?>
						<li>
							<i class="fa-solid fa-check"></i>
							<div>
								<h4>עמידות לתנאי חוץ</h4>
								<p>חומרים מותאמים לאקלים הישראלי – חום, לחות ושמש – עם אחריות ועמידות ארוכת שנים</p>
							</div>
						</li>
						<li>
							<i class="fa-solid fa-check"></i>
							<div>
								<h4>התאמה אישית מלאה</h4>
								<p>כל פרויקט מתוכנן מחדש לפי צרכי האתר, הייעוד, המשתמשים והתקציב</p>
							</div>
						</li>
						<li>
							<i class="fa-solid fa-check"></i>
							<div>
								<h4>ליווי מקצועי מלא</h4>
								<p>אנחנו איתכם ממפגש ראשון, דרך שלב התכנון וייצור, ועד מסירת המפתח בשטח</p>
							</div>
						</li>
						<li>
							<i class="fa-solid fa-check"></i>
							<div>
								<h4>עמידה בתקנים</h4>
								<p>רישוי, תכנון ובנייה לפי כל דרישות החוק, כולל סיוע בהיתרים מול הרשויות</p>
							</div>
						</li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_tc_ch_url ); ?>" class="tc-btn tc-btn-primary"<?php echo $cag_tc_ch_target ? ' target="' . esc_attr( $cag_tc_ch_target ) . '"' : ''; ?>>
						<?php echo esc_html( $cag_tc_ch_label ); ?> <i class="fa-solid fa-arrow-left"></i>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ FAQ ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
