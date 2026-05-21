<?php
/**
 * ACF field group for the "About Us" page template
 * (page-templates/about-us.php).
 *
 * PHP-registered (version-controlled, deploys with the theme); the client
 * edits values only. The template falls back to its original hardcoded rows
 * when ACF is inactive or the repeater is empty, so the page is never blank.
 *
 * One "content rows" repeater drives the alternating text+image rows. Layout
 * (image side + background flip) is auto-derived from row position in the
 * template, so the editor never manages layout.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'cag_register_about_us_fields' );
function cag_register_about_us_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_cag_about_us',
			'title'  => 'תוכן עמוד אודות',
			'fields' => array(
				array(
					'key'          => 'field_cag_au_rows',
					'label'        => 'שורות תוכן',
					'name'         => 'au_rows',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'הוספת שורה',
					'instructions' => 'כל שורה מוצגת לסירוגין (תמונה מימין/משמאל) עם רקע מתחלף — אין צורך להגדיר פריסה.',
					'sub_fields'   => array(
						array( 'key' => 'field_cag_au_eyebrow', 'label' => 'תווית עליונה', 'name' => 'eyebrow', 'type' => 'text' ),
						array( 'key' => 'field_cag_au_heading', 'label' => 'כותרת', 'name' => 'heading', 'type' => 'text' ),
						array( 'key' => 'field_cag_au_highlight', 'label' => 'כותרת מודגשת (גרדיאנט)', 'name' => 'heading_highlight', 'type' => 'text', 'instructions' => 'החלק הצבעוני של הכותרת — מופיע אחרי הכותרת הרגילה.' ),
						array( 'key' => 'field_cag_au_body', 'label' => 'תוכן', 'name' => 'body', 'type' => 'wysiwyg', 'tabs' => 'visual', 'toolbar' => 'basic', 'media_upload' => 0 ),
						array( 'key' => 'field_cag_au_tagline', 'label' => 'שורת סיום (אופציונלי)', 'name' => 'tagline', 'type' => 'text' ),
						array( 'key' => 'field_cag_au_image', 'label' => 'תמונה', 'name' => 'image', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium' ),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'page-templates/about-us.php',
					),
				),
			),
		)
	);
}
