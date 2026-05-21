<?php
/**
 * CAG theme header.
 *
 * Logo + phone come from the ACF "Site Settings" options page (with hardcoded
 * fallbacks via cag_opt()). The nav renders from the 'primary' menu location
 * (Appearance → Menus) — once in the desktop bar, once in the mobile drawer.
 */

$cag_logo_white  = cag_opt( 'logo_white', get_theme_file_uri( 'assets/img/logo_white.png' ) );
$cag_logo_dark   = cag_opt( 'logo_dark', get_theme_file_uri( 'assets/img/logo.png' ) );
$cag_phone       = cag_opt( 'phone_number', '050-550-0180' );
$cag_phone_label = cag_opt( 'phone_label', 'להתקשרות' );
$cag_phone_tel   = 'tel:' . preg_replace( '/[^0-9+]/', '', $cag_phone );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( ! has_site_icon() ) : ?>
		<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.png' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header" id="header">
	<div class="container header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<img src="<?php echo esc_url( $cag_logo_white ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-img logo-white">
			<img src="<?php echo esc_url( $cag_logo_dark ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-img logo-dark">
		</a>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav',
				'menu_id'        => 'nav',
				'depth'          => 2,
				'fallback_cb'    => 'cag_primary_menu_fallback',
			)
		);
		?>

		<div class="header-cta">
			<a href="<?php echo esc_attr( $cag_phone_tel ); ?>" class="phone-btn">
				<i class="fa-solid fa-phone"></i>
				<span>
					<small><?php echo esc_html( $cag_phone_label ); ?></small>
					<?php echo esc_html( $cag_phone ); ?>
				</span>
			</a>
			<button class="hamburger" id="hamburger" aria-label="תפריט">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<div class="drawer" id="drawer">
	<div class="drawer-inner">
		<button class="drawer-close" id="drawerClose" aria-label="סגירה">×</button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'drawer-nav',
				'depth'          => 2,
				'fallback_cb'    => 'cag_primary_menu_fallback',
			)
		);
		?>
		<a href="<?php echo esc_attr( $cag_phone_tel ); ?>" class="drawer-phone">
			<i class="fa-solid fa-phone"></i> <?php echo esc_html( $cag_phone ); ?>
		</a>
	</div>
</div>
