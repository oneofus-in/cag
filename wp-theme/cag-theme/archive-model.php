<?php
/**
 * Archive for the "Model" (דגם) CPT — /listings/.
 *
 * The listing of every caravan/trailer, grouped by manufacturer (יצרן / brand
 * taxonomy). Replaces the previously hardcoded brand blocks in the Caravans page
 * template; keeps that page's design (.cv-* markup + caravans.css) but is fully
 * driven by the model posts and their brand/series terms + ACF price fields.
 *
 * Layout: inner-hero → one block per brand (logo + title + tagline + model grid) → FAQ.
 */
get_header();

// Resolve the contact-us page URL once — the quote button on price-less cards links here.
$cag_arch_contact_pages = get_posts( array(
	'post_type'      => 'page',
	'meta_key'       => '_wp_page_template',
	'meta_value'     => 'page-templates/contact-us.php',
	'posts_per_page' => 1,
	'fields'         => 'ids',
	'no_found_rows'  => true,
) );
$cag_arch_contact_url = ! empty( $cag_arch_contact_pages )
	? get_permalink( $cag_arch_contact_pages[0] )
	: home_url( '/contact-us/' );

// Hero title/sub come from the archive (no singular post here) — see inner-hero.php.
set_query_var( 'cag_hero_title', 'קראוונים' );

$cag_arch_brands = get_terms( array(
	'taxonomy'   => 'brand',
	'hide_empty' => true,
) );
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ דגמים ══ -->
	<section class="section cv-models-section" id="models">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>הקראוונים <span class="gradient-text">המיובאים שלנו</span></h2>
				<p>מותגים מובילים מאירופה — איכות, אמינות ועיצוב, בכל קטגוריה ובכל תקציב</p>
			</div>

			<?php if ( ! empty( $cag_arch_brands ) && ! is_wp_error( $cag_arch_brands ) ) : ?>
				<?php foreach ( $cag_arch_brands as $cag_arch_brand ) : ?>
					<?php
					// Brand logo from the group_cag_brand term field (stored as attachment ID).
					$cag_arch_logo_url = '';
					if ( function_exists( 'get_field' ) ) {
						$cag_arch_logo_id = get_field( 'brand_logo', 'brand_' . $cag_arch_brand->term_id );
						if ( $cag_arch_logo_id && is_numeric( $cag_arch_logo_id ) ) {
							$cag_arch_logo_url = wp_get_attachment_image_url( (int) $cag_arch_logo_id, 'medium' );
						}
					}
					$cag_arch_tagline = function_exists( 'get_field' )
						? (string) get_field( 'brand_tagline', 'brand_' . $cag_arch_brand->term_id )
						: '';

					$cag_arch_models = new WP_Query( array(
						'post_type'           => 'model',
						'posts_per_page'      => -1,
						'orderby'             => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'tax_query'           => array(
							array(
								'taxonomy' => 'brand',
								'field'    => 'term_id',
								'terms'    => $cag_arch_brand->term_id,
							),
						),
					) );

					if ( ! $cag_arch_models->have_posts() ) {
						wp_reset_postdata();
						continue;
					}
					?>
					<div class="cv-brand-block" data-anim="fade-up">
						<div class="cv-brand-head">
							<?php if ( $cag_arch_logo_url ) : ?>
								<img src="<?php echo esc_url( $cag_arch_logo_url ); ?>" alt="<?php echo esc_attr( $cag_arch_brand->name ); ?>" class="cv-brand-logo">
							<?php endif; ?>
							<h3 class="cv-brand-title">קראוונים <span><?php echo esc_html( $cag_arch_brand->name ); ?></span></h3>
							<?php if ( '' !== trim( $cag_arch_tagline ) ) : ?>
								<p class="cv-brand-tagline"><?php echo esc_html( $cag_arch_tagline ); ?></p>
							<?php endif; ?>
						</div>

						<div class="cv-models-grid">
							<?php
							$cag_arch_d = 0;
							while ( $cag_arch_models->have_posts() ) :
								$cag_arch_models->the_post();
								$cag_arch_id = get_the_ID();

								// Series (סדרה) → optional tag badge.
								$cag_arch_series = get_the_terms( $cag_arch_id, 'series' );

								// Price: when set, shown as "{label} ₪{price}"; when empty the card
								// footer becomes a full-width quote button to the contact page.
								$cag_arch_price       = cag_field( 'm_price', '' );
								$cag_arch_price_label = cag_field( 'm_price_label', 'להצעת מחיר השאירו פרטים' );
								$cag_arch_price_disp  = '';
								if ( '' !== trim( (string) $cag_arch_price ) ) {
									$cag_arch_price_clean = preg_replace( '/[^\d.]/', '', (string) $cag_arch_price );
									$cag_arch_price_disp  = is_numeric( $cag_arch_price_clean ) ? number_format( (float) $cag_arch_price_clean ) : $cag_arch_price;
								}
								?>
								<article class="cv-model-card" data-anim="fade-up" data-delay="<?php echo esc_attr( number_format( $cag_arch_d * 0.08, 2 ) ); ?>">
									<div class="cv-model-img-wrap">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo esc_url( cag_thumb_url( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>" class="cv-model-img">
										</a>
										<?php if ( $cag_arch_series && ! is_wp_error( $cag_arch_series ) ) : ?>
											<div class="cv-model-badges">
												<span class="cv-model-tag"><?php echo esc_html( $cag_arch_series[0]->name ); ?></span>
											</div>
										<?php endif; ?>
									</div>
									<div class="cv-model-body">
										<h4><?php the_title(); ?></h4>
										<?php if ( '' !== $cag_arch_price_disp ) : ?>
											<div class="cv-model-footer">
												<span class="cv-model-price"><?php
																	$cag_arch_default_label = 'להצעת מחיר השאירו פרטים';
																	if ( '' !== $cag_arch_price_label && $cag_arch_price_label !== $cag_arch_default_label ) {
																		echo esc_html( $cag_arch_price_label ) . ' ';
																	}
																	?>₪<?php echo esc_html( $cag_arch_price_disp ); ?> <small>+ מע״מ</small></span>
												<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
											</div>
										<?php else : ?>
											<div class="cv-model-footer cv-model-footer--quote">
												<a href="<?php the_permalink(); ?>" class="btn btn-primary">לפרטים <i class="fa-solid fa-arrow-left"></i></a>
											</div>
										<?php endif; ?>
									</div>
								</article>
								<?php
								$cag_arch_d++;
							endwhile;
							?>
						</div>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>
	</section>

	<!-- ══ שאלות ותשובות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();

