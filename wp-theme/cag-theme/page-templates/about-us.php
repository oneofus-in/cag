<?php
/**
 * Template Name: About Us
 *
 * Ported from the static prototype's pages/about-us/index.html.
 *
 * To use: in wp-admin, create a Page (any slug, any title) and pick
 * "About Us" from the Template dropdown in the page sidebar.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<?php if ( have_rows( 'au_rows' ) ) : ?>
		<?php
		$cag_au_i = 0;
		while ( have_rows( 'au_rows' ) ) :
			the_row();
			$cag_au_eyebrow    = get_sub_field( 'eyebrow' );
			$cag_au_heading    = get_sub_field( 'heading' );
			$cag_au_highlight  = get_sub_field( 'heading_highlight' );
			$cag_au_body       = get_sub_field( 'body' );
			$cag_au_tagline    = get_sub_field( 'tagline' );
			$cag_au_image      = get_sub_field( 'image' );
			$cag_au_reverse    = ( 1 === $cag_au_i % 2 ); // auto-zigzag: every other row flips.
			$cag_au_sec        = 'section au-row-section' . ( $cag_au_reverse ? ' au-row-section--alt' : '' );
			$cag_au_row        = 'au-row' . ( $cag_au_reverse ? ' au-row--reverse' : '' );
			$cag_au_text_anim  = $cag_au_reverse ? 'fade-left' : 'fade-right';
			$cag_au_media_anim = $cag_au_reverse ? 'fade-right' : 'fade-left';
			?>
			<section class="<?php echo esc_attr( $cag_au_sec ); ?>">
				<div class="container">
					<div class="<?php echo esc_attr( $cag_au_row ); ?>">
						<div class="au-row-text" data-anim="<?php echo esc_attr( $cag_au_text_anim ); ?>">
							<?php if ( $cag_au_eyebrow ) : ?><span class="eyebrow"><?php echo esc_html( $cag_au_eyebrow ); ?></span><?php endif; ?>
							<?php if ( $cag_au_heading || $cag_au_highlight ) : ?>
								<h2><?php echo esc_html( $cag_au_heading ); ?><?php if ( $cag_au_highlight ) : ?> <span class="gradient-text"><?php echo esc_html( $cag_au_highlight ); ?></span><?php endif; ?></h2>
							<?php endif; ?>
							<?php echo $cag_au_body; // ACF wysiwyg — trusted, already-formatted HTML. ?>
							<?php if ( $cag_au_tagline ) : ?><p class="au-tagline"><?php echo esc_html( $cag_au_tagline ); ?></p><?php endif; ?>
						</div>
						<div class="au-row-media" data-anim="<?php echo esc_attr( $cag_au_media_anim ); ?>">
							<?php if ( $cag_au_image ) { echo wp_get_attachment_image( $cag_au_image, 'large', false, array( 'loading' => 'lazy' ) ); } ?>
						</div>
					</div>
				</div>
			</section>
			<?php
			$cag_au_i++;
		endwhile;
		?>
	<?php else : ?>

	<!-- Row 1 — Intro / who we are -->
	<section class="section au-row-section">
		<div class="container">
			<div class="au-row">
				<div class="au-row-text" data-anim="fade-right">
					<span class="eyebrow">אודות החברה</span>
					<h2>א.ג קראוונים — מקצועיות, ניסיון <span class="gradient-text">ובנייה מקומית</span></h2>
					<p>א.ג קראוונים היא חברה מובילה ומוכרת עם ניסיון של יותר מ-30 שנה בעולם הנגררים. החברה מתמחה בתכנון וייצור מקומי של מבני לינה וקראוונים, בהתאמה אישית ללקוחות פרטיים, לעסקים ולארגונים — ממבנים בודדים ועד מתחמים שלמים.</p>
					<p>בנוסף, א.ג קראוונים מציעה דגמי קרוואנים בייבוא ממיטב המותגים המובילים בעולם, כחלק ממענה מקצועי ומקיף בתחום הקרוואנים והנגררים.</p>
					<p class="au-tagline">אתם חולמים — אנחנו מגשימים.</p>
				</div>
				<div class="au-row-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>" alt="מבנה לינה כחול לבן בייצור א.ג קראוונים" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Row 2 — Mobile structures -->
	<section class="section au-row-section au-row-section--alt">
		<div class="container">
			<div class="au-row au-row--reverse">
				<div class="au-row-text" data-anim="fade-left">
					<span class="eyebrow">כחול לבן</span>
					<h2>מבנים ניידים ונייחים — <span class="gradient-text">כחול-לבן זה כאן</span></h2>
					<p>הסיפור שלנו מתחיל לפני כ-30 שנה עם הקמת א.ג נגררים ווינס בע"מ, המתמחה בבניית נגררים בהתאמה אישית. מהיום הראשון ראינו את החשיבות שבראייה הכוללת — מחזון להלכה, דרך הצרכים והדגשים הקטנים ביותר, ועד ליישום מקומי ומדויק בשטח.</p>
					<p>עם השנים ובמיסוד שעלה הביקוש נוצר א.ג קראוונים בישראל, הקמנו את "א.ג קראוונים" והחלנו בייבוא קרוואנים ממיטב המותגים המובילים בעולם. אלה הפכו במהרה למכרים ואהובים על לקוחותינו. במקביל, התמקצענו בייצור מבני לינה ניידים ונייחים — מבנים בודדים, מתחמי צימרים, מבנים למתחמי אירוח ולהתיישבות, פוד טראקים, שירותים ומקלחות ומוצרים משלימים — והכל בייצור מקומי, כחול-לבן, מוקפד ואיכותי, עם התאמה אישית מלאה לכל לקוח.</p>
					<p><strong>כך א.ג קראוונים משלבת מקומיות, מקצועיות וחדשנות ומובילה את תחום המבנים הניידים והנייחים בישראל לרמה הגבוהה ביותר.</strong></p>
				</div>
				<div class="au-row-media" data-anim="fade-right">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.02.jpeg' ) ); ?>" alt="מבנה לינה נייד תוצרת כחול לבן" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Row 3 — Our values -->
	<section class="section au-row-section">
		<div class="container">
			<div class="au-row">
				<div class="au-row-text" data-anim="fade-right">
					<span class="eyebrow">הערכים שלנו</span>
					<h2>הערכים שלנו <span class="gradient-text">לאורך כל הדרך</span></h2>
					<p>א.ג קראוונים נולדה מתוך ניסיון עשיר ומאהבה גדולה לעולם הנגררים והקרוואנים.</p>
					<p>לצד ייבוא מיטב מותגי הקרוואנים המובילים בעולם, אנו מייצרים בתשומת לב רבה מבנים ניידים ונייחים — מדויקים, איכותיים ובהתאמה אישית מלאה.</p>
					<p>ניסיוננו הרב מאפשר לנו להציע ללקוחותינו קשת רחבה של מבנים ואפשרויות, יכולות טכניות גבוהות וערכים שמלווים אותנו מאז ומתמיד — שירותיות, אנושיות, מקצועיות, זמינות ואמינות.</p>
				</div>
				<div class="au-row-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt="קרוואן באמצע נסיעה" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Row 4 — Knaus-Tabbert -->
	<section class="section au-row-section au-row-section--alt">
		<div class="container">
			<div class="au-row au-row--reverse">
				<div class="au-row-text" data-anim="fade-left">
					<span class="eyebrow">מותג מיובא</span>
					<h2>קצת אודות <span class="gradient-text">Knaus-Tabbert GMBH</span></h2>
					<p>Knaus-Tabbert הגרמנית היא חברה חזקה ומובילה בעולם בתחום הקרוואנים. חברת האם שלה ממוקמת בגרמניה וחברת הבת פועלת בהונגריה.</p>
					<p>החברה הוותיקה הוקמה לפני עשרות שנים, ולזכותה נזקף ניסיון רב בבנייה ובייצור קרוואנים באיכות מעולה וללא פשרות.</p>
					<p>Knaus-Tabbert דוגלת בחדשנות, ובהתאם לכך מייצרת מדי שנה דגמים חדשים של קרוואנים המספקים את המענה האופטימלי לכל חובבי הרגיעה העולמי. בנוסף, החברה קשובה למשובים המתקבלים מלקוחותיה, ובהתאם להם משפרת באופן שוטף הן את הפונקציונאליות והן את הנראות של דגמי הקרוואנים השונים.</p>
					<p>אנו, כנציגיה הבלעדיים של Knaus-Tabbert בישראל, נהנים מכל יתרונות החברה ומציעים אותם ללקוחותינו הרבים והמרוצים.</p>
				</div>
				<div class="au-row-media" data-anim="fade-right">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-side.jpg' ) ); ?>" alt="קרוואן Knaus-Tabbert" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Row 5 — Sterckeman -->
	<section class="section au-row-section">
		<div class="container">
			<div class="au-row">
				<div class="au-row-text" data-anim="fade-right">
					<span class="eyebrow">מותג מיובא</span>
					<h2>וקצת אודות <span class="gradient-text">STERCKEMAN</span></h2>
					<p>"פינת גן עדן קטנה משלך, כמה מטרים ובכל מקום של אושר לכל לקחת לכל מקום" — כך מגדירים את הקרוואנים של חברת STERCKEMAN כבר מעל ל-70 שנה בעולם.</p>
					<p>בשנה האחרונה, החלה א.ג קראוונים בתהליך הבאת המותג היוקרתי STERCKEMAN לארץ הישר מצרפת.</p>
					<p>מדובר במותג מוכר, שהיה מראשוני הקרוואנים שהגיעו לארץ וכעת א.ג קראוונים הפכה לייבואנית הרשמית של המותג המפואר.</p>
					<p>החברה הצרפתית מוכרת ברחבי העולם בזכות המקצועיות, המומחיות והעיצוב הייחודי. STERCKEMAN מייצרת קרוואנים המשלבים בין יכולות טכניות מהגבוהות ביותר, מיומנות ועיצוב צרפתי ייחודי.</p>
					<p>עם המותג הצרפתי והמוכר תחוו חופשה במבנה מאובן, עכשווי וביתי. הקרוואנים של STERCKEMAN יהפכו במהרה, לשותפים החדשים שלכם לחופשות מוצלחות.</p>
				</div>
				<div class="au-row-media" data-anim="fade-left">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-front.jpg' ) ); ?>" alt="קרוואן STERCKEMAN" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>

	<!-- FAQ — shared template part -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
