<?php
/**
 * Front page template (homepage).
 *
 * Ported from the static prototype's index.html. The header/footer/drawer/
 * WhatsApp button live in header.php / footer.php — not repeated here.
 *
 * Content is ACF-driven via the "תוכן עמוד הבית" field group (acf-json/
 * group_cag_front_page.json), located on Page Type → Front Page. Every field
 * falls back to the original hardcoded copy: scalar text via cag_field()'s
 * second argument, and repeating blocks via the `else` branch — so the page
 * renders identically before the client fills anything in, or if ACF is off.
 */
get_header();
?>

<!-- HERO — masked frame expands on scroll -->
<section class="hero" id="hero">
	<div class="hero-stage">
		<div class="hero-frame">
			<video class="hero-img hero-video"
			       poster="<?php echo esc_url( cag_field_img_url( 'hero_poster', 'assets/img/hero-compound.jpg', 'full' ) ); ?>"
			       muted playsinline preload="none"
			       data-src="<?php echo esc_url( cag_field( 'hero_video', get_theme_file_uri( 'assets/uploads/bg.mp4' ) ) ); ?>"></video>
			<div class="hero-veil"></div>
			<div class="hero-scrim" aria-hidden="true"></div>
			<div class="hero-pattern" aria-hidden="true"></div>
			<div class="hero-corner hero-corner-tl" aria-hidden="true"></div>
			<div class="hero-corner hero-corner-tr" aria-hidden="true"></div>
			<div class="hero-corner hero-corner-bl" aria-hidden="true"></div>
			<div class="hero-corner hero-corner-br" aria-hidden="true"></div>

			<div class="hero-content">
				<h1>
					<span class="hero-line-1"><?php echo esc_html( cag_field( 'hero_title_1', 'א.ג. קרוואנים' ) ); ?></span>
					<span class="hero-line-2 gradient-text-light"><?php echo nl2br( esc_html( cag_field( 'hero_title_2', "מבני לינה ומתחמי תיירות \nבהתאמה אישית כחול לבן" ) ) ); ?></span>
				</h1>
				<p class="hero-text">
<?php echo nl2br( esc_html( cag_field( 'hero_text', "מבנים ומתחמים, פוד טראקים ופתרונות למגזר הביטחוני\nללקוחות פרטיים, עסקים ורשויות במבנים – משלב התכנון ועד ההקמה בשטח" ) ) ); ?>
				</p>
				<?php
				$cag_hero_cta1 = cag_link_parts( cag_field( 'hero_cta_1' ), '#models', 'כל הדגמים' );
				$cag_hero_cta2 = cag_link_parts( cag_field( 'hero_cta_2' ), '#contact', 'התחילו פרויקט' );
				?>
				<div class="hero-actions">
					<a href="<?php echo esc_url( $cag_hero_cta1['url'] ); ?>" class="btn btn-ghost"<?php echo cag_target_attr( $cag_hero_cta1['target'] ); ?>>
						<?php echo esc_html( $cag_hero_cta1['label'] ); ?>
						<i class="fa-solid fa-arrow-left"></i>
					</a>
					<a href="<?php echo esc_url( $cag_hero_cta2['url'] ); ?>" class="btn btn-ghost"<?php echo cag_target_attr( $cag_hero_cta2['target'] ); ?>><?php echo esc_html( $cag_hero_cta2['label'] ); ?></a>
				</div>
			</div>

			<div class="hero-meta">
				<?php if ( have_rows( 'hero_meta' ) ) : $cag_hm_i = 1; ?>
					<?php while ( have_rows( 'hero_meta' ) ) : the_row(); ?>
						<div class="hero-meta-item">
							<span class="hero-meta-num"><?php echo esc_html( sprintf( '%02d', $cag_hm_i ) ); ?></span>
							<span class="hero-meta-label"><?php echo esc_html( get_sub_field( 'label' ) ); ?></span>
						</div>
					<?php $cag_hm_i++; endwhile; ?>
				<?php else : ?>
					<div class="hero-meta-item">
						<span class="hero-meta-num">01</span>
						<span class="hero-meta-label">תכנון בהתאמה אישית</span>
					</div>
					<div class="hero-meta-item">
						<span class="hero-meta-num">02</span>
						<span class="hero-meta-label">ייצור כחול-לבן במפעל שלנו</span>
					</div>
					<div class="hero-meta-item">
						<span class="hero-meta-num">03</span>
						<span class="hero-meta-label">ליווי מקצה לקצה עם צוות מנוסה</span>
					</div>
				<?php endif; ?>
			</div>

			<div class="hero-scroll-hint">
				<span>גלילה</span>
				<span class="line"></span>
			</div>
		</div>
	</div>
</section>

