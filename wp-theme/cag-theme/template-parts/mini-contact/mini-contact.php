<?php
/**
 * Mini-contact CTA — reused across inner pages. Heading + text are editable
 * under wp-admin → הגדרות אתר → בלוק יצירת קשר (with hardcoded fallbacks).
 * The form itself is Contact Form 7 (managed in the CF7 admin).
 */
$cag_mc_heading = cag_opt( 'minicontact_heading', 'יש לכם שאלות?' );
$cag_mc_text    = cag_opt( 'minicontact_text', 'אנו מזמינים אתכם לשיחה ראשונית, ללא עלות וללא התחייבות, בה נכיר את הצרכים ונבחן יחד את הדרך המתאימה ביותר עבורכם!' );
?>
<section class="mini-contact" id="contact">
    <div class="container">
        <div class="mini-contact-grid" data-anim="fade-up">
            <div class="mini-contact-text">
                <h2><?php echo esc_html( $cag_mc_heading ); ?></h2>
                <p><?php echo esc_html( $cag_mc_text ); ?></p>
            </div>
            <?php echo do_shortcode( '[contact-form-7 id="2ee59e8" title="Mini Contact" html_class="mini-contact-form"]' ); ?>
        </div>
    </div>
</section>
