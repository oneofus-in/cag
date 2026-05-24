<?php
/**
 * "Models" (דגמים) custom post type + its taxonomies.
 *
 * Each model is a trailer/caravan with its own page at /listings/<post-slug>.
 * Replaces the previously hardcoded model cards in page-templates/caravans.php
 * and local-models.php with managed posts.
 *
 * Taxonomies are registered before the post type (same init callback) so their
 * admin metaboxes attach cleanly:
 *   • brand  (יצרן)  — manufacturer/importer; carries a logo (ACF term field).
 *   • series (סדרה)  — product line within a manufacturer (e.g. Travelino, Soul).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'cag_register_models_cpt' );

/**
 * Register the model CPT and its three taxonomies, and self-heal rewrite rules.
 */
function cag_register_models_cpt() {

	/* ── Taxonomies first ── */

	// Manufacturer (יצרן) — hierarchical, logo added via the group_cag_brand ACF
	// group. Taxonomy key stays 'brand' to preserve the logo group + any terms.
	register_taxonomy(
		'brand',
		array( 'model' ),
		array(
			'labels'            => array(
				'name'          => 'יצרנים',
				'singular_name' => 'יצרן',
				'menu_name'     => 'יצרנים',
				'add_new_item'  => 'הוספת יצרן',
				'edit_item'     => 'עריכת יצרן',
				'update_item'   => 'עדכון יצרן',
				'search_items'  => 'חיפוש יצרנים',
				'all_items'     => 'כל היצרנים',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'brand' ),
		)
	);

	// Series (סדרה) — product line within a manufacturer.
	register_taxonomy(
		'series',
		array( 'model' ),
		array(
			'labels'            => array(
				'name'          => 'סדרות',
				'singular_name' => 'סדרה',
				'menu_name'     => 'סדרות',
				'add_new_item'  => 'הוספת סדרה',
				'edit_item'     => 'עריכת סדרה',
				'update_item'   => 'עדכון סדרה',
				'search_items'  => 'חיפוש סדרות',
				'all_items'     => 'כל הסדרות',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'series' ),
		)
	);

	/* ── The post type ── */

	register_post_type(
		'model',
		array(
			'labels'        => array(
				'name'               => 'דגמים',
				'singular_name'      => 'דגם',
				'menu_name'          => 'דגמים',
				'add_new'            => 'הוספת דגם',
				'add_new_item'       => 'הוספת דגם חדש',
				'edit_item'          => 'עריכת דגם',
				'new_item'           => 'דגם חדש',
				'view_item'          => 'צפייה בדגם',
				'view_items'         => 'צפייה בדגמים',
				'search_items'       => 'חיפוש דגמים',
				'not_found'          => 'לא נמצאו דגמים',
				'not_found_in_trash' => 'לא נמצאו דגמים בפח',
				'all_items'          => 'כל הדגמים',
			),
			'public'        => true,
			'has_archive'   => true, // Archive at /listings/ (archive-model.php), grouped by brand.
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-bank',
			'menu_position' => 22,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'    => array( 'brand', 'series' ),
			// /listings/<slug>, with_front=false keeps it free of any permalink prefix.
			'rewrite'       => array(
				'slug'       => 'listings',
				'with_front' => false,
			),
		)
	);

	// One-time rewrite flush. The theme has no activation hook, so guard a single
	// flush with an option — this self-heals on the next load after deploy without
	// requiring a manual Settings → Permalinks → Save. after_switch_theme (below)
	// clears the flag so re-activating the theme re-flushes.
	if ( '1' !== get_option( 'cag_models_rewrite_flushed_v2' ) ) {
		flush_rewrite_rules( false );
		update_option( 'cag_models_rewrite_flushed_v2', '1' );
	}
}

/**
 * Force a fresh rewrite flush whenever the theme is (re)activated.
 */
add_action(
	'after_switch_theme',
	function () {
		delete_option( 'cag_models_rewrite_flushed' );
	}
);
