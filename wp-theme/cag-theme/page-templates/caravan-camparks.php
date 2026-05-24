<?php
/**
 * Template Name: Caravan Camparks
 *
 * Ported from the static prototype's pages/caravan-camparks/index.html.
 *
 * Content driven by per-page ACF (group_cag_caravan_camparks.json, 2 tabs):
 *   Tab 1 "מבוא"  — badge image, stamp text, split heading, wysiwyg body.
 *   Tab 2 "רשימת חניונים" — cc_campsites repeater:
 *     media_type (radio: maps|image), map_query or image, heading, body (wysiwyg),
 *     meta (nested repeater: icon + label), cta (link).
 * Zigzag (is-reverse) auto-derived from row index — not a field.
 * Closing section stays hardcoded (static summary — not content-managed).
 * Fallback = original hardcoded content (renders identically until populated).
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Intro ══ -->
	<?php
	$cc_intro_img  = cag_field( 'cc_intro_image' );
	$cc_intro_stmp = cag_field( 'cc_intro_stamp', "חניוני קרוואנים\nמומלצים" );
	$cc_intro_head = cag_field( 'cc_intro_heading',   'כל חניוני הקרוואנים' );
	$cc_intro_hl   = cag_field( 'cc_intro_highlight', 'ברחבי הארץ' );
	$cc_intro_body = cag_field( 'cc_intro_body' );
	?>
	<section class="cc-intro">
		<div class="container">
			<div class="cc-intro-grid" data-anim="fade-up">
				<div class="cc-intro-badge">
					<?php if ( $cc_intro_img ) : ?>
						<?php echo wp_get_attachment_image( $cc_intro_img, 'medium', false, array( 'alt' => esc_attr( strip_tags( $cc_intro_stmp ) ) ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/aboutimage.png' ) ); ?>" alt="חניוני קרוואנים מומלצים">
					<?php endif; ?>
					<span class="cc-intro-stamp"><?php echo nl2br( esc_html( $cc_intro_stmp ) ); ?></span>
				</div>
				<div class="cc-intro-text">
					<h2><?php echo esc_html( $cc_intro_head ); ?> <span class="gradient-text"><?php echo esc_html( $cc_intro_hl ); ?></span></h2>
					<?php if ( $cc_intro_body ) : ?>
						<?php echo $cc_intro_body; ?>
					<?php else : ?>
						<p>החלטתם לצאת לטיול עם הקרוואן הביתי? נהדר! ריכזנו עבורכם את החניונים האיכותיים ביותר בארץ – לא רק במובן של חניית רכב פשוטה, אלא חניונים מאובזרים עם חיבורי חשמל ומים, שירותים, מקלחות וכל מה שתצטרכו לשהות נעימה.</p>
						<p>חניוני הקרוואנים שריכזנו פרוסים ברחבי הארץ – מהגליל בצפון, דרך מרכז הארץ ועד הנגב והערבה בדרום. כל אתר מציע חוויה ייחודית: מקמפינג בחיק הטבע ועד יחידות אירוח יוקרתיות.</p>
						<p class="cc-intro-note"><strong>למעוניינים ברשימה של חניוני קרוואנים מומלצים על ידי הארץ</strong> – ליצירת קשר עמנו את הטופס</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ Camparks list ══ -->
	<section class="cc-list-section">
		<div class="container">

		<?php if ( function_exists( 'have_rows' ) && have_rows( 'cc_campsites' ) ) : ?>

			<?php $cc_i = 0; while ( have_rows( 'cc_campsites' ) ) : the_row(); ?>
				<?php
				$cc_media    = get_sub_field( 'media_type' ) ?: 'maps';
				$cc_mapembed = get_sub_field( 'map_embed' );
				$cc_img_id   = get_sub_field( 'image' );
				$cc_heading  = get_sub_field( 'heading' );
				$cc_body     = get_sub_field( 'body' );
				$cc_cta      = get_sub_field( 'cta' );
				$cc_reverse  = ( $cc_i % 2 !== 0 );
				?>
				<article class="cc-row<?php echo $cc_reverse ? ' is-reverse' : ''; ?>" data-anim="fade-up">
					<div class="cc-row-media">
						<?php if ( $cc_media === 'image' && $cc_img_id ) : ?>
							<?php echo wp_get_attachment_image( $cc_img_id, 'large', false, array( 'loading' => 'lazy', 'alt' => esc_attr( $cc_heading ) ) ); ?>
						<?php elseif ( $cc_mapembed && preg_match( '/src=["\']([^"\']+)["\']/', $cc_mapembed, $cc_src_m ) ) : ?>
							<iframe
								src="<?php echo esc_url( $cc_src_m[1] ); ?>"
								loading="lazy"
								allowfullscreen
								referrerpolicy="no-referrer-when-downgrade"
								title="<?php echo esc_attr( $cc_heading ); ?>"></iframe>
						<?php endif; ?>
					</div>
					<div class="cc-row-text">
						<?php if ( $cc_heading ) : ?>
							<h3><?php echo esc_html( $cc_heading ); ?></h3>
						<?php endif; ?>
						<?php if ( $cc_body ) : ?>
							<?php echo $cc_body; ?>
						<?php endif; ?>
						<?php if ( have_rows( 'meta' ) ) : ?>
							<p class="cc-meta-block">
								<?php while ( have_rows( 'meta' ) ) : the_row(); ?>
									<span><i class="<?php echo esc_attr( get_sub_field( 'icon' ) ); ?>"></i> <?php echo esc_html( get_sub_field( 'label' ) ); ?></span>
								<?php endwhile; ?>
							</p>
						<?php endif; ?>
						<?php if ( $cc_cta && ! empty( $cc_cta['url'] ) ) : ?>
							<a href="<?php echo esc_url( $cc_cta['url'] ); ?>"<?php echo ! empty( $cc_cta['target'] ) ? ' target="' . esc_attr( $cc_cta['target'] ) . '" rel="noopener"' : ''; ?> class="cc-cta">
								<?php echo esc_html( $cc_cta['title'] ?: 'לתאום ביקור לחצו כאן' ); ?> <i class="fa-solid fa-arrow-left"></i>
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php $cc_i++; endwhile; ?>

		<?php else : ?>

			<!-- 1 — Kfar Hanokdim -->
			<article class="cc-row" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=כפר+הנוקדים&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="כפר הנוקדים"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חוויה מדברית בכפר הנוקדים</h3>
					<p>בכפר הנוקדים שבמדבר יהודה תמצאו חניון קרוואנים נוח, מוקף בנופים מדבריים מרהיבים, בצד עץ ושיח בעל אופי בדואי. החניון מתאים לאוהלים, אוהל ומבני לינה ייחודיים, וגם מאפשר חנייה לקרוואנים. ניתן ליהנות מאווירה אותנטית, מתחומי ארוחה משותפים והפעלות שטח.</p>
					<p>בחניון הקרוואנים ובמתחם הכללי תוכלו ליהנות ממגוון אטרקציות בנגב כמו רכיבה על גמלים, ביקור באוהל בדואי, סדנאות יצירה, אירוח לקבוצות וטיולי שטח מודרכים. החוויה משלבת אירוח כפרי עם פעילויות לכל המשפחה.</p>
					<h4 class="cc-subtitle">מה כולל אזור הקרוואן?</h4>
					<ul class="cc-bullets">
						<li><i class="fa-solid fa-check"></i> אזורי חנייה מוצלים (באנגרים בכל קראוון)</li>
						<li><i class="fa-solid fa-check"></i> אזורי לחניית לרכב</li>
						<li><i class="fa-solid fa-check"></i> חיבורי חשמל וכן חיבור למים מבונן מקלחות</li>
						<li><i class="fa-solid fa-check"></i> פינות ישיבה משותפות לבישול ובחירת בקלילות, כיתת הסעודה, מטבח טרי וכלי אוכל</li>
						<li><i class="fa-solid fa-check"></i> ברזים עם מי שתייה</li>
						<li><i class="fa-solid fa-check"></i> שירותים ובלילה</li>
						<li><i class="fa-solid fa-check"></i> מקלחות חמות, פינת רחצה ועירונית מדגלי מים</li>
					</ul>
					<p class="cc-meta">לבירור פרטים נוספים על חניון הנוקדים – קראו את הפרטים הבאים.</p>
				</div>
			</article>

			<!-- 2 — Khurshat Tal -->
			<article class="cc-row is-reverse" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=חורשת+טל&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="גן לאומי חורשת טל"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חניון קרוואנים בגן הלאומי חורשת טל</h3>
					<p>חניון קרוואנים אחד הגדולים והמרהיבים בארץ, בתוך גן לאומי חורשת טל, על נחל הדן. החניון מצוי בלב הגליל העליון בסמיכות לעצי תאשור עתיקים, מעיינות צוננים ואפיקי מים. אווירה ייחודית במיוחד עם הצללה טבעית עוצרת נשימה.</p>
					<p>החניון כולל כ-150 עמדות חניה זמן לפי נקודה – פרישה ברחבי הגן, נגישות נוחה לקראוונים גדולים ויחידות לינה, חיבור לחשמל ולמים, תאי שירותים ומקלחות, ברזים, שולחנות פיקניק ומקומות לבישול. במתחם פועלים גם אזורי משחקים לילדים, קיוסק ומסעדה.</p>
					<p class="cc-meta">לפרטים נוספים והזמנות – רשות הטבע והגנים.</p>
				</div>
			</article>

			<!-- 3 — Jordan Park -->
			<article class="cc-row" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=פארק+הירדן&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="פארק הירדן"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חניון פארק הירדן</h3>
					<p>פארק הירדן הוא אחד היעדים הוותיקים והמומלצים ביותר לקרוואנרים בישראל. ממוקם על שפת הירדן ההררי, הפארק מציע סביבת חנייה רחבה עם הצללה צפופה של עצי האקליפטוס, חיבורים מלאים ועמדות פרטניות. אידיאלי לחופשה משפחתית במים זורמים.</p>
					<p>בחניון תמצאו עמדות חיבור למים וחשמל, שירותים ומקלחות, מטבחים פתוחים, פינות מנגל ופיקניק, ברזים פזורים בכל הפארק. מסביב לחניון – מסלולי טיול קצרים בטבע, מצוקים ומפלים קטנים, וכמובן רפטינג וקיאקים בנהר עצמו.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-map-pin"></i> כפר בלום, גליל עליון</span>
						<span><i class="fa-solid fa-phone"></i> 04-6916500</span>
						<span><i class="fa-solid fa-mobile-screen"></i> 052-3700099</span>
						<span><i class="fa-solid fa-envelope"></i> reservations@parkhayarden.com</span>
					</p>
				</div>
			</article>

			<!-- 4 — Tzemach Beach -->
			<article class="cc-row is-reverse" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps/embed?pb=!4v1614596573500!6m8!1m7!1sCAoSLEFGMVFpcE1yd19RUjBtQVlJX2paODZXQVhLYXdhclVzVlFPaldRVDJIbVM5!2m2!1d32.7057048!2d35.5853912!3f151.65487466715922!4f-26.40196218706756!5f0.7820865974627469"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="חוף צמח כנרת"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>קמפינג חוף צמח – דרום הכנרת</h3>
					<p>חוף צמח שבדרום הכנרת מתפרס על שטח גדול וצופה אל ימת הכנרת המרהיבה. אזור החנייה לקרוואנים נדיב במיוחד, פתוח לאורך כל השנה, עם גישה ישירה לחוף הים. בקיץ פתוחים גם בריכות שחייה, גן משחקים ומגרשי ספורט – אטרקציה מושלמת לכל המשפחה.</p>
					<p>החניון כולל חיבורי מים וחשמל, מקלחות חמות, שירותים, ברזים פזורים, פינות פיקניק וצל מובנה. פעיל לאורך כל השנה.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-phone"></i> 04-6757500</span>
						<span><i class="fa-solid fa-envelope"></i> info@tzemach.net</span>
					</p>
				</div>
			</article>

			<!-- 5 — Desert ships farm -->
			<article class="cc-row" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=חוות+ספינות+המדבר&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="ספינות המדבר"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חוות ספינות המדבר בנגב</h3>
					<p>חוות הגמלים הוותיקה בישראל, בלב הנגב, מציעה חוויה מדברית אותנטית. חניון הקרוואנים פרוס בלב חוות הגמלים, בין אוהלי בדואים, באר עתיקה ושטחים מדבריים פתוחים. אידיאלי לאוהבי השקט והנוף הפראי.</p>
					<p>בחניון תמצאו עמדות חיבור לחשמל ולמים, שירותים ומקלחות, מטבחון משותף, פינות פיקניק ופינת מדורה. בנוסף ניתן להזמין רכיבה על גמלים, ארוחות בדואיות ולינה באוהל מסורתי.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-map-pin"></i> מצפה רמון, נגב</span>
						<span><i class="fa-solid fa-phone"></i> 08-6597515</span>
						<span><i class="fa-solid fa-envelope"></i> info@cameland.co.il</span>
					</p>
				</div>
			</article>

			<!-- 6 — HaOn Beach -->
			<article class="cc-row is-reverse" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=חוף+האון+כנרת&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="חוף האון"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חניון חוף האון בכנרת</h3>
					<p>חוף האון הוא אחד החופים האהובים והמטופחים בכנרת, על גדתה הדרומית-מזרחית של הימה. חניון הקרוואנים ערוך באופן מסודר עם עמדות פרישה לקראוונים, יחידות אירוח ומבני שירות מודרניים. שייט קייקים, חוף רחצה ופעילות מים מובנית.</p>
					<p>במקום עמדות חיבור לחשמל ולמים, מקלחות חמות, שירותים, מטבחים משותפים, פינות פיקניק וצל. פעיל לאורך כל השנה.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-phone"></i> 04-6657555</span>
						<span><i class="fa-solid fa-map-pin"></i> חוף האון – כנרת</span>
					</p>
				</div>
			</article>

			<!-- 7 — Gofra Beach -->
			<article class="cc-row" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=חוף+גופרה+כנרת&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="חוף גופרה"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>חוף גופרה – מזרחית לכנרת</h3>
					<p>חוף גופרה ידוע באווירה המשפחתית והשלווה ובמצללות העץ הייחודיות לאורך החוף. החניון מאפשר חנייה לקרוואנים בקרבת המים, עם הצללה טבעית של מצללות בולטות. חוויית חוף שקטה ומיוחדת.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-bed"></i> יחידות אירוח – החל מ-200 ש״ח</span>
						<span><i class="fa-solid fa-bullseye"></i> מקום לקרוואנים – החל מ-200 ש״ח</span>
						<span><i class="fa-solid fa-tent"></i> אוהל קמפינג – החל מ-200 ש״ח</span>
						<span><i class="fa-solid fa-mobile-screen"></i> 050-4400777</span>
					</p>
					<a href="#contact" class="cc-cta">לתאום הזמנות וחוויות מגוונות לחצו כאן <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</article>

			<!-- 8 — Mishmish Park -->
			<article class="cc-row is-reverse" data-anim="fade-up">
				<div class="cc-row-media">
					<iframe
						src="https://www.google.com/maps?q=שאר+ישוב&output=embed"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						title="בצל המישמיש – שאר ישוב"></iframe>
				</div>
				<div class="cc-row-text">
					<h3>בצל המישמיש – שאר ישוב</h3>
					<p>חניון בוטיקי בצמרת שאר ישוב שבגליל העליון. במקום קמפינג מטופח, פינות בישול וצל, מקלחות, שירותים ועמדות לחיבור לחשמל ולמים. אידיאלי לחופשת זוגות או משפחה קטנה בלב הטבע.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-mobile-screen"></i> 050-5622600</span>
						<span><i class="fa-solid fa-map-pin"></i> שאר ישוב, גליל עליון</span>
					</p>
					<a href="#contact" class="cc-cta">לתאום ביקור לחצו כאן <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</article>

			<!-- 9 — Yoavtal -->
			<article class="cc-row" data-anim="fade-up">
				<div class="cc-row-media">
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt="יואגנל קרוואנים – בוסטן הפקאן">
				</div>
				<div class="cc-row-text">
					<h3>יואגנל קרוואנים – בוסטן הפקאן</h3>
					<p>חניון קרוואנים ייחודי בלב חורשת פקאנים מרהיבה, שילוב של פסטורליות חקלאית ונופש בחיק הטבע. עמדות פרישה רחבות בין העצים, חיבורי חשמל ומים, מטבחים משותפים, פינות פיקניק ושירותים מודרניים. אווירה שקטה ומפנקת.</p>
					<p class="cc-meta-block">
						<span><i class="fa-solid fa-vector-square"></i> 54 מ״ר</span>
						<span><i class="fa-solid fa-bed"></i> 1,000 ש״ח</span>
						<span><i class="fa-solid fa-mobile-screen"></i> 04-8772121</span>
						<span><i class="fa-solid fa-envelope"></i> info@ycaravans.com</span>
					</p>
					<a href="#contact" class="cc-cta">לתאום ביקור לחצו כאן <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</article>

		<?php endif; ?>

			<!-- Closing badge -->
			<?php
			$cc_cl_img  = cag_field( 'cc_closing_image' );
			$cc_cl_body = cag_field( 'cc_closing_body' );
			?>
			<div class="cc-closing" data-anim="fade-up">
				<div class="cc-closing-badge">
					<?php if ( $cc_cl_img ) : ?>
						<?php echo wp_get_attachment_image( $cc_cl_img, 'medium', false, array( 'alt' => 'חניוני קרוואנים בישראל' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/aboutimage.png' ) ); ?>" alt="חניוני קרוואנים בישראל">
					<?php endif; ?>
				</div>
				<div class="cc-closing-text">
					<?php if ( $cc_cl_body ) : ?>
						<?php echo $cc_cl_body; ?>
					<?php else : ?>
						<p>מדריך לחניוני קרוואנים שמתאים לקרוואנים, לרכבי שטח ולכל מי שאוהב לחוות חופשה אחרת בלב הטבע.</p>
						<p>בכמה מהחניונים הללו תמצאו:</p>
						<ul class="cc-bullets cc-bullets-inline">
							<li><i class="fa-solid fa-check"></i> חיבור לחשמל</li>
							<li><i class="fa-solid fa-check"></i> חיבור למים</li>
							<li><i class="fa-solid fa-check"></i> שירותים ומקלחות</li>
							<li><i class="fa-solid fa-check"></i> פינות בישול ופיקניק</li>
							<li><i class="fa-solid fa-check"></i> פעילויות לכל המשפחה</li>
							<li><i class="fa-solid fa-check"></i> אטרקציות בסביבה</li>
						</ul>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ FAQ ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
