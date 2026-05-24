<?php
/**
 * Template Name: Accessories
 *
 * Ported from the static prototype's pages/accessories/index.html.
 * The acc-grid is driven by the ACF relationship field `acc_items` (group_cag_accessories),
 * which lets the editor pick any `model` CPT posts to display. Each card links to the
 * contact-us page. The price strip appears when the model has no price set.
 */
get_header();

// Resolve the contact-us page URL once — all acc-cards link here.
$cag_acc_contact_pages = get_posts( array(
	'post_type'      => 'page',
	'meta_key'       => '_wp_page_template',
	'meta_value'     => 'page-templates/contact-us.php',
	'posts_per_page' => 1,
	'fields'         => 'ids',
	'no_found_rows'  => true,
) );
$cag_acc_contact_url = ! empty( $cag_acc_contact_pages )
	? get_permalink( $cag_acc_contact_pages[0] )
	: home_url( '/contact-us/' );

$cag_acc_items = cag_field( 'acc_items', array() );
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Accessories grid ══ -->
	<section class="section acc-grid-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>מגוון רחב של <span class="gradient-text">אבזרים נלווים</span></h2>
				<p>מבחר אביזרים והשלמות לקרוואנים ולמבני לינה — מנעולים, מנשאים, פתרונות אנרגיה ועוד</p>
			</div>

			<div class="acc-grid">

				<?php if ( is_array( $cag_acc_items ) && ! empty( $cag_acc_items ) ) : ?>
					<?php
					$cag_acc_i = 0;
					foreach ( $cag_acc_items as $cag_acc_raw ) :
						// Relationship field may return IDs or WP_Post objects depending on ACF sync state.
						$cag_acc_post = is_object( $cag_acc_raw ) ? $cag_acc_raw : get_post( (int) $cag_acc_raw );
						if ( ! $cag_acc_post ) {
							continue;
						}
						$cag_acc_id        = $cag_acc_post->ID;
						$cag_acc_title     = get_the_title( $cag_acc_id );
						$cag_acc_delay = number_format( $cag_acc_i * 0.06, 2 );

						// Featured image → first gallery image → theme placeholder.
						if ( has_post_thumbnail( $cag_acc_id ) ) {
							$cag_acc_img = get_the_post_thumbnail(
								$cag_acc_id,
								'large',
								array( 'alt' => esc_attr( $cag_acc_title ), 'loading' => 'lazy' )
							);
						} else {
							$cag_acc_gallery = get_field( 'm_gallery', $cag_acc_id );
							$cag_acc_first   = is_array( $cag_acc_gallery ) && ! empty( $cag_acc_gallery ) ? reset( $cag_acc_gallery ) : null;
							$cag_acc_src     = ( is_array( $cag_acc_first ) && ! empty( $cag_acc_first['url'] ) )
								? $cag_acc_first['url']
								: get_theme_file_uri( 'assets/img/Lock.jpeg' );
							$cag_acc_img = '<img src="' . esc_url( $cag_acc_src ) . '" alt="' . esc_attr( $cag_acc_title ) . '" loading="lazy">';
						}
					?>
					<a class="acc-card has-price-strip"
					   href="<?php echo esc_url( $cag_acc_contact_url ); ?>"
					   data-anim="fade-up"
					   data-delay="<?php echo esc_attr( $cag_acc_delay ); ?>">
						<div class="acc-card-media">
							<?php echo $cag_acc_img; ?>
							<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
						</div>
						<div class="acc-card-body">
							<h3 class="acc-card-title"><?php echo esc_html( $cag_acc_title ); ?></h3>
						</div>
					</a>
					<?php
						$cag_acc_i++;
					endforeach;
					wp_reset_postdata();
					?>

				<?php else : ?>

					<!-- Fallback: shown before any items are selected in ACF -->
					<a class="acc-card has-price-strip" href="<?php echo esc_url( $cag_acc_contact_url ); ?>" data-anim="fade-up" data-delay="0">
						<div class="acc-card-media">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול לכף ריתום דגם 2">
							<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
						</div>
						<div class="acc-card-body">
							<h3 class="acc-card-title">מנעול לכף ריתום דגם 2</h3>
						</div>
					</a>

					<a class="acc-card has-price-strip" href="<?php echo esc_url( $cag_acc_contact_url ); ?>" data-anim="fade-up" data-delay="0.06">
						<div class="acc-card-media">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנשא אופניים לקרוואן">
							<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
						</div>
						<div class="acc-card-body">
							<h3 class="acc-card-title">מנשא אופניים לקרוואן</h3>
						</div>
					</a>

					<a class="acc-card has-price-strip" href="<?php echo esc_url( $cag_acc_contact_url ); ?>" data-anim="fade-up" data-delay="0.12">
						<div class="acc-card-media">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול לכף ריתום">
							<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
						</div>
						<div class="acc-card-body">
							<h3 class="acc-card-title">מנעול לכף ריתום</h3>
						</div>
					</a>

					<a class="acc-card has-price-strip" href="<?php echo esc_url( $cag_acc_contact_url ); ?>" data-anim="fade-up" data-delay="0.18">
						<div class="acc-card-media">
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול שרשרת">
							<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
						</div>
						<div class="acc-card-body">
							<h3 class="acc-card-title">מנעול שרשרת</h3>
						</div>
					</a>

				<?php endif; ?>

			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<?php
get_footer();
