<?php
/**
 * Single "Model" (דגם) — /listings/<slug>.
 *
 * Layout (blue design system):
 *   1. inner-hero (shared)          — breadcrumb + title + excerpt over video bg
 *   2. Overview                     — gallery + thumbnails / price-or-quote CTA
 *   3. Spec accordion               — editable groups (title + WYSIWYG content)
 *   4. Video                        — optional YouTube embed
 *   5. Related models               — same manufacturer/series, .cv-model-card markup
 *   6. mini-contact (shared)        — #contact, the CTA scroll target
 *   7. FAQ (shared)
 */
get_header();

while ( have_posts() ) :
	the_post();

	$cag_m_id       = get_the_ID();
	$cag_m_gallery  = cag_field( 'm_gallery', array() );
	// Normalize: import stores raw IDs; ACF gallery fields return image objects.
	if ( ! empty( $cag_m_gallery ) && is_int( $cag_m_gallery[0] ) ) {
		$cag_m_gallery = array_values( array_filter( array_map( function( $img_id ) {
			$full = wp_get_attachment_image_src( (int) $img_id, 'full' );
			if ( ! $full ) { return null; }
			$lg = wp_get_attachment_image_src( (int) $img_id, 'large' );
			$th = wp_get_attachment_image_src( (int) $img_id, 'thumbnail' );
			return [
				'ID'    => (int) $img_id,
				'url'   => $full[0],
				'alt'   => get_post_meta( (int) $img_id, '_wp_attachment_image_alt', true ),
				'sizes' => [
					'large'     => $lg ? $lg[0] : $full[0],
					'thumbnail' => $th ? $th[0] : $full[0],
				],
			];
		}, $cag_m_gallery ) ) );
	}
	$cag_m_subtitle = cag_field( 'm_subtitle', '' );
	$cag_m_intro    = cag_field( 'm_intro', '' );
	$cag_m_youtube  = cag_field( 'm_youtube', '' );
	$cag_m_docs     = cag_field( 'm_docs', null );
	$cag_m_doc      = cag_link_parts( $cag_m_docs, '', 'היסטוריה ומסמכים', '' );

	// Price: when set, shown as "{label} ₪{price}". When empty, the label alone is
	// the call-to-action text. The button always targets the contact form (#contact).
	$cag_m_price       = cag_field( 'm_price', '' );
	$cag_m_price_label = cag_field( 'm_price_label', 'להצעת מחיר השאירו פרטים' );
	$cag_m_cta_link    = cag_field( 'm_cta_override', null );
	$cag_m_cta         = cag_link_parts( $cag_m_cta_link, '#contact', 'השאירו פרטים', '' );

	$cag_m_price_display = '';
	if ( '' !== trim( (string) $cag_m_price ) ) {
		$cag_m_price_clean   = preg_replace( '/[^\d.]/', '', (string) $cag_m_price );
		$cag_m_price_display = is_numeric( $cag_m_price_clean ) ? number_format( (float) $cag_m_price_clean ) : $cag_m_price;
	}

	// YouTube embed URL (supports watch?v=, youtu.be/, embed/, shorts/).
	$cag_m_yt_embed = '';
	if ( $cag_m_youtube && preg_match( '~(?:youtu\.be/|youtube\.com/(?:watch\?v=|embed/|v/|shorts/))([A-Za-z0-9_-]{11})~', $cag_m_youtube, $cag_m_yt_m ) ) {
		$cag_m_yt_embed = 'https://www.youtube.com/embed/' . $cag_m_yt_m[1];
	}

	// Manufacturer (יצרן) + its logo from the group_cag_brand term field, and series (סדרה).
	$cag_m_brands     = get_the_terms( $cag_m_id, 'brand' );
	$cag_m_brand      = ( $cag_m_brands && ! is_wp_error( $cag_m_brands ) ) ? $cag_m_brands[0] : null;
	$cag_m_brand_logo = '';
	if ( $cag_m_brand && function_exists( 'get_field' ) ) {
		$cag_m_logo_id = get_field( 'brand_logo', 'brand_' . $cag_m_brand->term_id );
		if ( $cag_m_logo_id && is_numeric( $cag_m_logo_id ) ) {
			$cag_m_brand_logo = wp_get_attachment_image_url( (int) $cag_m_logo_id, 'medium' );
		}
	}
	?>

	<main class="page-top">

		<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

		<!-- ══ גלריה + הצעת מחיר ══ -->
		<section class="section sm-overview" id="overview">
			<div class="container sm-overview-grid">

				<!-- Gallery -->
				<div class="sm-gallery" data-anim="fade-up">
					<?php if ( ! empty( $cag_m_gallery ) && is_array( $cag_m_gallery ) ) : ?>
						<?php
						$cag_m_first     = $cag_m_gallery[0];
						$cag_m_first_lg  = ! empty( $cag_m_first['sizes']['large'] ) ? $cag_m_first['sizes']['large'] : $cag_m_first['url'];
						$cag_m_first_alt = ! empty( $cag_m_first['alt'] ) ? $cag_m_first['alt'] : get_the_title();
						?>
						<div class="sm-gallery-main">
							<button type="button" class="sm-gallery-main-btn" id="sm-gallery-main-btn" data-index="0" aria-label="פתיחת גלריה">
								<img class="sm-gallery-main-img" id="sm-gallery-main-img"
								     src="<?php echo esc_url( $cag_m_first_lg ); ?>"
								     alt="<?php echo esc_attr( $cag_m_first_alt ); ?>">
								<span class="sm-gallery-zoom" aria-hidden="true"><i class="fa-solid fa-magnifying-glass-plus"></i></span>
							</button>
						</div>

						<?php if ( count( $cag_m_gallery ) > 1 ) : ?>
							<div class="sm-gallery-thumbs" id="sm-gallery-thumbs">
								<?php foreach ( $cag_m_gallery as $cag_m_i => $cag_m_img ) : ?>
									<?php
									$cag_m_full = ! empty( $cag_m_img['sizes']['large'] ) ? $cag_m_img['sizes']['large'] : $cag_m_img['url'];
									$cag_m_thmb = ! empty( $cag_m_img['sizes']['thumbnail'] ) ? $cag_m_img['sizes']['thumbnail'] : $cag_m_img['url'];
									$cag_m_alt  = ! empty( $cag_m_img['alt'] ) ? $cag_m_img['alt'] : get_the_title();
									?>
									<button type="button" class="sm-thumb<?php echo 0 === $cag_m_i ? ' is-active' : ''; ?>"
									        data-index="<?php echo (int) $cag_m_i; ?>"
									        data-full="<?php echo esc_url( $cag_m_full ); ?>"
									        data-alt="<?php echo esc_attr( $cag_m_alt ); ?>"
									        aria-label="<?php echo esc_attr( sprintf( 'תמונה %d', $cag_m_i + 1 ) ); ?>">
										<img src="<?php echo esc_url( $cag_m_thmb ); ?>" alt="<?php echo esc_attr( $cag_m_alt ); ?>" loading="lazy">
									</button>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php elseif ( has_post_thumbnail() ) : ?>
						<div class="sm-gallery-main">
							<img class="sm-gallery-main-img" src="<?php echo esc_url( cag_thumb_url( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
						</div>
					<?php endif; ?>
				</div>

				<!-- Aside: subtitle, intro, tags, quote CTA -->
				<aside class="sm-aside" data-anim="fade-up">
					<?php if ( $cag_m_brand ) : ?>
						<div class="sm-brand">
							<?php if ( $cag_m_brand_logo ) : ?>
								<img class="sm-brand-logo" src="<?php echo esc_url( $cag_m_brand_logo ); ?>" alt="<?php echo esc_attr( $cag_m_brand->name ); ?>">
							<?php endif; ?>
							<span class="sm-brand-name"><?php echo esc_html( $cag_m_brand->name ); ?></span>
						</div>
					<?php endif; ?>

					<p class="sm-subtitle"><?php the_title(); ?></p>

					<?php if ( $cag_m_intro ) : ?>
						<div class="sm-intro"><?php echo wpautop( esc_html( $cag_m_intro ) ); ?></div>
					<?php endif; ?>

					<div class="sm-quote-box<?php echo $cag_m_price_display ? ' has-price' : ''; ?>">
						<div class="sm-quote-head">
							<span class="sm-price-label"><?php echo esc_html( $cag_m_price_label ); ?></span>
							<?php if ( $cag_m_price_display ) : ?>
								<span class="sm-price-amount">₪<?php echo esc_html( $cag_m_price_display ); ?></span>
							<?php endif; ?>
						</div>
						<a class="btn btn-primary sm-quote-btn"
						   href="<?php echo esc_url( $cag_m_cta['url'] ); ?>"<?php echo cag_target_attr( $cag_m_cta['target'] ); ?>>
							<?php echo esc_html( $cag_m_cta['label'] ); ?>
							<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
						</a>
					</div>

					<div class="listing-aside-disclaimer">
						<ul>
							<li>ט.ל.ח</li>
							<li>המחירים המוצגים הינם מחירים משוערכים, יתכנו עליות מחירים לאור ההתייקרויות במשק</li>
							<li>להמחשה בלבד (קיימים מוצרים מוצגים בתוספת תשלום)</li>
						</ul>
					</div>

					<?php if ( $cag_m_doc['url'] ) : ?>
						<a class="sm-doc-link" href="<?php echo esc_url( $cag_m_doc['url'] ); ?>"<?php echo cag_target_attr( $cag_m_doc['target'] ); ?>>
							<i class="fa-solid fa-file-lines" aria-hidden="true"></i>
							<?php echo esc_html( $cag_m_doc['label'] ); ?>
						</a>
					<?php endif; ?>
				</aside>

			</div>
		</section>

		<!-- ══ מפרט (אקורדיון) ══ -->
		<?php if ( have_rows( 'm_spec_groups' ) ) : ?>
			<section class="section sm-specs-section" id="specs">
				<div class="container">
					<div class="section-head" data-anim="fade-up">
						<h2>מפרט <span class="gradient-text">הדגם</span></h2>
					</div>
					<div class="sm-accordion" data-anim="fade-up">
						<?php
						$cag_m_g = 0;
						while ( have_rows( 'm_spec_groups' ) ) :
							the_row();
							$cag_m_g_title   = get_sub_field( 'title' );
							$cag_m_g_content = get_sub_field( 'content' );
							if ( '' === trim( (string) $cag_m_g_title ) ) {
								continue;
							}
							?>
							<details class="sm-acc-item"<?php echo 0 === $cag_m_g ? ' open' : ''; ?>>
								<summary class="sm-acc-head">
									<span class="sm-acc-title"><?php echo esc_html( $cag_m_g_title ); ?></span>
									<i class="fa-solid fa-chevron-down sm-acc-chevron" aria-hidden="true"></i>
								</summary>
								<div class="sm-acc-body sm-acc-rte">
									<?php echo wp_kses_post( $cag_m_g_content ); ?>
								</div>
							</details>
							<?php
							$cag_m_g++;
						endwhile;
						?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- ══ סרטון ══ -->
		<?php if ( $cag_m_yt_embed ) : ?>
			<section class="section sm-video-section" id="video">
				<div class="container">
					<div class="sm-video" data-anim="fade-up">
						<iframe src="<?php echo esc_url( $cag_m_yt_embed ); ?>"
						        title="<?php the_title_attribute(); ?>"
						        loading="lazy" allowfullscreen
						        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<!-- ══ דגמים נוספים ══ -->
		<?php
		// Related models: same סדרה or יצרן first, then top up with the most recent
		// other models so the grid fills up to 3.
		$cag_m_brand_ids  = wp_get_post_terms( $cag_m_id, 'brand', array( 'fields' => 'ids' ) );
		$cag_m_series_ids = wp_get_post_terms( $cag_m_id, 'series', array( 'fields' => 'ids' ) );

		$cag_m_rel_tax = array( 'relation' => 'OR' );
		if ( ! is_wp_error( $cag_m_brand_ids ) && $cag_m_brand_ids ) {
			$cag_m_rel_tax[] = array( 'taxonomy' => 'brand', 'field' => 'term_id', 'terms' => $cag_m_brand_ids );
		}
		if ( ! is_wp_error( $cag_m_series_ids ) && $cag_m_series_ids ) {
			$cag_m_rel_tax[] = array( 'taxonomy' => 'series', 'field' => 'term_id', 'terms' => $cag_m_series_ids );
		}

		$cag_m_rel_ids = array();
		if ( count( $cag_m_rel_tax ) > 1 ) {
			$cag_m_rel_ids = get_posts(
				array(
					'post_type'      => 'model',
					'posts_per_page' => 3,
					'post__not_in'   => array( $cag_m_id ),
					'fields'         => 'ids',
					'tax_query'      => $cag_m_rel_tax, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				)
			);
		}

		// Top up to 3 with the most recent other models when there aren't enough matches.
		if ( count( $cag_m_rel_ids ) < 3 ) {
			$cag_m_rel_ids = array_merge(
				$cag_m_rel_ids,
				get_posts(
					array(
						'post_type'      => 'model',
						'posts_per_page' => 3 - count( $cag_m_rel_ids ),
						'post__not_in'   => array_merge( array( $cag_m_id ), $cag_m_rel_ids ),
						'fields'         => 'ids',
					)
				)
			);
		}

		if ( $cag_m_rel_ids ) :
			$cag_m_related = new WP_Query(
				array(
					'post_type'           => 'model',
					'post__in'            => $cag_m_rel_ids,
					'orderby'             => 'post__in',
					'posts_per_page'      => count( $cag_m_rel_ids ),
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				)
			);
			?>
			<section class="section sm-related-section" id="related">
				<div class="container">
					<div class="section-head" data-anim="fade-up">
						<h2>דגמים <span class="gradient-text">נוספים</span></h2>
					</div>
					<div class="cv-models-grid">
						<?php
						$cag_m_d = 0;
						while ( $cag_m_related->have_posts() ) :
							$cag_m_related->the_post();
							$cag_m_r_id     = get_the_ID();
							$cag_m_r_series = get_the_terms( $cag_m_r_id, 'series' );
							?>
							<article class="cv-model-card" data-anim="fade-up" data-delay="<?php echo esc_attr( $cag_m_d * 0.08 ); ?>">
								<div class="cv-model-img-wrap">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url( cag_thumb_url( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>" class="cv-model-img">
									</a>
									<?php if ( $cag_m_r_series && ! is_wp_error( $cag_m_r_series ) ) : ?>
										<div class="cv-model-badges">
											<span class="cv-model-tag"><?php echo esc_html( $cag_m_r_series[0]->name ); ?></span>
										</div>
									<?php endif; ?>
								</div>
								<div class="cv-model-body">
									<h4><?php the_title(); ?></h4>
									<?php if ( has_excerpt() ) : ?>
										<p class="cv-model-desc"><?php echo esc_html( get_the_excerpt() ); ?></p>
									<?php endif; ?>
									<div class="cv-model-footer">
										<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
									</div>
								</div>
							</article>
							<?php
							$cag_m_d++;
						endwhile;
						?>
					</div>
				</div>
			</section>
			<?php
		endif;
		wp_reset_postdata();
		?>

		<!-- ══ טופס יצירת קשר ══ -->
		<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

		<!-- ══ שאלות ותשובות ══ -->
		<?php get_template_part( 'template-parts/faq/faq' ); ?>

		<?php
		// Lightbox shell (driven by single-model.js). Rendered once per page when a
		// real gallery exists, so there are no images to swipe through otherwise.
		if ( ! empty( $cag_m_gallery ) && is_array( $cag_m_gallery ) && count( $cag_m_gallery ) > 0 ) :
			?>
			<div class="sm-lightbox" id="sm-lightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="גלריית תמונות">
				<button type="button" class="sm-lb-close" aria-label="סגירה"><i class="fa-solid fa-xmark"></i></button>
				<button type="button" class="sm-lb-arrow sm-lb-prev" aria-label="הקודם"><i class="fa-solid fa-chevron-right"></i></button>
				<div class="sm-lb-img-wrap">
					<img class="sm-lb-img" id="sm-lb-img" src="" alt="">
				</div>
				<button type="button" class="sm-lb-arrow sm-lb-next" aria-label="הבא"><i class="fa-solid fa-chevron-left"></i></button>
				<div class="sm-lb-counter" id="sm-lb-counter"></div>
			</div>
		<?php endif; ?>

	</main>

	<?php
endwhile;
get_footer();
