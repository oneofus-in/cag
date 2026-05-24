<?php
/**
 * ACF "Site Settings" options page (the wp-admin → הגדרות אתר menu).
 *
 * Only the options *page* is registered here (in PHP, so the admin menu always
 * exists and deploys with the theme). The field GROUP that fills this page is
 * now managed via ACF Local JSON (theme acf-json/group_cag_site_settings.json):
 * edit it in the UI, and ACF auto-saves changes back to that JSON file.
 *
 * Guarded by function_exists(), so the theme is harmless if ACF is ever
 * deactivated; templates fall back to hardcoded chrome via cag_opt().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ── Options page ── */
add_action( 'acf/init', 'cag_register_options_page' );
function cag_register_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}
	acf_add_options_page(
		array(
			'page_title' => 'הגדרות אתר',
			'menu_title' => 'הגדרות אתר',
			'menu_slug'  => 'cag-site-settings',
			'capability' => 'edit_theme_options',
			'position'   => 59,
			'icon_url'   => 'dashicons-admin-generic',
			'redirect'   => false,
		)
	);
}
