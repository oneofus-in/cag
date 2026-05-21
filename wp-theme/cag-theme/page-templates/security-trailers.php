<?php
/**
 * Template Name: Security Trailers
 *
 * Ported from the static prototype's pages/security-trailers/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ גלריה ══ -->
	<section class="section st-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>נגררים שמותאמים <span class="gradient-text">לצרכים מבצעיים</span></h2>
				<p>א.ג קראוונים מתמחה בתכנון וייצור נגררים ביטחוניים לגופי הביטחון. הפתרונות שלנו מיועדים לצבא, משטרה, יחידות שדה ולוגיסטיקה — תוך עמידה בדרישות ביטחוניות קפדניות ופעילות אמינה בכל תנאי שטח.</p>
			</div>

			<div class="st-carousel-wrap" data-anim="fade-up">
				<div class="st-carousel" id="st-carousel">
					<div class="st-carousel-track" id="st-carousel-track">
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
					</div>
				</div>
				<button class="st-car-arrow st-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button class="st-car-arrow st-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
			</div>
			<div class="st-car-dots" id="st-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ שימושים ייעודיים ══ -->
	<section class="section st-use-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>שימושים ייעודיים <span class="gradient-text">למגזר הביטחוני</span></h2>
				<p>הנגררים שלנו מותאמים למגוון ייעודים מבצעיים — כל נגרר מתוכנן מאפס סביב המשימה הספציפית</p>
			</div>

			<div class="st-use-grid">
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
			</div>
		</div>
	</section>

	<!-- ══ נגררים בהתאמה למפרט הביטחוני ══ -->
	<section class="section st-intro-section" id="about">
		<div class="container">
			<div class="st-intro">
				<div class="st-intro-content" data-anim="fade-right">
					<h2>נגררים ביטחוניים <span class="gradient-text">שנבנים למציאות השטח</span></h2>
					<p class="st-intro-lead">נגרר ביטחוני אינו רק קרון — הוא מערכת תפעולית שלמה שנבנתה לפעול בתנאי שטח קיצוניים, תחת לחץ מבצעי ועם דרישות טכניות קפדניות. א.ג קראוונים מתמחה בדיוק בזה: כל נגרר מתוכנן ממאפס לפי מפרט הלקוח — לא לפי קטלוג.</p>
					<p class="st-intro-body">כל נגרר שאנחנו בונים כולל מערכות חשמל, תאורה, בידוד תרמי, אוורור ואינטגרציה עם ציוד ספציפי — הכל לפי דרישות הפרויקט. ניסיון של שנים בעבודה עם גורמים ביטחוניים מאפשר לנו לספק פתרונות מהירים, אמינים ומדויקים לכל משימה.</p>
					<ul class="bullets">
						<li><i class="fa-solid fa-check"></i><span>עמידה בתקנים ומפרטים ביטחוניים</span></li>
						<li><i class="fa-solid fa-check"></i><span>ייצור מקומי כחול לבן ב-100%</span></li>
						<li><i class="fa-solid fa-check"></i><span>אינטגרציה מלאה עם ציוד ומערכות הלקוח</span></li>
						<li><i class="fa-solid fa-check"></i><span>אספקה מהירה ועמידה בלוחות זמנים</span></li>
					</ul>
					<a href="#contact" class="btn btn-primary">קבלו הצעת מחיר לפרויקט שלכם <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="st-intro-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>"
					     alt="נגרר ביטחוני של א.ג קראוונים" class="st-intro-img">
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
