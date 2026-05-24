<?php
/**
 * Single blog post.
 *
 * Ported from the static prototype's pages/blog/post/index.html, driven by
 * real post data:
 *   - Hero          = featured image + category + title + meta.
 *   - Body          = the Excerpt field as the lead paragraph (.post-lead),
 *                     then the_content() inside .post-article (CSS styles
 *                     generic h2/h3/p, so normal editor content is styled).
 *   - Tags / share  = WP tags + the static share buttons (single.js wires them).
 *   - Related       = up to 3 posts from the same category.
 *
 * Body classes `blog-page blog-post-page` are added by
 * cag_body_class_from_template() so the prototype's CSS keeps matching.
 */
get_header();

while ( have_posts() ) :
	the_post();
	$cag_cat = get_the_category();
?>

<main class="page-top">

	<!-- ══ Hero ══ -->
	<section class="hero hero--post" id="hero">
		<div class="hero-stage">
			<div class="hero-frame">
				<img class="hero-img"
				     src="<?php echo esc_url( cag_thumb_url( 'full' ) ); ?>"
				     alt="<?php the_title_attribute(); ?>">
				<div class="hero-veil"></div>
				<div class="hero-scrim" aria-hidden="true"></div>
				<div class="hero-pattern" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-tl" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-tr" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-bl" aria-hidden="true"></div>
				<div class="hero-corner hero-corner-br" aria-hidden="true"></div>
				<div class="hero-dimension" aria-hidden="true"><span><?php echo $cag_cat ? esc_html( $cag_cat[0]->name ) : 'בלוג'; ?> · ייצור ישראלי</span></div>

				<div class="hero-content hero-content--post">
					<nav class="hero-breadcrumbs" aria-label="פירורי לחם">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">בית</a>
						<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
						<a href="<?php echo esc_url( cag_blog_url() ); ?>">בלוג</a>
						<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
						<span aria-current="page"><?php the_title(); ?></span>
					</nav>

					<?php if ( $cag_cat ) : ?>
						<span class="post-cat-pill">
							<i class="fa-solid fa-flag"></i> <?php echo esc_html( $cag_cat[0]->name ); ?>
						</span>
					<?php endif; ?>

					<h1>
						<span class="hero-line-1"><?php the_title(); ?></span>
					</h1>

					<?php
					// Hidden on single (single.css: .hero-text { display:none }), but kept
					// present so the inner-hero entrance animation always has a .hero-text
					// target. Without it, inner-hero.js throws on an all-null GSAP target and
					// the timeline never runs — leaving the whole hero stuck at opacity:0.
					?>
					<p class="hero-text" aria-hidden="true"></p>

					<ul class="post-meta">
						<li><i class="fa-regular fa-user"></i> מאת <strong>Cag Team</strong></li>
						<li><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></li>
						<li><i class="fa-regular fa-clock"></i> <?php echo esc_html( cag_reading_time() ); ?> דק׳ קריאה</li>
					</ul>
				</div>

				<div class="hero-scroll-hint">
					<span>גלילה</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ Article body ══ -->
	<section class="section post-body-section">
		<div class="container post-container">

			<article class="post-article" data-anim="fade-up">

				<?php if ( has_excerpt() ) : ?>
					<p class="post-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>

				<?php the_content(); ?>

				<!-- Tags + share -->
				<footer class="post-footer">
					<?php
					$cag_tags = get_the_tags();
					if ( $cag_tags ) :
					?>
						<div class="post-tags">
							<span class="post-tags-label">תגיות:</span>
							<?php foreach ( $cag_tags as $cag_tag ) : ?>
								<a href="<?php echo esc_url( get_tag_link( $cag_tag->term_id ) ); ?>">#<?php echo esc_html( $cag_tag->name ); ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php
					$cag_share_url   = rawurlencode( get_permalink() );
					$cag_share_title = rawurlencode( get_the_title() );
					?>
					<div class="post-share">
						<span class="post-share-label">שיתוף:</span>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $cag_share_url; ?>" class="post-share-btn" aria-label="שיתוף בפייסבוק" target="_blank" rel="noopener">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="https://wa.me/?text=<?php echo $cag_share_title; ?>%20<?php echo $cag_share_url; ?>" class="post-share-btn" aria-label="שיתוף בוואטסאפ" target="_blank" rel="noopener">
							<i class="fa-brands fa-whatsapp"></i>
						</a>
						<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $cag_share_url; ?>" class="post-share-btn" aria-label="שיתוף בלינקדאין" target="_blank" rel="noopener">
							<i class="fa-brands fa-linkedin-in"></i>
						</a>
						<a href="#" class="post-share-btn" aria-label="העתקת קישור">
							<i class="fa-solid fa-link"></i>
						</a>
					</div>
				</footer>

			</article>

		</div>
	</section>

	<?php
	// ── Related posts: up to 3 from the same (primary) category ──
	if ( $cag_cat ) :
		$cag_related = new WP_Query( array(
			'category__in'        => array( $cag_cat[0]->term_id ),
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );
		if ( $cag_related->have_posts() ) :
	?>
	<!-- ══ Related posts ══ -->
	<section class="section post-related-section">
		<div class="container">
			<div class="section-head section-head--with-rule" data-anim="fade-up">
				<span class="eyebrow">המשך קריאה</span>
				<h2>כתבות <span class="gradient-text">נוספות שיעניינו אתכם</span></h2>
			</div>

			<div class="articles-grid blog-grid">
				<?php
				while ( $cag_related->have_posts() ) :
					$cag_related->the_post();
					$cag_r_cat = get_the_category();
				?>
					<article class="article-card" data-anim="fade-up">
						<a href="<?php the_permalink(); ?>" class="article-img">
							<img src="<?php echo esc_url( cag_thumb_url( 'medium_large' ) ); ?>" alt="<?php the_title_attribute(); ?>">
						</a>
						<div class="article-body">
							<?php if ( $cag_r_cat ) : ?>
								<span class="article-cat"><?php echo esc_html( $cag_r_cat[0]->name ); ?></span>
							<?php endif; ?>
							<h3><?php the_title(); ?></h3>
							<p class="article-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
							<div class="article-foot">
								<span class="blog-meta-item"><i class="fa-regular fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
								<a href="<?php the_permalink(); ?>" class="article-link">לקריאה <i class="fa-solid fa-arrow-left"></i></a>
							</div>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<div class="post-related-cta" data-anim="fade-up">
				<a href="<?php echo esc_url( cag_blog_url() ); ?>" class="btn btn-outline">
					חזרה לכל הכתבות <i class="fa-solid fa-arrow-left"></i>
				</a>
			</div>
		</div>
	</section>
	<?php
		endif;
	endif;
	?>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<?php
endwhile;

get_footer();