<!-- Featured Models -->
<section class="section models" id="models">
	<div class="container">
		<div class="models-head" data-anim="fade-up">
			<div class="models-head-text">
				<span class="eyebrow"><?php echo esc_html( cag_field( 'models_eyebrow', 'כחול לבן' ) ); ?></span>
				<h2><?php echo esc_html( cag_field( 'models_heading', 'מבני לינה' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'models_highlight', 'בייצור מקומי' ) ); ?></span></h2>
				<p><?php echo esc_html( cag_field( 'models_intro', 'ארבעה דגמים מובילים בייצור כחול-לבן — תכנון, עיצוב וייצור ברמה הגבוהה ביותר, עם חשיבה מדוייקת על כל פרט ואפשרות לביצוע התאמות לצרכים שלכם.' ) ); ?></p>
			</div>
			<?php
			$cag_models_cta1 = cag_link_parts( cag_field( 'models_cta_1' ), '#contact', 'בקשו הצעת מחיר' );
			$cag_models_cta2 = cag_link_parts( cag_field( 'models_cta_2' ), home_url( '/kachol-lavan/' ), 'מידע נוסף' );
			?>
			<div class="models-head-ctas">
				<a href="<?php echo esc_url( $cag_models_cta1['url'] ); ?>" class="models-head-cta"<?php echo cag_target_attr( $cag_models_cta1['target'] ); ?>>
					<span><?php echo esc_html( $cag_models_cta1['label'] ); ?></span>
					<i class="fa-solid fa-arrow-left"></i>
				</a>
				<a href="<?php echo esc_url( $cag_models_cta2['url'] ); ?>" class="models-head-cta"<?php echo cag_target_attr( $cag_models_cta2['target'] ); ?>>
					<span><?php echo esc_html( $cag_models_cta2['label'] ); ?></span>
					<i class="fa-solid fa-arrow-left"></i>
				</a>
			</div>
		</div>

		<div class="models-showcase">
			<?php
			$cag_mc_featured = function_exists( 'get_field' ) ? get_field( 'models_featured' ) : null;

			if ( ! empty( $cag_mc_featured ) && is_array( $cag_mc_featured ) ) :
				// — CPT relationship: loop through selected model posts.
				foreach ( array_slice( $cag_mc_featured, 0, 4 ) as $cag_mc_i_0 => $cag_mc_post ) :
					$cag_mc_pid   = $cag_mc_post->ID;
					$cag_mc_i     = $cag_mc_i_0 + 1;
					$cag_mc_delay = $cag_mc_i_0 * 0.05;

					// Image: first gallery image, or post thumbnail.
					$cag_mc_img_id = 0;
					$cag_mc_gallery = get_field( 'm_gallery', $cag_mc_pid );
					if ( ! empty( $cag_mc_gallery ) ) {
						$cag_mc_first  = $cag_mc_gallery[0];
						$cag_mc_img_id = is_array( $cag_mc_first ) ? ( $cag_mc_first['ID'] ?? 0 ) : (int) $cag_mc_first;
					} elseif ( has_post_thumbnail( $cag_mc_pid ) ) {
						$cag_mc_img_id = get_post_thumbnail_id( $cag_mc_pid );
					}

					// Meta: subtitle field or first series term.
					$cag_mc_meta = get_field( 'm_subtitle', $cag_mc_pid );
					if ( ! $cag_mc_meta ) {
						$cag_mc_series = get_the_terms( $cag_mc_pid, 'series' );
						$cag_mc_meta   = ( $cag_mc_series && ! is_wp_error( $cag_mc_series ) ) ? $cag_mc_series[0]->name : '';
					}

					// Price: strip non-numeric, format with commas, prepend ₪.
					$cag_mc_price_raw = get_field( 'm_price', $cag_mc_pid );
					$cag_mc_price_display = '';
					if ( '' !== trim( (string) $cag_mc_price_raw ) ) {
						$cag_mc_price_clean   = preg_replace( '/[^\d.]/', '', (string) $cag_mc_price_raw );
						$cag_mc_price_display = is_numeric( $cag_mc_price_clean )
							? '₪' . number_format( (float) $cag_mc_price_clean )
							: $cag_mc_price_raw;
					}
					?>
					<article class="model-card" data-anim="fade-up"<?php echo $cag_mc_i > 1 ? ' data-delay="' . esc_attr( number_format( $cag_mc_delay, 2 ) ) . '"' : ''; ?>>
						<span class="model-num"><?php echo esc_html( sprintf( '%02d', $cag_mc_i ) ); ?></span>
						<div class="model-img">
							<?php if ( $cag_mc_img_id ) { echo wp_get_attachment_image( $cag_mc_img_id, 'large', false, array( 'alt' => get_the_title( $cag_mc_pid ) ) ); } ?>
						</div>
						<div class="model-body">
							<span class="model-meta"><?php echo esc_html( $cag_mc_meta ); ?></span>
							<h3><?php echo esc_html( get_the_title( $cag_mc_pid ) ); ?></h3>
							<p><?php echo esc_html( get_field( 'm_intro', $cag_mc_pid ) ); ?></p>
							<?php if ( $cag_mc_price_display ) : ?>
								<div class="model-price">
									<span class="price-from">החל מ–</span>
									<span class="price-amount"><?php echo esc_html( $cag_mc_price_display ); ?></span>
								</div>
							<?php endif; ?>
							<a href="<?php echo esc_url( get_permalink( $cag_mc_pid ) ); ?>" class="model-details-link">לפרטים נוספים לחצו כאן</a>
						</div>
					</article>
				<?php endforeach; ?>

			<?php elseif ( have_rows( 'models_cards' ) ) : $cag_mc_i = 1; ?>
				<?php
				while ( have_rows( 'models_cards' ) ) :
					the_row();
					$cag_mc_img   = get_sub_field( 'image' );
					$cag_mc_delay = ( $cag_mc_i - 1 ) * 0.05;
					?>
					<article class="model-card" data-anim="fade-up"<?php echo $cag_mc_i > 1 ? ' data-delay="' . esc_attr( $cag_mc_delay ) . '"' : ''; ?>>
						<span class="model-num"><?php echo esc_html( sprintf( '%02d', $cag_mc_i ) ); ?></span>
						<div class="model-img">
							<?php if ( $cag_mc_img ) { echo wp_get_attachment_image( $cag_mc_img, 'large', false, array( 'alt' => get_sub_field( 'title' ) ) ); } ?>
						</div>
						<div class="model-body">
							<span class="model-meta"><?php echo esc_html( get_sub_field( 'meta' ) ); ?></span>
							<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
							<p><?php echo esc_html( get_sub_field( 'body' ) ); ?></p>
							<?php if ( get_sub_field( 'price' ) ) : ?>
								<div class="model-price">
									<span class="price-from">החל מ–</span>
									<span class="price-amount"><?php echo esc_html( get_sub_field( 'price' ) ); ?></span>
								</div>
							<?php else : ?>
								<a href="<?php echo esc_url( home_url( '/יצירת-קשר/' ) ); ?>" class="model-price">להצעת מחיר לחצו כאן</a>
							<?php endif; ?>
						</div>
					</article>
				<?php $cag_mc_i++; endwhile; ?>

			<?php else : ?>
				<article class="model-card" data-anim="fade-up">
					<span class="model-num">01</span>
					<div class="model-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-shahaf.jpg' ) ); ?>" alt="דגם שחף">
					</div>
					<div class="model-body">
						<span class="model-meta">דו-קומתי</span>
						<h3>דגם שחף</h3>
						<p>מבנה לינה דו-קומתי לאירוח קבוצות עם פתרונות אוורור ובידוד מתקדמים.</p>
						<div class="model-price">
							<span class="price-from">החל מ–</span>
							<span class="price-amount">₪320,000</span>
						</div>
					</div>
				</article>

				<article class="model-card" data-anim="fade-up" data-delay="0.05">
					<span class="model-num">02</span>
					<div class="model-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-loft.jpg' ) ); ?>" alt="דגם לופט">
					</div>
					<div class="model-body">
						<span class="model-meta">חדר שינה יחיד</span>
						<h3>דגם לופט</h3>
						<p>קראוון אינטימי במידות מצומצמות, פתרון לזוגות או יחידים שמחפשים פרטיות.</p>
						<div class="model-price">
							<span class="price-from">החל מ–</span>
							<span class="price-amount">₪185,000</span>
						</div>
					</div>
				</article>

				<article class="model-card" data-anim="fade-up" data-delay="0.1">
					<span class="model-num">03</span>
					<div class="model-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-school.jpg' ) ); ?>" alt="דגם בית ספר שדה">
					</div>
					<div class="model-body">
						<span class="model-meta">מיטות דו-קומתיות</span>
						<h3>דגם בית ספר שדה</h3>
						<p>פתרון יעיל לקבוצות מאורגנות, מחנות לימוד ופעילויות חינוכיות.</p>
						<div class="model-price">
							<span class="price-from">החל מ–</span>
							<span class="price-amount">₪270,000</span>
						</div>
					</div>
				</article>

				<article class="model-card" data-anim="fade-up" data-delay="0.15">
					<span class="model-num">04</span>
					<div class="model-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/services-bath.jpg' ) ); ?>" alt="מבני שירותים ומקלחות">
					</div>
					<div class="model-body">
						<span class="model-meta">בקרוב</span>
						<h3>דגם חדש</h3>
						<p>דגם חדש בדרך — עיצוב ייחודי, מפרט מתקדם ואפשרויות התאמה אישית רחבות.</p>
						<div class="model-price">
							<span class="price-from">החל מ–</span>
							<span class="price-amount">₪145,000</span>
						</div>
					</div>
				</article>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- About / Compounds Section -->
