<?php
/**
 * CAG theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 *
 * Declares the editor/front-end features the theme relies on. Notably
 * `post-thumbnails` — without it WordPress hides the "Featured image" panel
 * in the post editor and `the_post_thumbnail()` always returns empty, so the
 * blog (home.php / single.php) could never show real post images.
 */
function cag_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	// Pages need an Excerpt field — the inner-page hero uses it as its sub-text.
	// (Pages don't support excerpts by default.)
	add_post_type_support( 'page', 'excerpt' );

	// Editable menus (Appearance → Menus). 'primary' renders in both the
	// desktop header nav and the mobile drawer; 'footer' is the footer
	// "production lines" column.
	register_nav_menus(
		array(
			'primary' => __( 'תפריט ראשי', 'cag' ),
			'footer'  => __( 'תפריט פוטר', 'cag' ),
		)
	);
}
add_action( 'after_setup_theme', 'cag_theme_setup' );

// ACF options page + field-group registration (PHP-defined, version-controlled).
require_once get_theme_file_path( 'inc/acf-options.php' );

// Per-page-template ACF field groups (PHP-defined, version-controlled).
require_once get_theme_file_path( 'inc/acf-about-us.php' );

/**
 * Read a value from the ACF "Site Settings" options page, with a fallback.
 *
 * Safe whether or not ACF is active: if ACF (or the value) is missing, returns
 * $fallback — so the theme keeps rendering the original hardcoded chrome.
 *
 * @param string $name     ACF field name on the options page.
 * @param mixed  $fallback Returned when ACF is inactive or the field is empty.
 * @return mixed
 */
function cag_opt( $name, $fallback = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $name, 'option' );
		if ( $val !== null && $val !== '' && $val !== false && $val !== array() ) {
			return $val;
		}
	}
	return $fallback;
}

/**
 * URL from an ACF Link field on the options page, with a fallback.
 *
 * Convention: Link fields are used for every internal (or mixed) link; the
 * plain URL field is reserved for links that always point outside the site.
 * Handles return_format 'array' (default) or 'url', and ACF being inactive.
 *
 * @param string $name     ACF link-field name on the options page.
 * @param string $fallback Returned when empty / ACF inactive.
 * @return string
 */
function cag_link_url( $name, $fallback = '#' ) {
	$link = cag_opt( $name, null );
	if ( is_array( $link ) && ! empty( $link['url'] ) ) {
		return $link['url'];
	}
	if ( is_string( $link ) && '' !== $link ) {
		return $link;
	}
	return $fallback;
}

/**
 * Target ('_blank' / '') from an ACF Link field, with a fallback.
 *
 * @param string $name     ACF link-field name on the options page.
 * @param string $fallback Returned when no target is set.
 * @return string
 */
function cag_link_target( $name, $fallback = '' ) {
	$link = cag_opt( $name, null );
	if ( is_array( $link ) && ! empty( $link['target'] ) ) {
		return $link['target'];
	}
	return $fallback;
}

/**
 * Fallback for the primary menu when no menu is assigned to the location yet.
 *
 * Renders nothing rather than WordPress's default "list pages" output, so the
 * header doesn't fill with every page before the client builds the real menu.
 * (The header CTA/phone still render; only the nav list is empty until set.)
 */
function cag_primary_menu_fallback() {
	echo '';
}

/**
 * Fallback for the footer "production lines" menu when none is assigned.
 *
 * Renders the original static links so the footer column isn't empty before
 * the client builds the 'footer' menu in Appearance → Menus.
 */
