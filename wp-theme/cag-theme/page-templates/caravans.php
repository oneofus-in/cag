<?php
/**
 * Template Name: Caravans
 *
 * Ported from the static prototype's pages/caravans/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ דגמים ══ -->
	<section class="section cv-models-section" id="models">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>הקראוונים <span class="gradient-text">המיובאים שלנו</span></h2>
				<p>ארבעה מותגים מובילים מאירופה — איכות, אמינות ועיצוב, בכל קטגוריה ובכל תקציב</p>
			</div>

			<!-- ── Brand: Weinsberg ── -->
			<div class="cv-brand-block" data-anim="fade-up">
				<div class="cv-brand-head">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/wein.png' ) ); ?>" alt="Weinsberg" class="cv-brand-logo">
					<h3 class="cv-brand-title">קראוונים <span>Weinsberg</span></h3>
					<p class="cv-brand-tagline">איכות גרמנית, תכנון פונקציונלי לכל סוגי המשפחות</p>
				</div>
				<div class="cv-models-grid">
					<div class="cv-model-card" data-anim="fade-up" data-delay="0">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>"
							     alt="Weinsberg CaraOne 390 QD" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">קומפקטי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>CaraOne 390 QD</h4>
							<p class="cv-model-desc">דגם כניסה קומפקטי וקליל לגרירה — מושלם לזוגות ולמשפחות קטנות.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>4 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>5.4 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪110,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.08">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>"
							     alt="Weinsberg CaraTwo 450 FU" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-badge">פופולרי</span>
								<span class="cv-model-tag">משפחתי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>CaraTwo 450 FU</h4>
							<p class="cv-model-desc">קרוואן משפחתי עם פריסה חכמה, אזורי שינה נפרדים ומטבח מצויד.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>5 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>6.2 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪145,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.16">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>"
							     alt="Weinsberg CaraCompact 600" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">יוקרה</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>CaraCompact 600</h4>
							<p class="cv-model-desc">קרוואן מרווח עם מפרט פרימיום — חלל פנים יוקרתי וגימור גבוה.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>6 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>7.0 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪185,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ── Brand: Sterckeman ── -->
			<div class="cv-brand-block" data-anim="fade-up">
				<div class="cv-brand-head">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/sterckeman_logo_small.jpg' ) ); ?>" alt="Sterckeman" class="cv-brand-logo">
					<h3 class="cv-brand-title">קראוונים <span>Sterckeman</span></h3>
					<p class="cv-brand-tagline">מסורת צרפתית של נוחות ועיצוב, במחיר שווה לכל כיס</p>
				</div>
				<div class="cv-models-grid">
					<div class="cv-model-card" data-anim="fade-up" data-delay="0">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>"
							     alt="Sterckeman Easy Comfort 390" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">קלאסי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Easy Comfort 390</h4>
							<p class="cv-model-desc">דגם כניסה משתלם עם פריסה פתוחה ומטבח מלא — אידיאלי למתחילים.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>4 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>5.5 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪95,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.08">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>"
							     alt="Sterckeman Starlett 470 CP" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-badge">פופולרי</span>
								<span class="cv-model-tag">משפחתי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Starlett 470 CP</h4>
							<p class="cv-model-desc">פריסה חכמה למשפחה — מיטות נפרדות לילדים ופינת אוכל מרווחת.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>5 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>6.4 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪130,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.16">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (5).jpeg' ) ); ?>"
							     alt="Sterckeman Alizé 495 LJ" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">יוקרה</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Alizé 495 LJ</h4>
							<p class="cv-model-desc">דגם דגל עם גימורים יוקרתיים, מערכת בידוד מתקדמת ומקלחת מלאה.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>6 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>6.7 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪165,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ── Brand: Tabbert ── -->
			<div class="cv-brand-block" data-anim="fade-up">
				<div class="cv-brand-head">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/tabbert.png' ) ); ?>" alt="Tabbert" class="cv-brand-logo">
					<h3 class="cv-brand-title">קראוונים <span>Tabbert</span></h3>
					<p class="cv-brand-tagline">פרימיום גרמני — סטנדרט גבוה של עיצוב, גימור וטכנולוגיה</p>
				</div>
				<div class="cv-models-grid">
					<div class="cv-model-card" data-anim="fade-up" data-delay="0">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (6).jpeg' ) ); ?>"
							     alt="Tabbert Pantiero 490 DM" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">קומפקטי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Pantiero 490 DM</h4>
							<p class="cv-model-desc">דגם כניסה לעולם הפרימיום — קל לגרירה עם מפרט גבוה לאורך כל הקרוואן.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>4 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>6.6 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪175,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.08">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>"
							     alt="Tabbert DaVinci 550 E" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-badge">פופולרי</span>
								<span class="cv-model-tag">משפחתי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>DaVinci 550 E</h4>
							<p class="cv-model-desc">קרוואן משפחתי עם תא שינה הורים נפרד, מטבח מורחב וסלון מרווח.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>5 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>7.3 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪215,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.16">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>"
							     alt="Tabbert Rossini 590 DM" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-badge cv-model-badge--premium">פלאגשיפ</span>
								<span class="cv-model-tag">יוקרה</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Rossini 590 DM</h4>
							<p class="cv-model-desc">דגם הדגל של Tabbert — חלל יוקרתי, חומרים מובחרים ומפרט מלא.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>6 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>7.8 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪260,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- ── Brand: Knaus ── -->
			<div class="cv-brand-block" data-anim="fade-up">
				<div class="cv-brand-head">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo-knaus-mobile.png' ) ); ?>" alt="Knaus" class="cv-brand-logo">
					<h3 class="cv-brand-title">קראוונים <span>Knaus</span></h3>
					<p class="cv-brand-tagline">חדשנות ועיצוב מודרני — קרוואנים לכל אורח חיים</p>
				</div>
				<div class="cv-models-grid">
					<div class="cv-model-card" data-anim="fade-up" data-delay="0">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>"
							     alt="Knaus Travelino 380 QL" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">קומפקטי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Travelino 380 QL</h4>
							<p class="cv-model-desc">קרוואן קל משקל עם עיצוב חדשני — חוסך דלק וקל לגרירה אפילו ברכב פרטי.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>4 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>5.6 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪120,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.08">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>"
							     alt="Knaus Sport 500 EU" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-badge">פופולרי</span>
								<span class="cv-model-tag">קלאסי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>Sport 500 EU</h4>
							<p class="cv-model-desc">דגם רב־תכליתי עם פריסה גמישה — מתאים לזוגות, משפחות ולחופשות ארוכות.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>5 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>6.8 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪150,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>

					<div class="cv-model-card" data-anim="fade-up" data-delay="0.16">
						<div class="cv-model-img-wrap">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>"
							     alt="Knaus SüdWind 540 UE" class="cv-model-img">
							<div class="cv-model-badges">
								<span class="cv-model-tag">משפחתי</span>
							</div>
						</div>
						<div class="cv-model-body">
							<h4>SüdWind 540 UE</h4>
							<p class="cv-model-desc">קרוואן משפחתי עם פריסה מודרנית, חלל אחסון נדיב וגימור פרימיום.</p>
							<div class="cv-model-specs">
								<div class="cv-spec"><i class="fa-solid fa-bed"></i><span>5 מקומות</span></div>
								<div class="cv-spec"><i class="fa-solid fa-ruler-combined"></i><span>7.1 מ׳</span></div>
								<div class="cv-spec"><i class="fa-regular fa-calendar"></i><span>2026</span></div>
							</div>
							<div class="cv-model-footer">
								<span class="cv-model-price">החל מ-₪180,000 <small>+ מע״מ</small></span>
								<a href="#contact" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- ══ שאלות ותשובות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
