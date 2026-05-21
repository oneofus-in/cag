<?php
/**
 * ACF "Site Settings" options page + fields (PHP-registered).
 *
 * Defining the options page and field group in PHP keeps them in the theme
 * (version-controlled, deploys with the theme — no manual rebuild on the
 * server). The client edits the *values* under wp-admin → הגדרות אתר.
 *
 * Everything is guarded by function_exists(), so the theme is harmless if ACF
 * is ever deactivated; templates fall back to hardcoded chrome via cag_opt().
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

/* ── Field group ── */
add_action( 'acf/init', 'cag_register_options_fields' );
function cag_register_options_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_cag_site_settings',
			'title'    => 'הגדרות אתר',
			'fields'   => array(

				/* ===== Header tab ===== */
				array( 'key' => 'field_cag_tab_header', 'label' => 'הדר', 'type' => 'tab' ),
				array( 'key' => 'field_cag_logo_white', 'label' => 'לוגו בהיר (על רקע כהה)', 'name' => 'logo_white', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
				array( 'key' => 'field_cag_logo_dark', 'label' => 'לוגו כהה (כשהכותרת לבנה)', 'name' => 'logo_dark', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
				array( 'key' => 'field_cag_phone_label', 'label' => 'תווית טלפון', 'name' => 'phone_label', 'type' => 'text', 'default_value' => 'להתקשרות' ),
				array( 'key' => 'field_cag_phone_number', 'label' => 'מספר טלפון (תצוגה)', 'name' => 'phone_number', 'type' => 'text', 'default_value' => '050-550-0180', 'instructions' => 'מוצג ככתבה; קישור ההתקשרות נגזר ממנו אוטומטית.' ),

				/* ===== Pre-footer + contact tab ===== */
				array( 'key' => 'field_cag_tab_contact', 'label' => 'יצירת קשר', 'type' => 'tab' ),
				array( 'key' => 'field_cag_prefooter_heading', 'label' => 'כותרת טופס יצירת קשר', 'name' => 'prefooter_heading', 'type' => 'text', 'default_value' => 'נשמח לשמוע ממך' ),
				array( 'key' => 'field_cag_prefooter_text', 'label' => 'תיאור טופס יצירת קשר', 'name' => 'prefooter_text', 'type' => 'textarea', 'rows' => 3 ),
				array( 'key' => 'field_cag_prefooter_image', 'label' => 'תמונת טופס יצירת קשר', 'name' => 'prefooter_image', 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium' ),
				array( 'key' => 'field_cag_contact_heading', 'label' => 'כותרת "צור קשר" בפוטר', 'name' => 'contact_heading', 'type' => 'text', 'default_value' => 'צור קשר' ),
				array( 'key' => 'field_cag_contact_phone', 'label' => 'טלפון', 'name' => 'contact_phone', 'type' => 'text', 'default_value' => '050-550-0180' ),
				array( 'key' => 'field_cag_contact_email', 'label' => 'אימייל', 'name' => 'contact_email', 'type' => 'text', 'default_value' => 'ag0505500180@gmail.com' ),
				array( 'key' => 'field_cag_contact_address', 'label' => 'כתובת (תצוגה)', 'name' => 'contact_address', 'type' => 'text', 'default_value' => 'יוחנן הסנדלר 8, אזור תעשייה כפר סבא' ),
				array( 'key' => 'field_cag_contact_address_link', 'label' => 'קישור ניווט לכתובת (Waze/Maps)', 'name' => 'contact_address_link', 'type' => 'link', 'return_format' => 'array' ),
				array( 'key' => 'field_cag_whatsapp', 'label' => 'מספר וואטסאפ (ספרות בלבד, כולל קידומת מדינה)', 'name' => 'whatsapp_number', 'type' => 'text', 'default_value' => '972505500180', 'instructions' => 'לדוגמה: 972505500180' ),

				/* ===== Footer tab ===== */
				array( 'key' => 'field_cag_tab_footer', 'label' => 'פוטר', 'type' => 'tab' ),
				array( 'key' => 'field_cag_footer_tagline', 'label' => 'תיאור בפוטר (מתחת ללוגו)', 'name' => 'footer_tagline', 'type' => 'textarea', 'rows' => 3, 'new_lines' => 'br' ),
				array( 'key' => 'field_cag_hours_heading', 'label' => 'כותרת שעות פתיחה', 'name' => 'hours_heading', 'type' => 'text', 'default_value' => 'שעות פתיחה' ),
				array(
					'key'          => 'field_cag_hours',
					'label'        => 'שעות פתיחה',
					'name'         => 'hours',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'הוספת שורה',
					'sub_fields'   => array(
						array( 'key' => 'field_cag_hours_day', 'label' => 'יום/ימים', 'name' => 'day', 'type' => 'text' ),
						array( 'key' => 'field_cag_hours_time', 'label' => 'שעות', 'name' => 'time', 'type' => 'text' ),
					),
				),
				array( 'key' => 'field_cag_copyright', 'label' => 'טקסט זכויות יוצרים', 'name' => 'copyright_text', 'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0 ),
				array( 'key' => 'field_cag_accessibility_link', 'label' => 'קישור הצהרת נגישות', 'name' => 'accessibility_link', 'type' => 'link', 'return_format' => 'array' ),
				array( 'key' => 'field_cag_privacy_link', 'label' => 'קישור מדיניות פרטיות', 'name' => 'privacy_link', 'type' => 'link', 'return_format' => 'array' ),

				/* ===== Mini-contact tab (the "יש לכם שאלות?" CTA block reused across inner pages) ===== */
				array( 'key' => 'field_cag_tab_minicontact', 'label' => 'בלוק יצירת קשר (Mini Contact)', 'type' => 'tab' ),
				array( 'key' => 'field_cag_minicontact_heading', 'label' => 'כותרת', 'name' => 'minicontact_heading', 'type' => 'text', 'default_value' => 'יש לכם שאלות?', 'instructions' => 'הטופס עצמו מנוהל ב-Contact Form 7; כאן עורכים רק את הטקסט.' ),
				array( 'key' => 'field_cag_minicontact_text', 'label' => 'טקסט', 'name' => 'minicontact_text', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'אנו מזמינים אתכם לשיחה ראשונית, ללא עלות וללא התחייבות, בה נכיר את הצרכים ונבחן יחד את הדרך המתאימה ביותר עבורכם!' ),

				/* ===== FAQ tab (same questions on every page → global, repeater-driven) ===== */
				array( 'key' => 'field_cag_tab_faq', 'label' => 'שאלות נפוצות (FAQ)', 'type' => 'tab' ),
				array( 'key' => 'field_cag_faq_heading', 'label' => 'כותרת', 'name' => 'faq_heading', 'type' => 'text', 'default_value' => 'שאלות נפוצות' ),
				array( 'key' => 'field_cag_faq_subheading', 'label' => 'תיאור', 'name' => 'faq_subheading', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'כאן תמצאו תשובות לשאלות הנפוצות ביותר שאנו מקבלים מלקוחותינו – ואם לא מצאתם, תמיד ניתן ליצור קשר' ),
				array(
					'key'          => 'field_cag_faq_items',
					'label'        => 'שאלות ותשובות',
					'name'         => 'faq_items',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'הוספת שאלה',
					'sub_fields'   => array(
						array( 'key' => 'field_cag_faq_q', 'label' => 'שאלה', 'name' => 'question', 'type' => 'text' ),
						array( 'key' => 'field_cag_faq_a', 'label' => 'תשובה', 'name' => 'answer', 'type' => 'textarea', 'rows' => 4 ),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'cag-site-settings',
					),
				),
			),
		)
	);
}
