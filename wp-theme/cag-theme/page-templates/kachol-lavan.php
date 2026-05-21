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
	<section class="section" id="models">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>הדגמים שלנו בא.ג קראוונים</h2>
			</div>

			<div class="kl-models-intro" data-anim="fade-up">
				<p>מגוון מבני לינה ומתחמים תוכננו מתוך הבנה אמיתית של השטח – עם גמישות מלאה להתאמה אישית לפי צורך, שימוש ותקציב, <strong>כל הדגמים מיוצרים כחול לבן, בייצור מקומי מוקפד</strong>, המאפשר שליטה מלאה בתהליך, זמינות גבוהה ויכולת לבצע התאמות מדויקות לאורך הדרך הצוות שלנו מלווה את הפרויקט משלב התכנון ועד סיום הבנייה, עם זמינות גבוהה וחשיבה פרקטית המביאה תוצאות בשטח</p>
				<div class="kl-intro-cta">
					<a href="<?php echo esc_url( home_url( '/#models' ) ); ?>" class="btn btn-primary">הכירו את הדגמים שלנו <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>

			<div class="models-grid">
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
			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

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

	<!-- ══ שאלות נפוצות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

	<!-- ══ ידע, ניסיון וביצוע ══ -->
	<section class="section kl-about-section" style="display:none;">
		<div class="container">
			<div class="about-split">
				<div class="about-content" data-anim="fade-right">
					<h2 style="font-weight:400;">א.ג קראוונים – ידע, ניסיון וביצוע המתחברים <strong>למתחם</strong> אחד שלם</h2>
					<p>בא.ג קראוונים פועלים כבר למעלה מ־20 שנה בתחום בניית מבנים והתאמה אישית, עם היכרות עמוקה של צרכי השטח והדגשים הנדרשים בפרויקטים מורכבים. החברה מתמחה בתכנון וייצור מבני לינה ומתחמים בפריסה רחבה, <strong>עבור יזמים, רשויות ולקוחות פרטיים, תוך שילוב בין ידע הנדסי, חשיבה פרקטית ויכולת ביצוע מוכחת.</strong></p>
					<p>כל המבנים שלנו מיוצרים כחול לבן, בייצור מקומי מוקפד ובהתאמה מדויקת לכל פרויקט. הניסיון המצטבר והעבודה על מגוון רחב של פרויקטים ברחבי הארץ <strong>מאפשרים לנו בא.ג קראוונים להציע פתרונות מדויקים, אמינים ומוכנים לשטח – משלב התכנון ועד ההקמה.</strong></p>
					<a href="#contact" class="btn btn-primary" style="align-self:flex-start;">לקביעת פגישת ייעוץ ללא עלות <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="about-img" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/aboutimage.png' ) ); ?>" alt="אודותינו" style="width:100%;aspect-ratio:542/505;border-radius:var(--radius);object-fit:cover;display:block;">
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פרויקטים שמדברים בעד עצמם ══ -->
	<section class="section kl-projects-section" style="display:none;">
		<div class="container">
			<div class="kl-projects-deco" data-anim="fade-up" aria-hidden="true">
				<i class="fa-solid fa-house"></i>
				<i class="fa-solid fa-house-chimney"></i>
			</div>

			<div class="section-head" data-anim="fade-up">
				<span class="eyebrow">הפרויקטים שלנו</span>
				<h2>פרויקטים שמדברים בעד עצמם</h2>
				<p>הפרויקטים שלנו בא.ג קראוונים מציגים מגוון רחב של פתרונות, בהתאמה לצרכים שונים ולשימושים רבים. מבני לינה בודדים, פתרונות ניידים ונייחים וכן מתחמי נופש ואירוח שלמים המשלבים מספר יחידות תחת תכנון אחיד ומדוייק.</p>
			</div>

			<div class="projects-grid">
				<div class="project-card" data-anim="zoom-in" data-delay="0">
					<div class="img-placeholder sq"><span>להשלים תמונות נוספות</span></div>
				</div>
				<div class="project-card" data-anim="zoom-in" data-delay="0.08">
					<div class="img-placeholder sq"><span>להשלים תמונות נוספות</span></div>
				</div>
				<div class="project-card" data-anim="zoom-in" data-delay="0.16">
					<div class="img-placeholder sq"><span>להשלים תמונות נוספות</span></div>
				</div>
				<div class="project-card" data-anim="zoom-in" data-delay="0.24">
					<div class="img-placeholder sq"><span>להשלים תמונות נוספות</span></div>
				</div>
				<div class="project-card" data-anim="zoom-in" data-delay="0.32">
					<div class="img-placeholder sq"><span>להשלים תמונות נוספות</span></div>
				</div>
			</div>

			<div class="section-cta" data-anim="fade-up">
				<a href="<?php echo esc_url( home_url( '/#models' ) ); ?>" class="btn btn-primary">הכירו את הדגמים שלנו <i class="fa-solid fa-arrow-left"></i></a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