<section class="section about" id="about">
	<div class="container about-grid">
		<div class="about-text" data-anim="fade-right">
			<span class="eyebrow"><?php echo esc_html( cag_field( 'about_eyebrow', 'מתחמי נופש ותיירות | קראוונים | מבנים למגורים' ) ); ?></span>
			<h2><?php echo esc_html( cag_field( 'about_heading', 'בניית מתחמי לינה ותיירות עם כל הנדרש' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'about_highlight', 'לאירוח מושלם' ) ); ?></span></h2>
			<?php
			echo cag_field( // ACF wysiwyg — trusted, already-formatted HTML.
				'about_body',
				'<p>בא.ג נגררים וקראוונים אנו מתכננים ומייצרים מתחמי אירוח ומבנים בהתאמה אישית. לאורך השנים צברנו ניסיון בליווי תהליכים ופרויקטים מורכבים מקצה לקצה – מתכנון ועד הקמה בשטח. הפתרונות שלנו מותאמים למטרות ותנאי השטח ויוצרים חוויה של חופש, שלווה וסטייל מקומי המתחבר לנוף ולאנשים.</p>'
			);
			?>

			<ul class="bullets">
				<?php if ( have_rows( 'about_bullets' ) ) : ?>
					<?php while ( have_rows( 'about_bullets' ) ) : the_row(); ?>
						<li><i class="fa-solid fa-check"></i> <?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
					<?php endwhile; ?>
				<?php else : ?>
					<li><i class="fa-solid fa-check"></i> שירותים ומקלחות</li>
					<li><i class="fa-solid fa-check"></i> פודטראקים וחדרי אוכל</li>
					<li><i class="fa-solid fa-check"></i> משרדים</li>
					<li><i class="fa-solid fa-check"></i> יחידות מגורים ואירוח</li>
				<?php endif; ?>
			</ul>

			<?php
			$cag_about_cta1 = cag_link_parts( cag_field( 'about_cta_1' ), '#contact', 'צור קשר' );
			$cag_about_cta2 = cag_link_parts( cag_field( 'about_cta_2' ), home_url( '/about-us/' ), 'מידע נוסף' );
			?>
			<div class="card-actions">
				<a href="<?php echo esc_url( $cag_about_cta1['url'] ); ?>" class="btn btn-primary"<?php echo cag_target_attr( $cag_about_cta1['target'] ); ?>><?php echo esc_html( $cag_about_cta1['label'] ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				<a href="<?php echo esc_url( $cag_about_cta2['url'] ); ?>" class="btn btn-outline"<?php echo cag_target_attr( $cag_about_cta2['target'] ); ?>><?php echo esc_html( $cag_about_cta2['label'] ); ?></a>
			</div>
		</div>

		<div class="about-media" data-anim="fade-left">
			<div class="media-main">
				<?php
				$cag_about_main = cag_field( 'about_image_main' );
				if ( $cag_about_main ) {
					echo wp_get_attachment_image( $cag_about_main, 'large', false, array( 'alt' => 'מתחמי שירותים ומקלחות' ) );
				} else { ?>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/services-bath.jpg' ) ); ?>" alt="מתחמי שירותים ומקלחות">
				<?php } ?>
			</div>
			<div class="media-side">
				<?php
				$cag_about_side = cag_field( 'about_image_side' );
				if ( $cag_about_side ) {
					echo wp_get_attachment_image( $cag_about_side, 'medium_large', false, array( 'alt' => 'מבנה במדבר' ) );
				} else { ?>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt="מבנה במדבר">
				<?php } ?>
			</div>
			<div class="media-badge">
				<i class="fa-solid fa-medal"></i>
				<div>
					<strong><?php echo esc_html( cag_field( 'about_badge_title', 'בהתאמה לתנאי השטח' ) ); ?></strong>
					<small><?php echo esc_html( cag_field( 'about_badge_subtitle', 'פרויקט מקצה לקצה' ) ); ?></small>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Foodtrack Section -->
<section class="section foodtrack" id="foodtrack">
	<div class="container">
		<div class="foodtrack-grid">
			<div class="foodtrack-gallery" data-anim="fade-right">
				<div class="ft-main">
					<?php
					$cag_ft_main = cag_field( 'foodtruck_image_main' );
					if ( $cag_ft_main ) {
						echo wp_get_attachment_image( $cag_ft_main, 'large', false, array( 'alt' => 'פודטראק א.ג נגררים' ) );
					} else { ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/foodtrack/WhatsApp Image 2026-04-28 at 12.28.28 (1).jpeg' ) ); ?>" alt="פודטראק א.ג נגררים">
					<?php } ?>
				</div>
				<div class="ft-thumbs">
					<?php if ( have_rows( 'foodtruck_thumbs' ) ) : ?>
						<?php while ( have_rows( 'foodtruck_thumbs' ) ) : the_row(); $cag_ft_thumb = get_sub_field( 'image' ); ?>
							<div class="ft-thumb">
								<?php if ( $cag_ft_thumb ) { echo wp_get_attachment_image( $cag_ft_thumb, 'medium_large', false, array( 'alt' => '' ) ); } ?>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<div class="ft-thumb">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/foodtrack/WhatsApp Image 2026-04-28 at 12.28.27.jpeg' ) ); ?>" alt="פודטראק כחול">
						</div>
						<div class="ft-thumb">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/foodtrack/WhatsApp Image 2026-04-28 at 12.28.28.jpeg' ) ); ?>" alt="מבנה פודטראק בפארק">
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="foodtrack-text" data-anim="fade-left">
				<span class="eyebrow"><?php echo esc_html( cag_field( 'foodtruck_eyebrow', 'פוד טראקים | א.ג נגררים' ) ); ?></span>
				<h2><?php echo esc_html( cag_field( 'foodtruck_heading', 'פוד טראקים ניידים ונייחים' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'foodtruck_highlight', 'בהתאמה אישית' ) ); ?></span></h2>
				<?php
				echo cag_field( // ACF wysiwyg — trusted, already-formatted HTML.
					'foodtruck_body',
					'<p>תכנון, עיצוב ובניית פוד טראקים ניידים ונייחים בהתאמה מלאה לצרכי הלקוח. הפודטראקים שלנו מתאימים לעסקים, לקוחות פרטיים, עיריות ורשויות ויכולים לשמש כפתרונות למגוון רחב של צרכים — ביניהם אירועים, עסקים ומתחמי נופש ותיירות — פתרון מקצועי, יעיל ונוח ברמה הגבוהה ביותר.</p><p>כל פוד טראק מתוכנן ומיוצר כאן בא.ג נגררים, בייצור מקומי כחול לבן ובהתאמה אישית מלאה. אנו מדייקים כל פרט – מהמערכות ועד לנגרות ולאחסון – לפי התכנון, מטרות ואופי הפרויקט.</p>'
				);
				?>

				<ul class="bullets">
					<?php if ( have_rows( 'foodtruck_bullets' ) ) : ?>
						<?php while ( have_rows( 'foodtruck_bullets' ) ) : the_row(); ?>
							<li><i class="fa-solid fa-check"></i> <?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
						<?php endwhile; ?>
					<?php else : ?>
						<li><i class="fa-solid fa-check"></i> מטבח מאובזר לפי דרישה</li>
						<li><i class="fa-solid fa-check"></i> חיבורי חשמל ומים מובנים</li>
						<li><i class="fa-solid fa-check"></i> מיזוג ותשתיות</li>
						<li><i class="fa-solid fa-check"></i> בנייה בהתאמה אישית</li>
					<?php endif; ?>
				</ul>

				<?php
				$cag_ft_cta1 = cag_link_parts( cag_field( 'foodtruck_cta_1' ), '#contact', 'צור קשר' );
				$cag_ft_cta2 = cag_link_parts( cag_field( 'foodtruck_cta_2' ), home_url( '/foodtrucks/' ), 'מידע נוסף' );
				?>
				<div class="card-actions">
					<a href="<?php echo esc_url( $cag_ft_cta1['url'] ); ?>" class="btn btn-primary"<?php echo cag_target_attr( $cag_ft_cta1['target'] ); ?>><?php echo esc_html( $cag_ft_cta1['label'] ); ?> <i class="fa-solid fa-arrow-left"></i></a>
					<a href="<?php echo esc_url( $cag_ft_cta2['url'] ); ?>" class="btn btn-outline"<?php echo cag_target_attr( $cag_ft_cta2['target'] ); ?>><?php echo esc_html( $cag_ft_cta2['label'] ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Authorities Strip — with bg image -->
<section class="section authorities" id="authorities" style="background-image: url('<?php echo esc_url( cag_field_img_url( 'auth_bg', 'assets/img/services-bath.jpg' ) ); ?>')">
	<div class="container">
		<div class="auth-card" data-anim="zoom-in">
			<div class="auth-text">
				<span class="eyebrow light"><?php echo esc_html( cag_field( 'auth_eyebrow', 'רשויות | מועצות | עיריות | קיבוצים' ) ); ?></span>
				<h2><?php echo esc_html( cag_field( 'auth_heading', 'פתרונות לרשויות ועיריות' ) ); ?></h2>
				<p><?php echo nl2br( esc_html( cag_field( 'auth_body', 'א.ג קראוונים מספקת פתרונות מבניים וקראוונים לרשויות מקומיות, עיריות וגופים ציבוריים, לצרכים מגוונים — מבני ציבור, משרדים, כיתות לימוד, מבני שירות ופתרונות ייעודיים נוספים. המבנים מתוכננים ומיוצרים בהתאם לדרישות הרשות והתקנים הרלוונטיים, תוך התאמה מלאה לצרכים, לתנאי השטח, למאפייני הפרויקט ולתקציב.' ) ) ); ?></p>
				<?php
				$cag_auth_cta1 = cag_link_parts( cag_field( 'auth_cta_1' ), '#contact', 'צור קשר' );
				$cag_auth_cta2 = cag_link_parts( cag_field( 'auth_cta_2' ), home_url( '/kachol-lavan/' ), 'מידע נוסף' );
				?>
				<div class="card-actions">
					<a href="<?php echo esc_url( $cag_auth_cta1['url'] ); ?>" class="btn btn-white"<?php echo cag_target_attr( $cag_auth_cta1['target'] ); ?>><?php echo esc_html( $cag_auth_cta1['label'] ); ?> <i class="fa-solid fa-arrow-left"></i></a>
					<a href="<?php echo esc_url( $cag_auth_cta2['url'] ); ?>" class="btn btn-ghost"<?php echo cag_target_attr( $cag_auth_cta2['target'] ); ?>><?php echo esc_html( $cag_auth_cta2['label'] ); ?></a>
				</div>
			</div>
			<div class="auth-icons">
				<?php if ( have_rows( 'auth_icons' ) ) : ?>
					<?php while ( have_rows( 'auth_icons' ) ) : the_row(); ?>
						<div class="auth-ico"><i class="<?php echo esc_attr( get_sub_field( 'icon' ) ); ?>"></i><span><?php echo esc_html( get_sub_field( 'label' ) ); ?></span></div>
					<?php endwhile; ?>
				<?php else : ?>
					<div class="auth-ico"><i class="fa-solid fa-utensils"></i><span>חדרי אוכל</span></div>
					<div class="auth-ico"><i class="fa-solid fa-briefcase"></i><span>משרדים</span></div>
					<div class="auth-ico"><i class="fa-solid fa-graduation-cap"></i><span>כיתות לימוד ומבנים לבתי ספר</span></div>
					<div class="auth-ico"><i class="fa-solid fa-shower"></i><span>שירותים ומקלחות</span></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- Security Section -->
<section class="section security" id="security-sector">
	<div class="container">
		<div class="section-head" data-anim="fade-up">
			<span class="eyebrow"><?php echo esc_html( cag_field( 'security_eyebrow', 'מגזר הביטחוני' ) ); ?></span>
			<h2><?php echo esc_html( cag_field( 'security_heading', 'פתרונות ייעודיים לגופי' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'security_highlight', 'ביטחון' ) ); ?></span></h2>
			<p><?php echo esc_html( cag_field( 'security_intro', 'תכנון וייצור נגררים ומבני לינה לגופי ביטחון, צבא ומשטרה. הפתרונות מותאמים לתנאי שטח ולצרכים מבצעיים, בדגש על אמינות, בטיחות ויכולת תפקוד בתנאים מורכבים.' ) ); ?></p>
		</div>

		<div class="security-panels">
			<?php if ( have_rows( 'security_panels' ) ) : $cag_sp_i = 1; ?>
				<?php
				while ( have_rows( 'security_panels' ) ) :
					the_row();
					$cag_sp_img    = get_sub_field( 'image' );
					$cag_sp_anim   = ( 1 === $cag_sp_i % 2 ) ? 'fade-right' : 'fade-left';
					$cag_sp_cta1   = cag_link_parts( get_sub_field( 'cta_1' ), '#contact', 'צור קשר' );
					$cag_sp_cta2   = cag_link_parts( get_sub_field( 'cta_2' ), '#', 'מידע נוסף' );
					?>
					<div class="security-panel" data-anim="<?php echo esc_attr( $cag_sp_anim ); ?>">
						<div class="security-panel-img">
							<?php if ( $cag_sp_img ) { echo wp_get_attachment_image( $cag_sp_img, 'large', false, array( 'alt' => get_sub_field( 'title' ) ) ); } ?>
							<div class="security-panel-overlay"></div>
						</div>
						<div class="security-panel-body">
							<span class="security-panel-num"><?php echo esc_html( sprintf( '%02d', $cag_sp_i ) ); ?></span>
							<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
							<p><?php echo esc_html( get_sub_field( 'body' ) ); ?></p>
							<?php if ( have_rows( 'features' ) ) : ?>
								<ul class="security-features">
									<?php while ( have_rows( 'features' ) ) : the_row(); ?>
										<li><i class="fa-solid fa-shield-halved"></i> <?php echo esc_html( get_sub_field( 'text' ) ); ?></li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<div class="card-actions">
								<a href="<?php echo esc_url( $cag_sp_cta1['url'] ); ?>" class="btn btn-primary btn-sm"<?php echo cag_target_attr( $cag_sp_cta1['target'] ); ?>><?php echo esc_html( $cag_sp_cta1['label'] ); ?> <i class="fa-solid fa-arrow-left"></i></a>
								<a href="<?php echo esc_url( $cag_sp_cta2['url'] ); ?>" class="btn btn-ghost btn-sm"<?php echo cag_target_attr( $cag_sp_cta2['target'] ); ?>><?php echo esc_html( $cag_sp_cta2['label'] ); ?></a>
							</div>
						</div>
					</div>
				<?php $cag_sp_i++; endwhile; ?>
			<?php else : ?>
				<div class="security-panel" data-anim="fade-right">
					<div class="security-panel-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.01.jpeg' ) ); ?>" alt="נגרר בטחוני - משטרת ישראל">
						<div class="security-panel-overlay"></div>
					</div>
					<div class="security-panel-body">
						<span class="security-panel-num">01</span>
						<h3>נגררים בטחוניים</h3>
						<p>נגררים מיוחדים בייצור כחול לבן, המתוכננים לשימוש מבצעי ומותאמים לצרכי השטח. כל נגרר מתוכנן בקפידה בהתאם לדרישות הפרויקט, עם מערכות ואבזור לפי הצורך.</p>
						<ul class="security-features">
							<li><i class="fa-solid fa-shield-halved"></i> עמידות גבוהה בתנאי שטח</li>
							<li><i class="fa-solid fa-shield-halved"></i> התאמה למפרט בטיחותי מדויק</li>
							<li><i class="fa-solid fa-shield-halved"></i> ייצור כחול-לבן מלא</li>
						</ul>
						<div class="card-actions">
							<a href="#contact" class="btn btn-primary btn-sm">צור קשר <i class="fa-solid fa-arrow-left"></i></a>
							<a href="<?php echo esc_url( home_url( '/security-trailers/' ) ); ?>" class="btn btn-ghost btn-sm">מידע נוסף</a>
						</div>
					</div>
				</div>

				<div class="security-panel" data-anim="fade-left">
					<div class="security-panel-img">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/security/WhatsApp Image 2026-04-28 at 12.29.02.jpeg' ) ); ?>" alt="קראוון לינה למגזר הבטחוני - חיל הרפואה">
						<div class="security-panel-overlay"></div>
					</div>
					<div class="security-panel-body">
						<span class="security-panel-num">02</span>
						<h3>מבנים ומתחמי לינה למגזר הבטחוני</h3>
						<p>מבני לינה ומתחמים ייעודיים לגופי הביטחון, עם יכולת הקמה מהירה והתאמה למגוון שימושים משתנים. הפתרונות מתאימים לפרויקטים זמניים או קבועים, תוך שמירה על בטיחות, נוחות ותפעול יעיל.</p>
						<ul class="security-features">
							<li><i class="fa-solid fa-shield-halved"></i> מבנים נגישים</li>
							<li><i class="fa-solid fa-shield-halved"></i> הקמה מהירה בשטח</li>
							<li><i class="fa-solid fa-shield-halved"></i> התאמה למגוון צרכים מבצעיים</li>
						</ul>
						<div class="card-actions">
							<a href="#contact" class="btn btn-primary btn-sm">צור קשר <i class="fa-solid fa-arrow-left"></i></a>
							<a href="<?php echo esc_url( home_url( '/security-living/' ) ); ?>" class="btn btn-ghost btn-sm">מידע נוסף</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Catalog Intro -->
<section class="section catalog" id="catalog">
	<div class="container">
		<div class="section-head" data-anim="fade-up">
			<span class="eyebrow"><?php echo esc_html( cag_field( 'catalog_eyebrow', 'קראוונים ומבני לינה' ) ); ?></span>
			<h2><?php echo esc_html( cag_field( 'catalog_heading', 'הדגמים' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'catalog_highlight', 'המובילים' ) ); ?></span> <?php echo nl2br( esc_html( cag_field( 'catalog_heading_after', "של\nא.ג קראוונים" ) ) ); ?></h2>
		</div>

		<div class="catalog-grid">
			<div class="catalog-text" data-anim="fade-right">
				<?php
				echo cag_field( // ACF wysiwyg — trusted, already-formatted HTML.
					'catalog_text',
					'<p>א.ג קראוונים מתמחה בייבוא ובייצור קראוונים ומבנים איכותיים ומציעה מגוון רחב של פתרונות מגורים בסטנדרטים הגבוהים ביותר.</p>'
					. '<p>המבנים שלנו כוללים קראוונים מייבוא היצרנים הטובים בעולם, לצד מבני לינה ומתחמים בייצור מקומי כחול-לבן תוך הקפדה על איכות, עמידות והתאמה מלאה לתקנים ולצרכים.</p>'
					. '<p>הצוות שלנו בא.ג קראוונים זמין עבורכם לכל אורך הדרך ומעניק ייעוץ מקצועי, אמין ומקיף, במטרה לספק פתרון איכותי, מדויק ועמיד לאורך זמן.</p>'
					. '<p>הפתרונות שלנו מתאימים למגוון רחב של שימושים, בהם: מתחמי לינה, מבנים לרשויות מקומיות ועיריות, מתחמי תיירות ונופש, מבנים למגורים וקראוונים לטיולים ופנאי.</p>'
				);
				$cag_cat_wa = cag_link_parts( cag_field( 'catalog_wa' ), 'https://wa.me/972505500180', 'להתכתבות עם נציג' );
				?>
				<a href="<?php echo esc_url( $cag_cat_wa['url'] ); ?>" class="btn btn-primary"<?php echo cag_target_attr( $cag_cat_wa['target'] ); ?>>
					<i class="fa-brands fa-whatsapp"></i> <?php echo esc_html( $cag_cat_wa['label'] ); ?>
				</a>
			</div>

			<div class="catalog-tabs" data-anim="fade-left">
				<div class="tabs-head">
					<button class="tab-btn active" data-tab="local"><?php echo esc_html( cag_field( 'catalog_tab_local_label', 'ייצור מקומי כחול לבן' ) ); ?></button>
					<button class="tab-btn" data-tab="import"><?php echo esc_html( cag_field( 'catalog_tab_import_label', 'דגמים מייבוא' ) ); ?></button>
				</div>

				<!-- LOCAL TAB — ACF repeater (catalog_local_cards) -->
				<div class="tab-pane active" data-pane="local">
					<div class="weinsberg-grid">
						<?php if ( have_rows( 'catalog_local_cards' ) ) : ?>
							<?php while ( have_rows( 'catalog_local_cards' ) ) : the_row();
								$cag_cl_img   = get_sub_field( 'image' );
								$cag_cl_price = get_sub_field( 'price' );
								?>
								<div class="w-card">
									<?php if ( $cag_cl_img ) { echo wp_get_attachment_image( $cag_cl_img, 'medium', false, array( 'alt' => get_sub_field( 'title' ) ) ); } ?>
									<span><?php echo esc_html( get_sub_field( 'title' ) ); ?></span>
									<?php if ( $cag_cl_price ) : ?>
										<span class="w-price"><?php echo esc_html( $cag_cl_price ); ?></span>
									<?php else : ?>
										<a href="<?php echo esc_url( home_url( '/יצירת-קשר/' ) ); ?>" class="w-price w-price-cta">להצעת מחיר לחצו כאן</a>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-shahaf.jpg' ) ); ?>" alt=""><span>דגם שחף</span><span class="w-price">₪320,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-loft.jpg' ) ); ?>" alt=""><span>דגם לופט</span><span class="w-price">₪185,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-school.jpg' ) ); ?>" alt=""><span>דגם בית ספר שדה</span><span class="w-price">₪270,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/services-bath.jpg' ) ); ?>" alt=""><span>מבנה שירותים</span><span class="w-price">₪145,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt=""><span>מבנה לינה גדול</span><span class="w-price">₪390,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/towing.jpg' ) ); ?>" alt=""><span>קראוון נגרר</span><span class="w-price">₪220,000</span></div>
						<?php endif; ?>
					</div>
				</div>

				<!-- IMPORT TAB — CPT relationship field (catalog_import_listings → model CPT) -->
				<div class="tab-pane" data-pane="import">
					<div class="weinsberg-grid">
						<?php
						$cag_import_posts = function_exists( 'get_field' ) ? get_field( 'catalog_import_listings' ) : null;
						if ( ! empty( $cag_import_posts ) && is_array( $cag_import_posts ) ) :
							foreach ( $cag_import_posts as $cag_imp_post ) :
								$cag_imp_pid = $cag_imp_post->ID;

								// Image: first gallery image, or post thumbnail.
								$cag_imp_img_id  = 0;
								$cag_imp_gallery = get_field( 'm_gallery', $cag_imp_pid );
								if ( ! empty( $cag_imp_gallery ) ) {
									$cag_imp_first  = $cag_imp_gallery[0];
									$cag_imp_img_id = is_array( $cag_imp_first ) ? ( $cag_imp_first['ID'] ?? 0 ) : (int) $cag_imp_first;
								} elseif ( has_post_thumbnail( $cag_imp_pid ) ) {
									$cag_imp_img_id = get_post_thumbnail_id( $cag_imp_pid );
								}

								// Price: format with ₪ if numeric, empty triggers CTA link.
								$cag_imp_price_raw     = get_field( 'm_price', $cag_imp_pid );
								$cag_imp_price_display = '';
								if ( '' !== trim( (string) $cag_imp_price_raw ) ) {
									$cag_imp_price_clean   = preg_replace( '/[^\d.]/', '', (string) $cag_imp_price_raw );
									$cag_imp_price_display = is_numeric( $cag_imp_price_clean )
										? '₪' . number_format( (float) $cag_imp_price_clean )
										: $cag_imp_price_raw;
								}
								?>
								<a class="w-card" href="<?php echo esc_url( get_permalink( $cag_imp_pid ) ); ?>">
									<?php if ( $cag_imp_img_id ) { echo wp_get_attachment_image( $cag_imp_img_id, 'medium', false, array( 'alt' => get_the_title( $cag_imp_pid ) ) ); } ?>
									<span><?php echo esc_html( get_the_title( $cag_imp_pid ) ); ?></span>
									<?php if ( $cag_imp_price_display ) : ?>
										<span class="w-price"><?php echo esc_html( $cag_imp_price_display ); ?></span>
									<?php else : ?>
										<span class="w-price w-price-cta">לפרטים נוספים לחצו כאן</span>
									<?php endif; ?>
								</a>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-front.jpg' ) ); ?>" alt=""><span>Weinsberg 450FU</span><span class="w-price">₪195,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-side.jpg' ) ); ?>" alt=""><span>Weinsberg 550UK</span><span class="w-price">₪248,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-front.jpg' ) ); ?>" alt=""><span>Weinsberg 550QDK</span><span class="w-price">₪265,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-side.jpg' ) ); ?>" alt=""><span>Weinsberg 390QD</span><span class="w-price">₪168,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-front.jpg' ) ); ?>" alt=""><span>Weinsberg 420QD</span><span class="w-price">₪188,000</span></div>
							<div class="w-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/caravan-side.jpg' ) ); ?>" alt=""><span>Weinsberg 500FDK</span><span class="w-price">₪235,000</span></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Articles / Newsletter / Press -->
