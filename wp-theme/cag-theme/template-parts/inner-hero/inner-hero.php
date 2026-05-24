<?php
/**
 * Inner-page hero — masked frame that opens on load (no scroll-pin).
 * Shared by every inner page; include with:
 *     get_template_part( 'template-parts/inner-hero/inner-hero' );
 *
 * Content is fully dynamic from the current page:
 *   • Breadcrumb → Yoast SEO ([wpseo_breadcrumb]), styled with our chrome.
 *                  Falls back to a בית › title trail when Yoast is inactive.
 *   • Title      → the page title (the_title()).
 *   • Sub-text   → the page Excerpt (only when one is set, so we never dump an
 *                  auto-generated excerpt into the hero). The <p> is always
 *                  output even when empty — inner-hero.js animates it and an
 *                  all-null GSAP target array throws.
 */

$cag_hero_poster = get_theme_file_uri( 'assets/img/hero-compound.jpg' );
$cag_hero_video  = get_theme_file_uri( 'assets/uploads/bg.mp4' );

// On a CPT archive there is no singular post, so the_title()/has_excerpt() don't apply.
// Allow the archive template to set the title/sub-text via query vars; fall back to the
// post-type archive title. Regular pages/posts keep using the page title + excerpt.
if ( is_post_type_archive() ) {
	$cag_hero_title = get_query_var( 'cag_hero_title' ) ?: post_type_archive_title( '', false );
	$cag_hero_text  = get_query_var( 'cag_hero_subtitle' ) ?: '';
} else {
	$cag_hero_title = get_the_title();
	$cag_hero_text  = has_excerpt() ? get_the_excerpt() : '';
}
?>
<section class="hero" id="hero">
    <div class="hero-stage">
        <div class="hero-frame">
            <video class="hero-img hero-video"
                   poster="<?php echo esc_url( $cag_hero_poster ); ?>"
                   muted playsinline preload="none"
                   data-src="<?php echo esc_url( $cag_hero_video ); ?>"></video>
            <div class="hero-veil"></div>
            <div class="hero-scrim" aria-hidden="true"></div>
            <div class="hero-pattern" aria-hidden="true"></div>
            <div class="hero-corner hero-corner-tl" aria-hidden="true"></div>
            <div class="hero-corner hero-corner-tr" aria-hidden="true"></div>
            <div class="hero-corner hero-corner-bl" aria-hidden="true"></div>
            <div class="hero-corner hero-corner-br" aria-hidden="true"></div>

            <div class="hero-content">
                <?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
                    <?php yoast_breadcrumb( '<nav class="hero-breadcrumbs" aria-label="פירורי לחם">', '</nav>' ); ?>
                <?php else : ?>
                    <nav class="hero-breadcrumbs" aria-label="פירורי לחם">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">בית</a>
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                        <span aria-current="page"><?php echo esc_html( $cag_hero_title ); ?></span>
                    </nav>
                <?php endif; ?>

                <h1>
                    <span class="hero-line-1"><?php echo esc_html( $cag_hero_title ); ?></span>
                </h1>
                <p class="hero-text"><?php echo esc_html( $cag_hero_text ); ?></p>
            </div>

            <div class="hero-scroll-hint">
                <span>גלילה</span>
                <span class="line"></span>
            </div>
        </div>
    </div>
</section>
