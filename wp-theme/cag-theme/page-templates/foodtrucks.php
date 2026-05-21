<?php
/**
 * Template Name: Foodtrucks
 *
 * Ported from the static prototype's pages/foodtrucks/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ מקטע דגמים ══ -->
	<section class="section ft-models-section" id="models">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-content" data-anim="fade-right">
					<h2>פודטראקים <span class="gradient-text">שנבנים לפי המפרט שלכם</span></h2>
					<p class="ft-split-lead">פודטראק אינו רק מבנה — הוא יחידה תפעולית שלמה שנבנתה לפעול בעומס יומיומי, באירועים, בשווקים ובכל מקום שעסקי המזון מגיעים אליו. א.ג קראוונים מתמחים בדיוק בזה: כל פודטראק מתוכנן ממאפס לפי המפרט והצרכים של העסק — לא לפי קטלוג.</p>
					<p class="ft-split-body">כל פודטראק שאנחנו בונים כולל מערכות חשמל, מים, אוורור, ציוד מטבח ואינטגרציה עם מיתוג חיצוני — הכל לפי דרישות הלקוח. הניסיון בעבודה עם עסקים, יזמים ורשויות מאפשר לנו לספק פתרונות מהירים, אמינים ומדויקים לכל סוג עסק.</p>
					<ul class="bullets">
						<li><i class="fa-solid fa-check"></i><span>עמידה בתקני משרד הבריאות</span></li>
						<li><i class="fa-solid fa-check"></i><span>ייצור מקומי כחול לבן ב-100%</span></li>
						<li><i class="fa-solid fa-check"></i><span>התאמה אישית לציוד ולמיתוג העסק</span></li>
						<li><i class="fa-solid fa-check"></i><span>אספקה מהירה ועמידה בלוחות זמנים</span></li>
					</ul>
					<a href="#contact" class="btn btn-primary">קבלו הצעת מחיר לפודטראק שלכם <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="ft-split-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>"
					     alt="פודטראק של א.ג קראוונים" class="ft-split-img">
				</div>
			</div>
		</div>
	</section>

	<!-- ══ מאפיינים בהתאמה אישית ══ -->
	<section class="section ft-features-section" id="features">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>מאפיינים <span class="gradient-text">בהתאמה אישית</span></h2>
				<p>כל פוד טראק נבנה בהתאמה מדויקת לצרכי הלקוח — מהמטבח ועד הגרפיקה החיצונית</p>
			</div>

			<div class="ft-features-grid">
				<div class="ft-feature" data-anim="fade-up" data-delay="0">
					<div class="ft-feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
					<h4>עמידות ואיכות</h4>
					<p>חומרי גלם מאושרים למגע עם מזון, עמידים בתנאי שטח ובשימוש אינטנסיבי יומיומי.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.08">
					<div class="ft-feature-icon"><i class="fa-solid fa-sliders"></i></div>
					<h4>התאמה אישית מלאה</h4>
					<p>תכנון הפריסה הפנימית, בחירת ציוד, מיתוג חיצוני — הכל לפי הצרכים שלכם.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.16">
					<div class="ft-feature-icon"><i class="fa-solid fa-certificate"></i></div>
					<h4>עמידה בתקנות הבריאות</h4>
					<p>הפוד טראק מגיע מוכן לקבלת רישיון עסק ועומד בדרישות משרד הבריאות.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0">
					<div class="ft-feature-icon"><i class="fa-solid fa-bolt"></i></div>
					<h4>אספקה מהירה</h4>
					<p>זמן ייצור של 6–10 שבועות בלבד, עם עדכונים שוטפים לאורך כל תהליך הבנייה.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.08">
					<div class="ft-feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
					<h4>ניידות מלאה</h4>
					<p>מבנים ניידים וגם נייחים — לפי הצורך. קל לגרור, קל להתקין, קל להפעיל.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.16">
					<div class="ft-feature-icon"><i class="fa-solid fa-headset"></i></div>
					<h4>ליווי מקצועי</h4>
					<p>צוות מקצועי מלווה אתכם מהתכנון, דרך הייצור ועד ההפעלה הראשונה בשטח.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ מיני קונטקט ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ פוד טראקים לעסקים ══ -->
	<section class="section ft-businesses-section" id="businesses">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-content" data-anim="fade-right">
					<h2>פוד טראקים <span class="gradient-text">לעסקים</span></h2>
					<p class="ft-split-lead">הפוד טראק הוא אחד הפתרונות החכמים והמשתלמים ביותר לעסקי מזון היום. ניידות, מיתוג ועלויות תפעול נמוכות — שילוב מנצח.</p>
					<ul class="bullets">
						<li><i class="fa-solid fa-check"></i><span>ניידות לאירועים, שווקים ופסטיבלים</span></li>
						<li><i class="fa-solid fa-check"></i><span>מיתוג מלא על פני המבנה כולו</span></li>
						<li><i class="fa-solid fa-check"></i><span>עלויות תפעול נמוכות בהרבה ממסעדה קבועה</span></li>
						<li><i class="fa-solid fa-check"></i><span>ליווי בקבלת אישורי משרד הבריאות</span></li>
					</ul>
					<a href="#contact" class="btn btn-primary">קבלו הצעת מחיר ללא עלות <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="ft-split-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>"
					     alt="פוד טראק לעסקים" class="ft-split-img">
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פוד טראקים לעיריות ורשויות ══ -->
	<section class="section ft-municipalities-section" id="municipalities">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-media" data-anim="fade-right">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>"
					     alt="פוד טראק לעיריות ורשויות" class="ft-split-img">
				</div>
				<div class="ft-split-content" data-anim="fade-left">
					<h2>פוד טראקים <span class="gradient-text">לעיריות ורשויות</span></h2>
					<p class="ft-split-lead">פתרונות מקיפים לרשויות מקומיות — מאירועי ציבור ועד פתרונות קבע לשטחים ציבוריים.</p>
					<ul class="bullets">
						<li><i class="fa-solid fa-check"></i><span>עיריות ומועצות מקומיות</span></li>
						<li><i class="fa-solid fa-check"></i><span>אירועי ציבור ופסטיבלים</span></li>
						<li><i class="fa-solid fa-check"></i><span>מוסדות חינוך וקמפוסים</span></li>
						<li><i class="fa-solid fa-check"></i><span>שווקים עירוניים קבועים וזמניים</span></li>
					</ul>
					<a href="#contact" class="btn btn-primary">דברו איתנו על הפרויקט שלכם <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פוד טראקים כמבנים משלימים ══ -->
	<section class="section ft-complementary-section" id="complementary">
		<div class="container">
			<div class="ft-split ft-split--reverse">
				<div class="ft-split-media" data-anim="fade-right">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>"
					     alt="פוד טראק כמבנה משלים" class="ft-split-img">
				</div>
				<div class="ft-split-content" data-anim="fade-left">
					<h2>פוד טראקים <span class="gradient-text">כמבנים משלימים</span></h2>
					<p class="ft-split-sub">לינה, חינוך ותיירות</p>
					<p class="ft-split-lead">פוד טראקים כיחידות קבועות המשלימות מתחמים קיימים — פתרון אידיאלי להוספת שירותי מזון ומכירה ללא בנייה יקרה.</p>
					<div class="ft-use-tags">
						<span class="ft-use-tag">מתחמי לינה ונופש</span>
						<span class="ft-use-tag">כיתות לימוד</span>
						<span class="ft-use-tag">מרכזי ספורט</span>
						<span class="ft-use-tag">מתחמי תיירות</span>
						<span class="ft-use-tag">קמפינגים</span>
					</div>
					<a href="#contact" class="btn btn-primary">לייעוץ ראשוני ללא עלות <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ גלריה ══ -->
	<section class="section ft-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>הגלריה <span class="gradient-text">שלנו</span></h2>
				<p>מבחר פרוייקטים שביצענו עבור לקוחות ברחבי הארץ</p>
			</div>

			<div class="ft-carousel-wrap" data-anim="fade-up">
				<div class="ft-carousel" id="ft-carousel">
					<div class="ft-carousel-track" id="ft-carousel-track">
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>" alt="פרויקט פוד טראק 1" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>" alt="פרויקט פוד טראק 2" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>" alt="פרויקט פוד טראק 3" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>" alt="פרויקט פוד טראק 4" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>" alt="פרויקט פוד טראק 5" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (5).jpeg' ) ); ?>" alt="פרויקט פוד טראק 6" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (6).jpeg' ) ); ?>" alt="פרויקט פוד טראק 7" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
						<div class="ft-carousel-slide">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>" alt="פרויקט פוד טראק 8" draggable="false">
							<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
						</div>
					</div>
				</div>
				<button class="ft-car-arrow ft-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
				<button class="ft-car-arrow ft-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
			</div>
			<div class="ft-car-dots" id="ft-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ שאלות ותשובות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<!-- ══ Lightbox ══ -->
<div class="ft-lightbox" id="ft-lightbox" role="dialog" aria-modal="true" aria-hidden="true">
	<button class="ft-lb-close" aria-label="סגור"><i class="fa-solid fa-xmark"></i></button>
	<button class="ft-lb-arrow ft-lb-prev" aria-label="תמונה קודמת"><i class="fa-solid fa-chevron-right"></i></button>
	<div class="ft-lb-img-wrap">
		<img class="ft-lb-img" id="ft-lb-img" src="" alt="">
	</div>
	<button class="ft-lb-arrow ft-lb-next" aria-label="תמונה הבאה"><i class="fa-solid fa-chevron-left"></i></button>
	<div class="ft-lb-counter" id="ft-lb-counter"></div>
</div>

<?php
get_footer();