<section class="section articles" id="articles">
	<div class="container">

		<div class="section-head" data-anim="fade-up">
			<span class="eyebrow"><?php echo esc_html( cag_field( 'articles_eyebrow', 'מידע ותוכן נוסף' ) ); ?></span>
			<h2><?php echo esc_html( cag_field( 'articles_heading', 'בלוג, ניוזלטרים' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'articles_highlight', 'וכתבות' ) ); ?></span></h2>
		</div>

		<!-- Tab bar -->
		<div class="art-tabs" data-anim="fade-up">
			<button class="art-tab-btn active" data-art-tab="blog">
				<i class="fa-solid fa-pen-nib"></i> מהבלוג שלנו
			</button>
			<button class="art-tab-btn" data-art-tab="newsletters">
				<i class="fa-regular fa-envelope"></i> ניוזלטרים ומודעות
			</button>
			<button class="art-tab-btn" data-art-tab="press">
				<i class="fa-solid fa-newspaper"></i> כתבות ופרסומים
			</button>
		</div>

		<!-- Blog pane — latest real posts -->
		<div class="art-pane active" data-art-pane="blog">
			<div class="articles-grid">
				<?php
				$cag_blog_q = new WP_Query(
					array(
						'post_type'           => 'post',
						'posts_per_page'      => 3,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					)
				);
				if ( $cag_blog_q->have_posts() ) :
					while ( $cag_blog_q->have_posts() ) :
						$cag_blog_q->the_post();
						$cag_cats = get_the_category();
						?>
						<article class="article-card">
							<div class="article-img"><img src="<?php echo esc_url( cag_thumb_url( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>"></div>
							<div class="article-body">
								<?php if ( ! empty( $cag_cats ) ) : ?><span class="article-cat"><?php echo esc_html( $cag_cats[0]->name ); ?></span><?php endif; ?>
								<h3><?php the_title(); ?></h3>
								<a href="<?php the_permalink(); ?>" class="article-link">למידע נוסף <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					?>
					<article class="article-card">
						<div class="article-img"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/article1.jpg' ) ); ?>" alt=""></div>
						<div class="article-body">
							<span class="article-cat">כחול לבן</span>
							<h3>בנייה כחול לבן</h3>
							<a href="#" class="article-link">למידע נוסף <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>

					<article class="article-card">
						<div class="article-img"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/article2.jpg' ) ); ?>" alt=""></div>
						<div class="article-body">
							<span class="article-cat">פוד טראק</span>
							<h3>פוד טראק בהתאמה אישית</h3>
							<a href="#" class="article-link">למידע נוסף <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>

					<article class="article-card">
						<div class="article-img"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/article3.jpg' ) ); ?>" alt=""></div>
						<div class="article-body">
							<span class="article-cat">קראוונים</span>
							<h3>בית על גלגלים – הבית תמיד כאן</h3>
							<a href="#" class="article-link">למידע נוסף <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>
				<?php endif; ?>
			</div>
		</div>

		<!-- Newsletters pane -->
		<div class="art-pane" data-art-pane="newsletters">
			<div class="articles-grid">
				<?php if ( have_rows( 'articles_newsletters' ) ) : ?>
					<?php
					while ( have_rows( 'articles_newsletters' ) ) :
						the_row();
						$cag_nl_link = cag_link_parts( get_sub_field( 'link' ), '#', '' );
						?>
						<article class="nl-card">
							<div class="nl-header">
								<i class="fa-regular fa-newspaper"></i>
								<span class="nl-issue"><?php echo esc_html( get_sub_field( 'issue' ) ); ?></span>
							</div>
							<div class="nl-body">
								<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
								<p><?php echo esc_html( get_sub_field( 'body' ) ); ?></p>
								<a href="<?php echo esc_url( $cag_nl_link['url'] ); ?>" class="article-link"<?php echo cag_target_attr( $cag_nl_link['target'] ); ?>>לקריאה <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article class="nl-card">
						<div class="nl-header">
							<i class="fa-regular fa-newspaper"></i>
							<span class="nl-issue">גיליון 03 · אביב 2025</span>
						</div>
						<div class="nl-body">
							<h3>חדשות מהמפעל: דגמים חדשים ומגמות שוק הנגררים בישראל</h3>
							<p>סקירה של פרויקטים שהשלמנו, חידושים בקווי הייצור ועדכון על הביקוש הגובר למבני לינה מקומיים.</p>
							<a href="#" class="article-link">לקריאה <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>

					<article class="nl-card">
						<div class="nl-header">
							<i class="fa-regular fa-newspaper"></i>
							<span class="nl-issue">גיליון 02 · חורף 2024</span>
						</div>
						<div class="nl-body">
							<h3>בחרבות ברזל: כיצד סייענו לגופי חירום עם פתרונות לינה מהירים</h3>
							<p>תיאור פרויקטים שבוצעו בתנאי לחץ ומסגרת זמן קצרה לצרכי חירום לאומיים.</p>
							<a href="#" class="article-link">לקריאה <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>

					<article class="nl-card">
						<div class="nl-header">
							<i class="fa-regular fa-newspaper"></i>
							<span class="nl-issue">גיליון 01 · קיץ 2024</span>
						</div>
						<div class="nl-body">
							<h3>מדריך הקיץ: קראוונים, שטח פתוח ומה שצריך לדעת</h3>
							<p>טיפים לתחזוקת קראוון לפני העונה, המלצות על אתרי חניה ועדכוני מוצר.</p>
							<a href="#" class="article-link">לקריאה <i class="fa-solid fa-arrow-left"></i></a>
						</div>
					</article>
				<?php endif; ?>
			</div>
		</div>

		<!-- Press pane -->
		<div class="art-pane" data-art-pane="press">
			<div class="press-grid">
				<?php if ( have_rows( 'articles_press' ) ) : ?>
					<?php
					while ( have_rows( 'articles_press' ) ) :
						the_row();
						$cag_press_link = cag_link_parts( get_sub_field( 'link' ), '#', '' );
						?>
						<article class="press-card">
							<div class="press-source">
								<span class="press-name"><?php echo esc_html( get_sub_field( 'source' ) ); ?></span>
								<span class="press-date"><?php echo esc_html( get_sub_field( 'date' ) ); ?></span>
							</div>
							<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
							<a href="<?php echo esc_url( $cag_press_link['url'] ); ?>" class="press-link"<?php echo cag_target_attr( $cag_press_link['target'] ); ?>>לכתבה המלאה <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article class="press-card">
						<div class="press-source">
							<span class="press-name">כלכליסט</span>
							<span class="press-date">ינואר 2025</span>
						</div>
						<h3>א.ג קראוונים: החברה הישראלית שהפכה לשחקן מרכזי בשוק המבנים הניידים</h3>
						<a href="#" class="press-link">לכתבה המלאה <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
					</article>

					<article class="press-card">
						<div class="press-source">
							<span class="press-name">גלובס</span>
							<span class="press-date">מרץ 2025</span>
						</div>
						<h3>הביקוש למתחמי לינה ניידים קפץ — חברות ישראליות מובילות את הגל</h3>
						<a href="#" class="press-link">לכתבה המלאה <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
					</article>

					<article class="press-card">
						<div class="press-source">
							<span class="press-name">מעריב עסקים</span>
							<span class="press-date">פברואר 2025</span>
						</div>
						<h3>נגררים ביטחוניים: הספק הישראלי שעובד עם המשטרה, הצבא ורשויות החירום</h3>
						<a href="#" class="press-link">לכתבה המלאה <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
					</article>
				<?php endif; ?>
			</div>
		</div>

	</div>
