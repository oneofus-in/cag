<?php
/**
 * Template Name: Security Living
 *
 * Ported from the static prototype's pages/security-living/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ גלריה ══ -->
	<section class="section sl-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>מגורים שמותאמים <span class="gradient-text">לצרכים מבצעיים</span></h2>
				<p>א.ג קראוונים מתמחה בתכנון וייצור מבני לינה ייעודיים לגופי הביטחון. הפתרונות שלנו מיועדים לצבא, משטרה, חיל הרפואה ויחידות שדה — תוך הקפדה על אמינות, בטיחות ותפקוד מלא בתנאים מורכבים.</p>
			</div>

			<div class="sl-carousel-wrap" data-anim="fade-up">
				<div class="sl-carousel" id="sl-carousel">
					<div class="sl-carousel-track" id="sl-carousel-track">
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
					</div>
				</div>
				<button class="sl-car-arrow sl-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button class="sl-car-arrow sl-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
			</div>
			<div class="sl-car-dots" id="sl-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ פתרונות מגורים — use-case cubes ══ -->
	<section class="section sl-use-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>שימושים ייעודיים <span class="gradient-text">למגזר הביטחוני</span></h2>
				<p>מבני הלינה שלנו מותאמים למגוון ייעודים מבצעיים — מגורים קבועים או זמניים, בשטח פתוח או בתוך בסיס</p>
			</div>

			<div class="sl-use-grid">
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
			</div>
		</div>
	</section>

	<!-- ══ מגורים בהתאמה למפרט הביטחוני ══ -->
	<section class="section sl-intro-section" id="about">
		<div class="container">
			<div class="sl-intro">
				<div class="sl-intro-content" data-anim="fade-right">
					<h2>מגורים בטחוניים <span class="gradient-text">שנבנים למציאות השטח</span></h2>
					<p class="sl-intro-lead">מבני לינה לגופי ביטחון אינם קראוונים רגילים — הם מערכות מגורים שלמות שתוכננו לפעול בתנאי שטח קיצוניים, תחת לוחות זמנים לחוצים ועם דרישות טכניות קפדניות. א.ג קראוונים מתמחה בדיוק בזה: בנייה שמתאימה לדרישות הביטחוניות ולא להיפך.</p>
					<p class="sl-intro-body">כל מתחם מגורים שאנחנו מקימים כולל מערכות חשמל, תאורה, אוורור ומיזוג, בידוד תרמי ואקוסטי — הכל לפי מפרט שנגזר מהפרויקט הספציפי. בין אם מדובר בבסיס קבע, אתר אימונים, מוצב שדה או מתחם לינה למשטרה — הפתרון נבנה סביב הצורך.</p>
					<ul class="bullets">
						<li><i class="fa-solid fa-check"></i><span>בידוד תרמי לתנאי קיץ ישראלי קשה</span></li>
						<li><i class="fa-solid fa-check"></i><span>עמידות מבנית גבוהה לשימוש אינטנסיבי</span></li>
						<li><i class="fa-solid fa-check"></i><span>הקמה מהירה — תוך ימים, לא חודשים</span></li>
						<li><i class="fa-solid fa-check"></i><span>התאמה מלאה למפרט הגורם המזמין</span></li>
					</ul>
					<a href="#contact" class="btn btn-primary">קבלו הצעת מחיר לפרויקט שלכם <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="sl-intro-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>"
					     alt="מתחם מגורים בטחוני של א.ג קראוונים" class="sl-intro-img">
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
