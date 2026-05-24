<?php
/**
 * Template Name: Local Models
 *
 * Ported from the static prototype's pages/local-models/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Model rows ══ -->
	<?php $lm_models = get_field( 'lm_models' ); if ( $lm_models ) : ?>
	<section class="lm-models-section">
		<div class="container">
			<div class="lm-models-list">

				<?php foreach ( $lm_models as $i => $model ) :
					$reverse_class = ( $i % 2 !== 0 ) ? ' is-reverse' : '';
					$img_id        = $model['image'];
					$img_alt       = esc_attr( $model['name'] );
					$cta           = $model['cta'];
					$cta_url       = $cta ? esc_url( $cta['url'] ) : '#contact';
					$cta_text      = ( $cta && $cta['title'] ) ? esc_html( $cta['title'] ) : 'צרו קשר למידע נוסף';
					$cta_target    = ( $cta && $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '"' : '';
				?>
				<article class="lm-model<?php echo $reverse_class; ?>" data-anim="fade-up">
					<div class="lm-model-media">
						<?php if ( $img_id ) : ?>
							<?php echo wp_get_attachment_image( $img_id, 'large', false, [ 'class' => 'lm-model-img', 'alt' => $img_alt ] ); ?>
						<?php endif; ?>
					</div>
					<div class="lm-model-card">
						<div class="lm-model-head">
							<span class="lm-model-num"><?php echo $i + 1; ?></span>
							<?php if ( $model['tag'] ) : ?>
								<span class="lm-model-tag"><?php echo esc_html( $model['tag'] ); ?></span>
							<?php endif; ?>
						</div>
						<h3><?php echo esc_html( $model['name'] ); ?></h3>
						<?php if ( $model['price'] ) : ?>
							<p class="lm-price">
								<?php echo esc_html( $model['price'] ); ?>
								<?php if ( $model['price_note'] ) : ?>
									<small><?php echo esc_html( $model['price_note'] ); ?></small>
								<?php endif; ?>
							</p>
						<?php endif; ?>
						<?php if ( $model['desc'] ) : ?>
							<p class="lm-desc"><?php echo esc_html( $model['desc'] ); ?></p>
						<?php endif; ?>
						<?php if ( $model['specs'] ) : ?>
							<ul class="lm-specs">
								<?php foreach ( $model['specs'] as $spec ) : ?>
									<li>
										<i class="<?php echo esc_attr( $spec['icon'] ); ?>"></i>
										<span><?php echo esc_html( $spec['value'] ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<a href="<?php echo $cta_url; ?>"<?php echo $cta_target; ?> class="lm-btn lm-btn-primary lm-btn-block">
							<?php echo $cta_text; ?> <i class="fa-solid fa-arrow-left"></i>
						</a>
					</div>
				</article>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ Common features grid ══ -->
	<?php
	$feat_heading  = get_field( 'lm_feat_heading' );
	$feat_subtitle = get_field( 'lm_feat_subtitle' );
	$lm_features   = get_field( 'lm_features' );
	if ( $feat_heading || $feat_subtitle || $lm_features ) :
	?>
	<section class="lm-features">
		<div class="container">
			<?php if ( $feat_heading || $feat_subtitle ) : ?>
				<div class="section-head" data-anim="fade-up">
					<?php if ( $feat_heading ) : ?><h2><?php echo esc_html( $feat_heading ); ?></h2><?php endif; ?>
					<?php if ( $feat_subtitle ) : ?><p><?php echo esc_html( $feat_subtitle ); ?></p><?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $lm_features ) : ?>
				<div class="lm-features-grid">
					<?php foreach ( $lm_features as $i => $feat ) :
						$delay = number_format( $i * 0.06, 2 );
					?>
						<div class="lm-feature" data-anim="fade-up" data-delay="<?php echo $delay; ?>">
							<div class="lm-feature-icon"><i class="<?php echo esc_attr( $feat['icon'] ); ?>"></i></div>
							<h4><?php echo esc_html( $feat['title'] ); ?></h4>
							<p><?php echo esc_html( $feat['desc'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ══ Custom Made section ══ -->
	<?php
	$custom_eyebrow    = get_field( 'lm_custom_eyebrow' );
	$custom_heading    = get_field( 'lm_custom_heading' );
	$custom_heading_em = get_field( 'lm_custom_heading_em' );
	$custom_subtitle   = get_field( 'lm_custom_subtitle' );
	$custom_stamp      = get_field( 'lm_custom_stamp' );
	$custom_specs      = get_field( 'lm_custom_specs' );
	$custom_cta        = get_field( 'lm_custom_cta' );
	$custom_meta       = get_field( 'lm_custom_meta' );
	?>
	<section class="lm-custom">
		<div class="lm-custom-pattern" aria-hidden="true"></div>
		<div class="container">
			<div class="lm-custom-frame">
				<span class="lm-custom-corner lm-cc-tl" aria-hidden="true"></span>
				<span class="lm-custom-corner lm-cc-tr" aria-hidden="true"></span>
				<span class="lm-custom-corner lm-cc-bl" aria-hidden="true"></span>
				<span class="lm-custom-corner lm-cc-br" aria-hidden="true"></span>
				<?php if ( $custom_stamp ) : ?>
					<span class="lm-custom-stamp" aria-hidden="true"><?php echo esc_html( $custom_stamp ); ?></span>
				<?php endif; ?>

				<div class="lm-custom-head" data-anim="fade-up">
					<?php if ( $custom_eyebrow ) : ?>
						<span class="lm-eyebrow"><?php echo esc_html( $custom_eyebrow ); ?></span>
					<?php endif; ?>
					<?php if ( $custom_heading || $custom_heading_em ) : ?>
						<h2><?php echo esc_html( $custom_heading ); ?> <em><?php echo esc_html( $custom_heading_em ); ?></em></h2>
					<?php endif; ?>
					<?php if ( $custom_subtitle ) : ?>
						<p><?php echo esc_html( $custom_subtitle ); ?></p>
					<?php endif; ?>
				</div>

				<?php if ( $custom_specs ) : ?>
					<div class="lm-custom-grid">
						<?php foreach ( $custom_specs as $i => $spec ) :
							$delay = number_format( $i * 0.06, 2 );
							$num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
						?>
							<article class="lm-spec" data-anim="fade-up" data-delay="<?php echo $delay; ?>">
								<span class="lm-spec-num"><?php echo $num; ?></span>
								<div class="lm-spec-icon"><i class="<?php echo esc_attr( $spec['icon'] ); ?>"></i></div>
								<h4><?php echo esc_html( $spec['title'] ); ?></h4>
								<p><?php echo esc_html( $spec['desc'] ); ?></p>
								<?php if ( $spec['range'] ) : ?>
									<span class="lm-spec-range"><?php echo esc_html( $spec['range'] ); ?></span>
								<?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $custom_cta ) : ?>
					<div class="lm-custom-cta" data-anim="fade-up">
						<a href="<?php echo esc_url( $custom_cta['url'] ); ?>"<?php echo $custom_cta['target'] ? ' target="' . esc_attr( $custom_cta['target'] ) . '"' : ''; ?> class="lm-btn lm-btn-primary">
							<i class="fa-solid fa-pen-ruler"></i>
							<?php echo esc_html( $custom_cta['title'] ); ?>
						</a>
						<?php if ( $custom_meta ) : ?>
							<span class="lm-custom-meta">
								<i class="fa-solid fa-clock"></i>
								<?php echo esc_html( $custom_meta ); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ FAQ ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<?php
get_footer();
