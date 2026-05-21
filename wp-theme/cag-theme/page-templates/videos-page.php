<?php
/**
 * Template Name: Videos
 *
 * Ported from the static prototype's pages/videos/index.html.
 *
 * File is named videos-page.php (not videos.php) on purpose: the static
 * body class was "videos-page" and the page CSS scopes its typography reset
 * with `.videos-page h2/h3/h4 { ... }`. The body_class-from-template filter
 * derives the body class from this basename, so naming it videos-page keeps
 * those selectors matching. Template Name shown in the editor is still "Videos".
 *
 * Renders inner-hero only — the static page loaded mini-contact CSS/JS but had
 * no #mini-contact div, so nothing to render there.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Section 1: פוד טראקים ══ -->
	<section class="section vg-section" id="food-trucks">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>פוד טראקים <span class="gradient-text">לרשויות ועסקים</span></h2>
				<p>סרטונים של פוד טראקים שבנינו לעיריות, בתי ספר, גופים עסקיים ויחידים — כל פוד טראק מותאם אישית מקצה לקצה, מהתכנון ועד אספקת הפתרון המוכן לפעילות</p>
			</div>

			<div class="vg-carousel-wrap" data-anim="fade-up">
				<div class="vg-carousel"><div class="vg-carousel-track">

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="פוד טראק ביער מבית א.ג נגררים">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="פוד טראק ביער מבית א.ג נגררים" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">פוד טראק ביער</h3>
						<p class="vg-card-desc">פוד טראק מותאם אישית שתוכנן ונבנה עבור אתר טבע — עמידות, עיצוב ופונקציונליות בשטח</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="כיתת לימוד ופוד טראק לבתי ספר">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="כיתת לימוד ופוד טראק לבתי ספר" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">פוד טראק לבתי ספר</h3>
						<p class="vg-card-desc">פתרון מזון מותאם למוסדות חינוך — שילוב של כיתת לימוד ופוד טראק תחת קורת גג אחת</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="פוד טראק לעירייה – פרויקט מוקם">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="פוד טראק לעירייה" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">פוד טראק לעירייה</h3>
						<p class="vg-card-desc">פרויקט פוד טראק מוקם עבור עירייה — מזון נגיש לציבור עם עיצוב ממותג ופתרון מלא</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="א.ג נגררים פוד טראק בהתאמה אישית">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="פוד טראק בהתאמה אישית" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">פוד טראק בהתאמה אישית</h3>
						<p class="vg-card-desc">סרטון סקירה של פוד טראק שתוכנן ספציפית לצרכי הלקוח — עיצוב, ציוד ופרטים טכניים</p>
					</div>
				</article>

				</div></div>
				<button class="vg-car-arrow vg-car-arrow--prev" type="button" aria-label="הקודם"><i class="fa-solid fa-chevron-right"></i></button>
				<button class="vg-car-arrow vg-car-arrow--next" type="button" aria-label="הבא"><i class="fa-solid fa-chevron-left"></i></button>
				<div class="vg-car-dots" aria-hidden="true"></div>
			</div>
		</div>
	</section>

	<!-- ══ Section 2: קרוואנים ומבני לינה ══ -->
	<section class="section vg-section vg-section--alt" id="caravans">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>קרוואנים <span class="gradient-text">ומבני לינה</span></h2>
				<p>מגוון פרויקטים של קרוואנים מגורים, מבני משרד ניידים ומתחמי לינה — פתרונות שנבנים לפי צרכי הלקוח לשימוש קבוע או זמני</p>
			</div>

			<div class="vg-carousel-wrap" data-anim="fade-up">
				<div class="vg-carousel"><div class="vg-carousel-track">

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="א.ג קרוואנים – הפנינג של קינן קימפינג">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="הפנינג של קינן קימפינג" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">הפנינג קינן קימפינג</h3>
						<p class="vg-card-desc">קרוואנים ומתחמי לינה שנבנו עבור אתר קמפינג — איכות, נוחות ועיצוב מותאם לסביבת הטבע</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="קרוואן מבנה משרד – פתרון מקצה לקצה">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="קרוואן מבנה משרד" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">קרוואן מבנה משרד</h3>
						<p class="vg-card-desc">מבנה משרד נייד ומאובזר — פתרון מהיר להקמה לעסקים וחברות הזקוקים לשטח עבודה גמיש</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="מתחם לינה במרכז הארץ – סיור">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="מתחם לינה במרכז הארץ" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">מתחם לינה במרכז הארץ</h3>
						<p class="vg-card-desc">סיור במתחם לינה מודולרי שהוקם עבור לקוח במרכז הארץ — תכנון, ייצור ואספקה מלאה</p>
					</div>
				</article>

				</div></div>
				<button class="vg-car-arrow vg-car-arrow--prev" type="button" aria-label="הקודם"><i class="fa-solid fa-chevron-right"></i></button>
				<button class="vg-car-arrow vg-car-arrow--next" type="button" aria-label="הבא"><i class="fa-solid fa-chevron-left"></i></button>
				<div class="vg-car-dots" aria-hidden="true"></div>
			</div>
		</div>
	</section>

	<!-- ══ Section 3: מגזר ביטחוני ══ -->
	<section class="section vg-section" id="security">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>מגזר <span class="gradient-text">ביטחוני</span></h2>
				<p>פרויקטים שביצענו עבור גופי ביטחון, צבא ומשטרה — נגררים ביטחוניים, מבני לינה לשטח ופתרונות מגורים ייעודיים לדרישות ביטחוניות קפדניות</p>
			</div>

			<div class="vg-carousel-wrap" data-anim="fade-up">
				<div class="vg-carousel"><div class="vg-carousel-track">

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="א.ג קראוונים – סרטון תדמית">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="א.ג קראוונים סרטון תדמית" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">סרטון תדמית</h3>
						<p class="vg-card-desc">הכירו את א.ג קראוונים — ניסיון, מומחיות ופתרונות מגוונים למגזר הביטחוני ולסקטור הפרטי</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="א.ג נגררים מרפאה ניידת לחיילים">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="מרפאה ניידת לחיילים" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">מרפאה ניידת לחיילים</h3>
						<p class="vg-card-desc">נגרר רפואי מצויד שתוכנן לצרכי חיל הרפואה בשטח — טיפול, פינוי ואספקת ציוד רפואי</p>
					</div>
				</article>

				<article class="vg-card">
					<div class="vid-yt-player"
					     data-video-id="OkAlWJ4C_Fs"
					     data-title="נגרר ביטחוני – פיקוד ושליטה">
						<img class="vid-yt-thumb"
						     src="https://i.ytimg.com/vi/OkAlWJ4C_Fs/hqdefault.jpg"
						     alt="נגרר ביטחוני פיקוד ושליטה" loading="lazy">
						<button class="vid-yt-play-btn" type="button" aria-label="הפעלת סרטון">
							<svg viewBox="0 0 68 48" aria-hidden="true">
								<path class="vid-yt-play-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
								<polygon class="vid-yt-play-arrow" points="45,24 27,14 27,34"></polygon>
							</svg>
						</button>
					</div>
					<div class="vg-card-body">
						<h3 class="vg-card-title">נגרר פיקוד ושליטה</h3>
						<p class="vg-card-desc">עמדת פיקוד ניידת לבקרת מבצע ותיאום יחידות — תקשורת, ציוד ומערכות ניהול משולבות</p>
					</div>
				</article>

				</div></div>
				<button class="vg-car-arrow vg-car-arrow--prev" type="button" aria-label="הקודם"><i class="fa-solid fa-chevron-right"></i></button>
				<button class="vg-car-arrow vg-car-arrow--next" type="button" aria-label="הבא"><i class="fa-solid fa-chevron-left"></i></button>
				<div class="vg-car-dots" aria-hidden="true"></div>
			</div>
		</div>
	</section>

</main>

<!-- ══ Lightbox ══ -->
<div class="vid-lightbox" id="vid-lightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="נגן וידאו">
	<button class="vid-lb-close" type="button" aria-label="סגור">
		<i class="fa-solid fa-xmark"></i>
	</button>
	<div class="vid-lb-stage">
		<div class="vid-lb-frame" id="vid-lb-frame"></div>
		<h3 class="vid-lb-title" id="vid-lb-title"></h3>
	</div>
</div>

<?php
get_footer();
