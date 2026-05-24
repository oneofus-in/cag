<?php
/**
 * Blog posts index.
 *
 * Rendered for the page set under Settings → Reading → "Posts page".
 * Ported from the static prototype's pages/blog/index.html, but driven by
 * real WordPress posts:
 *   - Featured slot  = latest post (excluded from the grid below).
 *   - Grid           = the main query loop.
 *   - Category pills = real WP categories (client-side filter via blog.js).
 *   - "Load more"    = static stub kept as-is (no real loading).
 *
 * Body classes `blog-page` is added by cag_body_class_from_template() so the
 * prototype's `.blog-page ...` CSS keeps matching.
 */
get_header();
?>

<main class="page-top">

	<!-- ══ Hero ══ -->
	<section class="hero" id="hero">
		<div class="hero-stage">
			<div class="hero-frame">
				<video class="hero-img hero-video"
				       poster="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-compound.jpg' ) ); ?>"
				       muted playsinline preload="none"
				       data-src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/bg.mp4' ) ); ?>"></video>
				<div class="hero-veil"></div>
				<div class="hero-scrim" aria-hidden="true"></div>
				<div class="hero-pattern" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-tl" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-tr" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-bl" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-br" aria-hidden="true"></div>
				<div class="hero-dimension" aria-hidden="true"><span>סיפורים · מדריכים · פרויקטים</span></div>

				<div class="hero-content">
					<nav class="hero-breadcrumbs" aria-label="פירורי לחם">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">בית</a>
						<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
						<span aria-current="page">בלוג ומאמרים</span>
					</nav>
					<h1>
						<span class="hero-line-1">הבלוג שלנו</span>
					</h1>
					<p class="hero-text">
						כתבות, מדריכים וסיפורים מאחורי הקלעים של פרויקטים שהקמנו –
						מהשטח, מהמפעל ומהלקוחות שלנו
					</p>
				</div>

				<div class="hero-scroll-hint">
					<span>גלילה</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	</section>

	<?php
	// ── Featured post = latest published post (excluded from the grid below) ──
	$cag_featured_id = 0;
	$cag_featured    = new WP_Query( array(
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	) );
	if ( $cag_featured->have_posts() ) :
		while ( $cag_featured->have_posts() ) :
			$cag_featured->the_post();
			$cag_featured_id = get_the_ID();
			$cag_f_cat       = get_the_category();
	?>
	<!-- ══ Featured post ══ -->
	<section class="section blog-featured-section" id="featured">
		<div class="container">
			<div class="section-head section-head--with-rule" data-anim="fade-up">
				<span class="eyebrow">כתבה מומלצת</span>
				<h2>הכתבה <span class="gradient-text">החמה ביותר</span></h2>
			</div>

			<article class="blog-featured" data-anim="zoom-in">
				<a href="<?php the_permalink(); ?>" class="blog-featured-img">
					<img src="<?php echo esc_url( cag_thumb_url( 'large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
					<span class="blog-featured-badge">
						<i class="fa-solid fa-star"></i> כתבה מומלצת
					</span>
				</a>
				<div class="blog-featured-body">
					<div class="blog-featured-meta">
						<?php if ( $cag_f_cat ) : ?>
							<span class="article-cat"><?php echo esc_html( $cag_f_cat[0]->name ); ?></span>
						<?php endif; ?>
						<span class="blog-meta-item"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
						<span class="blog-meta-item"><i class="fa-regular fa-clock"></i> <?php echo esc_html( cag_reading_time() ); ?> דק׳ קריאה</span>
					</div>
					<h2><?php the_title(); ?></h2>
					<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn btn-primary">
						לקריאת הכתבה <i class="fa-solid fa-arrow-left"></i>
					</a>
				</div>
			</article>
		</div>
	</section>
	<?php
		endwhile;
		wp_reset_postdata();
	endif;
	?>

	<!-- ══ All posts grid ══ -->
	<section class="section blog-grid-section" id="all-posts">
		<div class="container">
			<div class="section-head section-head--with-rule" data-anim="fade-up">
				<span class="eyebrow">ארכיון</span>
				<h2>כל <span class="gradient-text">הכתבות והמדריכים</span></h2>
			</div>

			<div class="articles-grid blog-grid">
				<?php if ( have_posts() ) : ?>
					<?php
					while ( have_posts() ) :
						the_post();
						if ( get_the_ID() === $cag_featured_id ) {
							continue; // already shown as the featured post
						}
						$cag_cat      = get_the_category();
						$cag_cat_slug = $cag_cat ? $cag_cat[0]->slug : '';
						$cag_cat_name = $cag_cat ? $cag_cat[0]->name : '';
					?>
						<article class="article-card" data-anim="fade-up" data-cat="<?php echo esc_attr( $cag_cat_slug ); ?>">
							<a href="<?php the_permalink(); ?>" class="article-img">
								<img src="<?php echo esc_url( cag_thumb_url( 'medium_large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
							<div class="article-body">
								<?php if ( $cag_cat_name ) : ?>
									<span class="article-cat"><?php echo esc_html( $cag_cat_name ); ?></span>
								<?php endif; ?>
								<h3><?php the_title(); ?></h3>
								<p class="article-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
								<div class="article-foot">
									<span class="blog-meta-item"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
									<a href="<?php the_permalink(); ?>" class="article-link">לקריאה <i class="fa-solid fa-arrow-left"></i></a>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<!-- Load more (static stub kept as-is — no real loading) -->
			<div class="blog-loadmore-wrap" data-anim="fade-up">
				<button class="btn btn-outline" type="button" id="blog-loadmore">
					טעינת כתבות נוספות <i class="fa-solid fa-arrow-down"></i>
				</button>
			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<?php
get_footer();