</section>

<!-- Social Strip — marquee of latest posts -->
<section class="section social-strip" id="videos">
	<div class="container">
		<div class="social-head" data-anim="fade-up">
			<div>
				<span class="eyebrow"><?php echo esc_html( cag_field( 'social_eyebrow', 'עקבו אחרינו ברשתות החברתיות' ) ); ?></span>
				<h2><?php echo esc_html( cag_field( 'social_heading', 'הפוסטים' ) ); ?> <span class="gradient-text"><?php echo esc_html( cag_field( 'social_highlight', 'האחרונים שלנו' ) ); ?></span></h2>
			</div>
			<div class="social-platforms">
				<?php if ( have_rows( 'social_links' ) ) : ?>
					<?php
					while ( have_rows( 'social_links' ) ) :
						the_row();
						$cag_sl_link = cag_link_parts( get_sub_field( 'link' ), '#', '' );
						?>
						<a href="<?php echo esc_url( $cag_sl_link['url'] ); ?>" aria-label="<?php echo esc_attr( get_sub_field( 'aria' ) ); ?>" class="platform"<?php echo cag_target_attr( $cag_sl_link['target'] ); ?>><i class="<?php echo esc_attr( get_sub_field( 'icon' ) ); ?>"></i></a>
					<?php endwhile; ?>
				<?php else : ?>
					<a href="#" aria-label="Instagram" class="platform"><i class="fa-brands fa-instagram"></i></a>
					<a href="#" aria-label="Facebook" class="platform"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="#" aria-label="YouTube" class="platform"><i class="fa-brands fa-youtube"></i></a>
					<a href="#" aria-label="TikTok" class="platform"><i class="fa-brands fa-tiktok"></i></a>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php
	// Collect the marquee posts once, then render the track twice (the second
	// copy is aria-hidden) for the seamless CSS loop.
	$cag_social_posts = array();
	$cag_sp_platform_map = array(
		'facebook'  => array( 'icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'  ),
		'instagram' => array( 'icon' => 'fa-brands fa-instagram',   'label' => 'Instagram' ),
		'youtube'   => array( 'icon' => 'fa-brands fa-youtube',     'label' => 'YouTube'   ),
	);
	if ( have_rows( 'social_posts' ) ) {
		while ( have_rows( 'social_posts' ) ) {
			the_row();
			$cag_sp_pf     = get_sub_field( 'platform' );
			$cag_sp_mapped = $cag_sp_platform_map[ $cag_sp_pf ] ?? array( 'icon' => 'fa-solid fa-share-nodes', 'label' => $cag_sp_pf );
			$cag_social_posts[] = array(
				'image' => get_sub_field( 'image' ),
				'icon'  => $cag_sp_mapped['icon'],
				'label' => $cag_sp_mapped['label'],
				'link'  => cag_link_parts( get_sub_field( 'link' ), '#', '' ),
			);
		}
	}
	?>
	<div class="social-marquee" data-anim="fade-up">
		<div class="marquee-track">
			<?php if ( ! empty( $cag_social_posts ) ) : ?>
				<?php
				// Two passes: visible track + aria-hidden duplicate.
				foreach ( array( false, true ) as $cag_dup ) :
					foreach ( $cag_social_posts as $cag_post ) :
						?>
						<a href="<?php echo esc_url( $cag_post['link']['url'] ); ?>" class="post-card"<?php echo $cag_dup ? ' aria-hidden="true"' : ''; ?><?php echo cag_target_attr( $cag_post['link']['target'] ); ?>><?php
							if ( $cag_post['image'] ) {
								echo wp_get_attachment_image( $cag_post['image'], 'medium', false, array( 'alt' => $cag_dup ? '' : $cag_post['label'] ) );
							}
						?><span class="post-tag"><i class="<?php echo esc_attr( $cag_post['icon'] ); ?>"></i> <?php echo esc_html( $cag_post['label'] ); ?></span></a>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<!-- Track is duplicated for seamless loop -->
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-1.png' ) ); ?>" alt="פוסט מהפייסבוק"><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-2.png' ) ); ?>" alt="פוסט"><span class="post-tag"><i class="fa-brands fa-facebook-f"></i> Facebook</span></a>
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-3.png' ) ); ?>" alt="פוסט"><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-loft.jpg' ) ); ?>" alt="פוסט"><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/services-bath.jpg' ) ); ?>" alt="פוסט"><span class="post-tag"><i class="fa-brands fa-facebook-f"></i> Facebook</span></a>
				<a href="#" class="post-card"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt="פוסט"><span class="post-tag"><i class="fa-brands fa-youtube"></i> YouTube</span></a>

				<!-- duplicate -->
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-1.png' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-2.png' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-facebook-f"></i> Facebook</span></a>
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/social-3.png' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/model-loft.jpg' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-instagram"></i> Instagram</span></a>
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/services-bath.jpg' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-facebook-f"></i> Facebook</span></a>
				<a href="#" class="post-card" aria-hidden="true"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/desert-caravan.jpg' ) ); ?>" alt=""><span class="post-tag"><i class="fa-brands fa-youtube"></i> YouTube</span></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
