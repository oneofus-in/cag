<?php
/**
 * FAQ — shared across inner pages. Content is global (same questions
 * everywhere) and editable under wp-admin → הגדרות אתר → שאלות נפוצות:
 * heading, subheading, and a repeater of question/answer rows.
 *
 * Falls back to the original hardcoded copy when ACF is inactive or the
 * repeater is empty, so the section never renders blank.
 */

$cag_faq_heading = cag_opt( 'faq_heading', 'שאלות נפוצות' );
$cag_faq_sub     = cag_opt( 'faq_subheading', 'כאן תמצאו תשובות לשאלות הנפוצות ביותר שאנו מקבלים מלקוחותינו – ואם לא מצאתם, תמיד ניתן ליצור קשר' );
$cag_faq_rows    = ( function_exists( 'have_rows' ) && have_rows( 'faq_items', 'option' ) );
?>
<section class="section faq-section" id="faq">
    <div class="container">
        <div class="section-head" data-anim="fade-up">
            <h2><?php echo esc_html( $cag_faq_heading ); ?></h2>
            <p><?php echo esc_html( $cag_faq_sub ); ?></p>
        </div>

        <div class="faq-list" data-anim="fade-up">
            <?php if ( $cag_faq_rows ) : ?>
                <?php
                $cag_faq_i = 0;
                while ( have_rows( 'faq_items', 'option' ) ) :
                    the_row();
                    $cag_faq_q = get_sub_field( 'question' );
                    $cag_faq_a = get_sub_field( 'answer' );
                    if ( '' === trim( (string) $cag_faq_q ) ) {
                        continue;
                    }
                    ?>
                    <details class="faq-item"<?php echo 0 === $cag_faq_i ? ' open' : ''; ?>>
                        <summary class="faq-q"><?php echo esc_html( $cag_faq_q ); ?></summary>
                        <div class="faq-a"><?php echo wpautop( esc_html( $cag_faq_a ) ); ?></div>
                    </details>
                    <?php
                    $cag_faq_i++;
                endwhile;
                ?>
            <?php else : ?>
                <details class="faq-item" open>
                    <summary class="faq-q">מה זמן הייצור של פודטראק?</summary>
                    <div class="faq-a">
                        <p>זמן הייצור הסטנדרטי עומד על כ־6 עד 10 שבועות ממועד אישור המפרט הסופי. במקרים של התאמות אישיות מורכבות זמן הייצור עשוי להתארך מעט. אנו מלווים אתכם לאורך כל התהליך ומעדכנים בכל שלב.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-q">האם ניתן לקבל פודטראק בהתאמה אישית מלאה?</summary>
                    <div class="faq-a">
                        <p>בהחלט! כל פודטראק שאנו בונים מותאם לצרכי הלקוח – ממידות ופריסת מטבח ועד לעיצוב חיצוני, צבעי מותג וציוד מיוחד. פגישת ייעוץ ראשונית מאפשרת לנו להבין את הצרכים ולהציע פתרון שמתאים בדיוק לעסק שלכם.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-q">האם הפודטראקים עומדים בתקנות משרד הבריאות?</summary>
                    <div class="faq-a">
                        <p>כן. כל הפודטראקים שלנו מיוצרים לפי דרישות משרד הבריאות ותקנות הרשויות המקומיות הרלוונטיות. אנו עוסקים בתחום שנים רבות ומכירים היטב את הדרישות הרגולטוריות ומוודאים שכל יחידה עומדת בהן.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-q">מה כולל מחיר הפודטראק?</summary>
                    <div class="faq-a">
                        <p>המחיר כולל את הייצור המלא של המבנה, ריצוף, בידוד, חיפויים פנימיים, חלונות ודלתות, חיווט חשמלי בסיסי וחיבורי מים. ציוד מטבח, עיצוב גרפי חיצוני ומערכות קירור נוספות מחושבות בנפרד לפי הבחירות.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-q">האם אתם מציעים מימון לרכישת פודטראק?</summary>
                    <div class="faq-a">
                        <p>אנו עובדים עם מספר גורמי מימון ויכולים לסייע בחיבור לחברות ליסינג ומימון המתמחות בציוד עסקי. פנו אלינו ונשמח להפנות אתכם לגורם המתאים לצרכים שלכם.</p>
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-q">מה האחריות הניתנת על הפודטראק?</summary>
                    <div class="faq-a">
                        <p>אנו מעניקים אחריות של שנה על המבנה עצמו מרגע המסירה. אחריות על ציוד וחומרים ספציפיים נקבעת לפי יצרן הציוד. בנוסף אנו מציעים שירות תחזוקה שוטף לאחר תקופת האחריות.</p>
                    </div>
                </details>
            <?php endif; ?>
        </div>
    </div>
</section>