function cag_footer_menu_fallback() {
	$links = array(
		'דגם שחף'          => '/#models',
		'דגם לופט'         => '/#models',
		'דגם בית ספר שדה'  => '/#models',
		'מבנה שירותים'     => '/#models',
	);
	echo '<ul class="menu">';
	foreach ( $links as $label => $path ) {
		printf(
			'<li class="menu-item"><a href="%s">%s</a></li>',
			esc_url( home_url( $path ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Enqueue theme assets.
 */
function cag_enqueue_assets() {

	/* ---- Stylesheets (global) ---- */

	wp_enqueue_style(
		'cag-google-fonts',
		'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&family=Frank+Ruhl+Libre:wght@500;700;900&family=Heebo:wght@400;500;700;800;900&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'cag-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	// Theme's main stylesheet: design tokens + resets + utilities + all site chrome
	// (topbar, header, drawer, buttons, pre-footer-contact, footer, float-wa, responsive).
	// Loaded on every page.
	wp_enqueue_style(
		'cag-style',
		get_stylesheet_uri(),
		array( 'cag-google-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	/* ---- Scripts (global) ---- */

	wp_enqueue_script(
		'cag-gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
		array(),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'cag-gsap-scrolltrigger',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
		array( 'cag-gsap' ),
		'3.12.5',
		true
	);

	wp_enqueue_script(
		'cag-script',
		get_theme_file_uri( 'assets/js/script.js' ),
		array( 'cag-gsap-scrolltrigger' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

	/* ---- Per-template assets ---- */

	// Front page: homepage-specific sections (hero, models, about, foodtrack,
	// authorities, security, catalog, articles, social marquee).
	if ( is_front_page() ) {
		wp_enqueue_style(
			'cag-front-page',
			get_theme_file_uri( 'assets/css/front-page.css' ),
			array( 'cag-style' ),
			wp_get_theme()->get( 'Version' )
		);
	}

	// For any page using a custom Template, auto-enqueue its sibling .css and .js
	// (same filename, same folder as the template's .php). No manual entry needed.
	cag_auto_enqueue_template_assets();

	// Per-template: declare which shared template-parts the page uses.
	if ( is_page_template( 'page-templates/about-us.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/kachol-lavan.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/foodtrucks.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/security-living.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
	}

	if ( is_page_template( 'page-templates/security-trailers.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
	}

	if ( is_page_template( 'page-templates/caravan-camparks.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/tourist-complexes.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/accessories.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
	}

	if ( is_page_template( 'page-templates/caravans.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/local-models.php' ) ) {
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
		cag_enqueue_faq();
	}

	if ( is_page_template( 'page-templates/contact-us.php' ) ) {
		cag_enqueue_inner_hero();
	}

	if ( is_page_template( 'page-templates/videos-page.php' ) ) {
		cag_enqueue_inner_hero();
	}

	// Blog posts index (the page set under Settings → Reading → "Posts page").
	// home.php / single.php aren't custom Templates, so the auto-enqueue helper
	// and is_page_template() don't apply — enqueue by query context instead.
	if ( is_home() && ! is_front_page() ) {
		wp_enqueue_style(
			'cag-blog',
			get_theme_file_uri( 'assets/css/blog.css' ),
			array( 'cag-style' ),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_script(
			'cag-blog',
			get_theme_file_uri( 'assets/js/blog.js' ),
			array( 'cag-gsap-scrolltrigger' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
	}

	// Single blog post. Loads the archive CSS too — the related-posts block
	// reuses the `.article-card` / `.blog-grid` styles (as the static post
	// page did via `../style.css`).
	if ( is_singular( 'post' ) ) {
		wp_enqueue_style(
			'cag-blog',
			get_theme_file_uri( 'assets/css/blog.css' ),
			array( 'cag-style' ),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_style(
			'cag-single',
			get_theme_file_uri( 'assets/css/single.css' ),
			array( 'cag-blog' ),
			wp_get_theme()->get( 'Version' )
		);
		wp_enqueue_script(
			'cag-single',
			get_theme_file_uri( 'assets/js/single.js' ),
			array( 'cag-gsap-scrolltrigger' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
		cag_enqueue_inner_hero();
		cag_enqueue_mini_contact();
	}
}
add_action( 'wp_enqueue_scripts', 'cag_enqueue_assets' );

/**
 * Auto-enqueue per-template CSS/JS by convention.
 *
 * When a page is rendered with a custom Template, this helper looks in
 * `assets/css/{name}.css` and `assets/js/{name}.js` (where {name} is the
 * template filename without extension) and enqueues whichever exist.
 * Skips silently if no matching file is found.
 *
 *   page-templates/about-us.php  →  assets/css/about-us.css  +  assets/js/about-us.js
 *
 * Add a new page template by:
 *   1. Dropping `page-templates/{name}.php` with a "Template Name:" header.
 *   2. (Optional) Dropping `assets/css/{name}.css` and/or `assets/js/{name}.js`.
 * No changes here.
 */
function cag_auto_enqueue_template_assets() {
	$template = get_page_template_slug();
	if ( ! $template ) {
		return;
	}

	$name     = basename( $template, '.php' );
	$css_path = 'assets/css/' . $name . '.css';
	$js_path  = 'assets/js/'  . $name . '.js';
	$handle   = 'cag-page-' . $name;
	$version  = wp_get_theme()->get( 'Version' );

	if ( file_exists( get_theme_file_path( $css_path ) ) ) {
		wp_enqueue_style( $handle, get_theme_file_uri( $css_path ), array( 'cag-style' ), $version );
	}

	if ( file_exists( get_theme_file_path( $js_path ) ) ) {
		wp_enqueue_script( $handle, get_theme_file_uri( $js_path ), array( 'cag-gsap-scrolltrigger' ), $version, true );
	}
}

/**
 * Enqueue inner-hero template part assets.
 */
function cag_enqueue_inner_hero() {
	wp_enqueue_style(
		'cag-tp-inner-hero',
		get_theme_file_uri( 'template-parts/inner-hero/inner-hero.css' ),
		array( 'cag-style' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'cag-tp-inner-hero',
		get_theme_file_uri( 'template-parts/inner-hero/inner-hero.js' ),
		array( 'cag-gsap-scrolltrigger' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

/**
 * Enqueue FAQ template part assets.
 */
function cag_enqueue_faq() {
	wp_enqueue_style(
		'cag-tp-faq',
		get_theme_file_uri( 'template-parts/faq/faq.css' ),
		array( 'cag-style' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'cag-tp-faq',
		get_theme_file_uri( 'template-parts/faq/faq.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

/**
 * Enqueue mini-contact template part assets.
 */
function cag_enqueue_mini_contact() {
	wp_enqueue_style(
		'cag-tp-mini-contact',
		get_theme_file_uri( 'template-parts/mini-contact/mini-contact.css' ),
		array( 'cag-style' ),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'cag-tp-mini-contact',
		get_theme_file_uri( 'template-parts/mini-contact/mini-contact.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

/**
 * Featured-image URL for the current post, with a theme fallback.
 *
 * Used by the blog index, single post hero, and article cards so a post
 * without a featured image still shows something sensible.
 *
 * @param string $size Registered image size (e.g. 'large', 'medium_large', 'full').
 * @return string Image URL.
 */
function cag_thumb_url( $size = 'large' ) {
	if ( has_post_thumbnail() ) {
		$url = get_the_post_thumbnail_url( null, $size );
		if ( $url ) {
			return $url;
		}
	}
	return get_theme_file_uri( 'assets/img/article1.jpg' );
}

/**
 * Estimated reading time, in whole minutes (min 1).
 *
 * WordPress has no native read-time. Counts whitespace-separated tokens
 * (works for Hebrew, unlike str_word_count) at ~200 wpm.
 *
 * @param int|null $post_id Defaults to the current post.
 * @return int Minutes.
 */
function cag_reading_time( $post_id = null ) {
	$content = get_post_field( 'post_content', $post_id ? $post_id : get_the_ID() );
	$text    = wp_strip_all_tags( strip_shortcodes( (string) $content ) );
	$words   = preg_split( '/\s+/', trim( $text ), -1, PREG_SPLIT_NO_EMPTY );
	$count   = is_array( $words ) ? count( $words ) : 0;
	return max( 1, (int) ceil( $count / 200 ) );
}

/**
 * URL of the blog posts index (Settings → Reading "Posts page"), or home.
 *
 * @return string
 */
function cag_blog_url() {
	$posts_page = (int) get_option( 'page_for_posts' );
	if ( $posts_page ) {
		return get_permalink( $posts_page );
	}
	return home_url( '/' );
}

/**
 * Add the active page template's filename as a body class.
 *
 * Lets static prototype's `.about-us .au-row-section`-style selectors keep
 * working without modification. Derived from the template filename, not
 * the page slug.
 */
function cag_body_class_from_template( $classes ) {
	if ( is_page() ) {
		$template = get_page_template_slug();
		if ( $template ) {
			$slug = basename( $template, '.php' );
			$classes[] = sanitize_html_class( $slug );
		}
	}

	// Blog index + single posts use the static prototype's body-class scoping
	// (`.blog-page` / `.blog-post-page`). home.php / single.php carry no
	// template slug, so add the classes here by query context.
	if ( is_home() && ! is_front_page() ) {
		$classes[] = 'blog-page';
	}
	if ( is_singular( 'post' ) ) {
		$classes[] = 'blog-page';
		$classes[] = 'blog-post-page';
	}

	return $classes;
}
add_filter( 'body_class', 'cag_body_class_from_template' );

add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Make Yoast's breadcrumb separator our FontAwesome chevron, so the Yoast
 * trail in the inner-page hero keeps the original prototype style
 * (.hero-breadcrumbs i is already styled). Only affects Yoast output.
 */
add_filter(
	'wpseo_breadcrumb_separator',
	function () {
		return '<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>';
	}
);
