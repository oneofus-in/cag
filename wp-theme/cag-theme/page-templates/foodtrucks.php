<?php
/**
 * Template Name: Foodtrucks
 *
 * Ported from the static prototype's pages/foodtrucks/index.html.
 * Body content is editable via ACF (group_cag_foodtrucks); the original
 * static content is kept as the fallback when no fields are set.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ מקטע דגמים ══ -->
	<?php
	$cag_ft_mdl_h    = cag_field( 'ft_models_heading', 'פודטראקים' );
	$cag_ft_mdl_hl   = cag_field( 'ft_models_highlight', 'שנבנים לפי המפרט שלכם' );
	$cag_ft_mdl_lead = cag_field( 'ft_models_lead', 'פודטראק אינו רק מבנה — הוא יחידה תפעולית שלמה שנבנתה לפעול בעומס יומיומי, באירועים, בשווקים ובכל מקום שעסקי המזון מגיעים אליו. א.ג קראוונים מתמחים בדיוק בזה: כל פודטראק מתוכנן ממאפס לפי המפרט והצרכים של העסק — לא לפי קטלוג.' );
	$cag_ft_mdl_body = cag_field( 'ft_models_body', 'כל פודטראק שאנחנו בונים כולל מערכות חשמל, מים, אוורור, ציוד מטבח ואינטגרציה עם מיתוג חיצוני — הכל לפי דרישות הלקוח. הניסיון בעבודה עם עסקים, יזמים ורשויות מאפשר לנו לספק פתרונות מהירים, אמינים ומדויקים לכל סוג עסק.' );
	$cag_ft_mdl_img  = cag_field( 'ft_models_image', '' );
	$cag_ft_mdl_cta  = cag_field( 'ft_models_cta', false );
	$cag_ft_mdl_url  = ( is_array( $cag_ft_mdl_cta ) && ! empty( $cag_ft_mdl_cta['url'] ) ) ? $cag_ft_mdl_cta['url'] : '#contact';
	$cag_ft_mdl_lbl  = ( is_array( $cag_ft_mdl_cta ) && ! empty( $cag_ft_mdl_cta['title'] ) ) ? $cag_ft_mdl_cta['title'] : 'קבלו הצעת מחיר לפודטראק שלכם';
	$cag_ft_mdl_tgt  = ( is_array( $cag_ft_mdl_cta ) && ! empty( $cag_ft_mdl_cta['target'] ) ) ? $cag_ft_mdl_cta['target'] : '';
	?>
	<section class="section ft-models-section" id="models">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-content" data-anim="fade-right">
					<h2><?php echo esc_html( $cag_ft_mdl_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_mdl_hl ); ?></span></h2>
					<?php if ( $cag_ft_mdl_lead ) : ?><p class="ft-split-lead"><?php echo esc_html( $cag_ft_mdl_lead ); ?></p><?php endif; ?>
					<?php if ( $cag_ft_mdl_body ) : ?><p class="ft-split-body"><?php echo esc_html( $cag_ft_mdl_body ); ?></p><?php endif; ?>
					<ul class="bullets">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'ft_models_bullets' ) ) : ?>
							<?php
							while ( have_rows( 'ft_models_bullets' ) ) :
								the_row();
								$cag_ft_mdl_bullet = get_sub_field( 'text' );
								if ( ! $cag_ft_mdl_bullet ) {
									continue;
								}
								?>
								<li><i class="fa-solid fa-check"></i><span><?php echo esc_html( $cag_ft_mdl_bullet ); ?></span></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><i class="fa-solid fa-check"></i><span>עמידה בתקני משרד הבריאות</span></li>
							<li><i class="fa-solid fa-check"></i><span>ייצור מקומי כחול לבן ב-100%</span></li>
							<li><i class="fa-solid fa-check"></i><span>התאמה אישית לציוד ולמיתוג העסק</span></li>
							<li><i class="fa-solid fa-check"></i><span>אספקה מהירה ועמידה בלוחות זמנים</span></li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_ft_mdl_url ); ?>" class="btn btn-primary"<?php echo $cag_ft_mdl_tgt ? ' target="' . esc_attr( $cag_ft_mdl_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_ft_mdl_lbl ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="ft-split-media" data-anim="fade-left">
					<?php if ( $cag_ft_mdl_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_ft_mdl_img, 'large', false, array( 'class' => 'ft-split-img', 'loading' => 'lazy', 'alt' => 'פודטראק של א.ג קראוונים' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>"
						     alt="פודטראק של א.ג קראוונים" class="ft-split-img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ מאפיינים בהתאמה אישית ══ -->
	<?php
	$cag_ft_feat_h   = cag_field( 'ft_features_heading', 'מאפיינים' );
	$cag_ft_feat_hl  = cag_field( 'ft_features_highlight', 'בהתאמה אישית' );
	$cag_ft_feat_sub = cag_field( 'ft_features_intro', 'כל פוד טראק נבנה בהתאמה מדויקת לצרכי הלקוח — מהמטבח ועד הגרפיקה החיצונית' );
	?>
	<section class="section ft-features-section" id="features">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_ft_feat_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_feat_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_ft_feat_sub ); ?></p>
			</div>

			<div class="ft-features-grid">
				<?php if ( function_exists( 'have_rows' ) && have_rows( 'ft_features_items' ) ) : ?>
					<?php
					$cag_ft_feat_i = 0;
					while ( have_rows( 'ft_features_items' ) ) :
						the_row();
						$cag_ft_feat_icon  = get_sub_field( 'icon' );
						$cag_ft_feat_title = get_sub_field( 'title' );
						$cag_ft_feat_desc  = get_sub_field( 'desc' );
						$cag_ft_feat_delay = number_format( ( $cag_ft_feat_i % 3 ) * 0.08, 2 );
						?>
						<div class="ft-feature" data-anim="fade-up" data-delay="<?php echo esc_attr( $cag_ft_feat_delay ); ?>">
							<?php if ( $cag_ft_feat_icon ) : ?><div class="ft-feature-icon"><i class="<?php echo esc_attr( $cag_ft_feat_icon ); ?>"></i></div><?php endif; ?>
							<?php if ( $cag_ft_feat_title ) : ?><h4><?php echo esc_html( $cag_ft_feat_title ); ?></h4><?php endif; ?>
							<?php if ( $cag_ft_feat_desc ) : ?><p><?php echo esc_html( $cag_ft_feat_desc ); ?></p><?php endif; ?>
						</div>
						<?php
						$cag_ft_feat_i++;
					endwhile;
					?>
				<?php else : ?>
				<div class="ft-feature" data-anim="fade-up" data-delay="0">
					<div class="ft-feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
					<h4>עמידות ואיכות</h4>
					<p>חומרי גלם מאושרים למגע עם מזון, עמידים בתנאי שטח ובשימוש אינטנסיבי יומיומי.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.08">
					<div class="ft-feature-icon"><i class="fa-solid fa-sliders"></i></div>
					<h4>התאמה אישית מלאה</h4>
					<p>תכנון הפריסה הפנימית, בחירת ציוד, מיתוג חיצוני — הכל לפי הצרכים שלכם.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.16">
					<div class="ft-feature-icon"><i class="fa-solid fa-certificate"></i></div>
					<h4>עמידה בתקנות הבריאות</h4>
					<p>הפוד טראק מגיע מוכן לקבלת רישיון עסק ועומד בדרישות משרד הבריאות.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0">
					<div class="ft-feature-icon"><i class="fa-solid fa-bolt"></i></div>
					<h4>אספקה מהירה</h4>
					<p>זמן ייצור של 6–10 שבועות בלבד, עם עדכונים שוטפים לאורך כל תהליך הבנייה.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.08">
					<div class="ft-feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
					<h4>ניידות מלאה</h4>
					<p>מבנים ניידים וגם נייחים — לפי הצורך. קל לגרור, קל להתקין, קל להפעיל.</p>
				</div>
				<div class="ft-feature" data-anim="fade-up" data-delay="0.16">
					<div class="ft-feature-icon"><i class="fa-solid fa-headset"></i></div>
					<h4>ליווי מקצועי</h4>
					<p>צוות מקצועי מלווה אתכם מהתכנון, דרך הייצור ועד ההפעלה הראשונה בשטח.</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ══ מיני קונטקט ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

	<!-- ══ פוד טראקים לעסקים ══ -->
	<?php
	$cag_ft_biz_h    = cag_field( 'ft_business_heading', 'פוד טראקים' );
	$cag_ft_biz_hl   = cag_field( 'ft_business_highlight', 'לעסקים' );
	$cag_ft_biz_lead = cag_field( 'ft_business_lead', 'הפוד טראק הוא אחד הפתרונות החכמים והמשתלמים ביותר לעסקי מזון היום. ניידות, מיתוג ועלויות תפעול נמוכות — שילוב מנצח.' );
	$cag_ft_biz_img  = cag_field( 'ft_business_image', '' );
	$cag_ft_biz_cta  = cag_field( 'ft_business_cta', false );
	$cag_ft_biz_url  = ( is_array( $cag_ft_biz_cta ) && ! empty( $cag_ft_biz_cta['url'] ) ) ? $cag_ft_biz_cta['url'] : '#contact';
	$cag_ft_biz_lbl  = ( is_array( $cag_ft_biz_cta ) && ! empty( $cag_ft_biz_cta['title'] ) ) ? $cag_ft_biz_cta['title'] : 'קבלו הצעת מחיר ללא עלות';
	$cag_ft_biz_tgt  = ( is_array( $cag_ft_biz_cta ) && ! empty( $cag_ft_biz_cta['target'] ) ) ? $cag_ft_biz_cta['target'] : '';
	?>
	<section class="section ft-businesses-section" id="businesses">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-content" data-anim="fade-right">
					<h2><?php echo esc_html( $cag_ft_biz_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_biz_hl ); ?></span></h2>
					<?php if ( $cag_ft_biz_lead ) : ?><p class="ft-split-lead"><?php echo esc_html( $cag_ft_biz_lead ); ?></p><?php endif; ?>
					<ul class="bullets">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'ft_business_bullets' ) ) : ?>
							<?php
							while ( have_rows( 'ft_business_bullets' ) ) :
								the_row();
								$cag_ft_biz_bullet = get_sub_field( 'text' );
								if ( ! $cag_ft_biz_bullet ) {
									continue;
								}
								?>
								<li><i class="fa-solid fa-check"></i><span><?php echo esc_html( $cag_ft_biz_bullet ); ?></span></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><i class="fa-solid fa-check"></i><span>ניידות לאירועים, שווקים ופסטיבלים</span></li>
							<li><i class="fa-solid fa-check"></i><span>מיתוג מלא על פני המבנה כולו</span></li>
							<li><i class="fa-solid fa-check"></i><span>עלויות תפעול נמוכות בהרבה ממסעדה קבועה</span></li>
							<li><i class="fa-solid fa-check"></i><span>ליווי בקבלת אישורי משרד הבריאות</span></li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_ft_biz_url ); ?>" class="btn btn-primary"<?php echo $cag_ft_biz_tgt ? ' target="' . esc_attr( $cag_ft_biz_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_ft_biz_lbl ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
				<div class="ft-split-media" data-anim="fade-left">
					<?php if ( $cag_ft_biz_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_ft_biz_img, 'large', false, array( 'class' => 'ft-split-img', 'loading' => 'lazy', 'alt' => 'פוד טראק לעסקים' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>"
						     alt="פוד טראק לעסקים" class="ft-split-img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פוד טראקים לעיריות ורשויות ══ -->
	<?php
	$cag_ft_mun_h    = cag_field( 'ft_municipal_heading', 'פוד טראקים' );
	$cag_ft_mun_hl   = cag_field( 'ft_municipal_highlight', 'לעיריות ורשויות' );
	$cag_ft_mun_lead = cag_field( 'ft_municipal_lead', 'פתרונות מקיפים לרשויות מקומיות — מאירועי ציבור ועד פתרונות קבע לשטחים ציבוריים.' );
	$cag_ft_mun_img  = cag_field( 'ft_municipal_image', '' );
	$cag_ft_mun_cta  = cag_field( 'ft_municipal_cta', false );
	$cag_ft_mun_url  = ( is_array( $cag_ft_mun_cta ) && ! empty( $cag_ft_mun_cta['url'] ) ) ? $cag_ft_mun_cta['url'] : '#contact';
	$cag_ft_mun_lbl  = ( is_array( $cag_ft_mun_cta ) && ! empty( $cag_ft_mun_cta['title'] ) ) ? $cag_ft_mun_cta['title'] : 'דברו איתנו על הפרויקט שלכם';
	$cag_ft_mun_tgt  = ( is_array( $cag_ft_mun_cta ) && ! empty( $cag_ft_mun_cta['target'] ) ) ? $cag_ft_mun_cta['target'] : '';
	?>
	<section class="section ft-municipalities-section" id="municipalities">
		<div class="container">
			<div class="ft-split">
				<div class="ft-split-media" data-anim="fade-right">
					<?php if ( $cag_ft_mun_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_ft_mun_img, 'large', false, array( 'class' => 'ft-split-img', 'loading' => 'lazy', 'alt' => 'פוד טראק לעיריות ורשויות' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>"
						     alt="פוד טראק לעיריות ורשויות" class="ft-split-img">
					<?php endif; ?>
				</div>
				<div class="ft-split-content" data-anim="fade-left">
					<h2><?php echo esc_html( $cag_ft_mun_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_mun_hl ); ?></span></h2>
					<?php if ( $cag_ft_mun_lead ) : ?><p class="ft-split-lead"><?php echo esc_html( $cag_ft_mun_lead ); ?></p><?php endif; ?>
					<ul class="bullets">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'ft_municipal_bullets' ) ) : ?>
							<?php
							while ( have_rows( 'ft_municipal_bullets' ) ) :
								the_row();
								$cag_ft_mun_bullet = get_sub_field( 'text' );
								if ( ! $cag_ft_mun_bullet ) {
									continue;
								}
								?>
								<li><i class="fa-solid fa-check"></i><span><?php echo esc_html( $cag_ft_mun_bullet ); ?></span></li>
							<?php endwhile; ?>
						<?php else : ?>
							<li><i class="fa-solid fa-check"></i><span>עיריות ומועצות מקומיות</span></li>
							<li><i class="fa-solid fa-check"></i><span>אירועי ציבור ופסטיבלים</span></li>
							<li><i class="fa-solid fa-check"></i><span>מוסדות חינוך וקמפוסים</span></li>
							<li><i class="fa-solid fa-check"></i><span>שווקים עירוניים קבועים וזמניים</span></li>
						<?php endif; ?>
					</ul>
					<a href="<?php echo esc_url( $cag_ft_mun_url ); ?>" class="btn btn-primary"<?php echo $cag_ft_mun_tgt ? ' target="' . esc_attr( $cag_ft_mun_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_ft_mun_lbl ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ פוד טראקים כמבנים משלימים ══ -->
	<?php
	$cag_ft_comp_h    = cag_field( 'ft_complementary_heading', 'פוד טראקים' );
	$cag_ft_comp_hl   = cag_field( 'ft_complementary_highlight', 'כמבנים משלימים' );
	$cag_ft_comp_sub  = cag_field( 'ft_complementary_subhead', 'לינה, חינוך ותיירות' );
	$cag_ft_comp_lead = cag_field( 'ft_complementary_lead', 'פוד טראקים כיחידות קבועות המשלימות מתחמים קיימים — פתרון אידיאלי להוספת שירותי מזון ומכירה ללא בנייה יקרה.' );
	$cag_ft_comp_img  = cag_field( 'ft_complementary_image', '' );
	$cag_ft_comp_cta  = cag_field( 'ft_complementary_cta', false );
	$cag_ft_comp_url  = ( is_array( $cag_ft_comp_cta ) && ! empty( $cag_ft_comp_cta['url'] ) ) ? $cag_ft_comp_cta['url'] : '#contact';
	$cag_ft_comp_lbl  = ( is_array( $cag_ft_comp_cta ) && ! empty( $cag_ft_comp_cta['title'] ) ) ? $cag_ft_comp_cta['title'] : 'לייעוץ ראשוני ללא עלות';
	$cag_ft_comp_tgt  = ( is_array( $cag_ft_comp_cta ) && ! empty( $cag_ft_comp_cta['target'] ) ) ? $cag_ft_comp_cta['target'] : '';
	?>
	<section class="section ft-complementary-section" id="complementary">
		<div class="container">
			<div class="ft-split ft-split--reverse">
				<div class="ft-split-media" data-anim="fade-right">
					<?php if ( $cag_ft_comp_img ) : ?>
						<?php echo wp_get_attachment_image( $cag_ft_comp_img, 'large', false, array( 'class' => 'ft-split-img', 'loading' => 'lazy', 'alt' => 'פוד טראק כמבנה משלים' ) ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>"
						     alt="פוד טראק כמבנה משלים" class="ft-split-img">
					<?php endif; ?>
				</div>
				<div class="ft-split-content" data-anim="fade-left">
					<h2><?php echo esc_html( $cag_ft_comp_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_comp_hl ); ?></span></h2>
					<?php if ( $cag_ft_comp_sub ) : ?><p class="ft-split-sub"><?php echo esc_html( $cag_ft_comp_sub ); ?></p><?php endif; ?>
					<?php if ( $cag_ft_comp_lead ) : ?><p class="ft-split-lead"><?php echo esc_html( $cag_ft_comp_lead ); ?></p><?php endif; ?>
					<div class="ft-use-tags">
						<?php if ( function_exists( 'have_rows' ) && have_rows( 'ft_complementary_tags' ) ) : ?>
							<?php
							while ( have_rows( 'ft_complementary_tags' ) ) :
								the_row();
								$cag_ft_comp_tag = get_sub_field( 'text' );
								if ( ! $cag_ft_comp_tag ) {
									continue;
								}
								?>
								<span class="ft-use-tag"><?php echo esc_html( $cag_ft_comp_tag ); ?></span>
							<?php endwhile; ?>
						<?php else : ?>
							<span class="ft-use-tag">מתחמי לינה ונופש</span>
							<span class="ft-use-tag">כיתות לימוד</span>
							<span class="ft-use-tag">מרכזי ספורט</span>
							<span class="ft-use-tag">מתחמי תיירות</span>
							<span class="ft-use-tag">קמפינגים</span>
						<?php endif; ?>
					</div>
					<a href="<?php echo esc_url( $cag_ft_comp_url ); ?>" class="btn btn-primary"<?php echo $cag_ft_comp_tgt ? ' target="' . esc_attr( $cag_ft_comp_tgt ) . '"' : ''; ?>><?php echo esc_html( $cag_ft_comp_lbl ); ?> <i class="fa-solid fa-arrow-left"></i></a>
				</div>
			</div>
		</div>
	</section>

	<!-- ══ גלריה ══ -->
	<?php
	$cag_ft_gal_h   = cag_field( 'ft_gallery_heading', 'הגלריה' );
	$cag_ft_gal_hl  = cag_field( 'ft_gallery_highlight', 'שלנו' );
	$cag_ft_gal_sub = cag_field( 'ft_gallery_intro', 'מבחר פרוייקטים שביצענו עבור לקוחות ברחבי הארץ' );
	$cag_ft_gallery = cag_field( 'ft_gallery', array() );
	?>
	<section class="section ft-gallery-section" id="gallery">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2><?php echo esc_html( $cag_ft_gal_h ); ?> <span class="gradient-text"><?php echo esc_html( $cag_ft_gal_hl ); ?></span></h2>
				<p><?php echo esc_html( $cag_ft_gal_sub ); ?></p>
			</div>

			<div class="ft-carousel-wrap" data-anim="fade-up">
				<div class="ft-carousel" id="ft-carousel">
					<div class="ft-carousel-track" id="ft-carousel-track">
						<?php if ( is_array( $cag_ft_gallery ) && ! empty( $cag_ft_gallery ) ) : ?>
							<?php foreach ( $cag_ft_gallery as $cag_ft_img ) : ?>
								<?php
								$cag_ft_img_url = is_array( $cag_ft_img ) && ! empty( $cag_ft_img['url'] ) ? $cag_ft_img['url'] : '';
								$cag_ft_img_alt = is_array( $cag_ft_img ) && ! empty( $cag_ft_img['alt'] ) ? $cag_ft_img['alt'] : '';
								if ( ! $cag_ft_img_url ) {
									continue;
								}
								?>
								<div class="ft-carousel-slide">
									<img src="<?php echo esc_url( $cag_ft_img_url ); ?>" alt="<?php echo esc_attr( $cag_ft_img_alt ); ?>" draggable="false">
									<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56.jpeg' ) ); ?>" alt="פרויקט פוד טראק 1" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (1).jpeg' ) ); ?>" alt="פרויקט פוד טראק 2" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (2).jpeg' ) ); ?>" alt="פרויקט פוד טראק 3" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (3).jpeg' ) ); ?>" alt="פרויקט פוד טראק 4" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (4).jpeg' ) ); ?>" alt="פרויקט פוד טראק 5" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (5).jpeg' ) ); ?>" alt="פרויקט פוד טראק 6" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.56 (6).jpeg' ) ); ?>" alt="פרויקט פוד טראק 7" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
							<div class="ft-carousel-slide">
								<img src="<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/WhatsApp Image 2026-04-26 at 13.46.57.jpeg' ) ); ?>" alt="פרויקט פוד טראק 8" draggable="false">
								<div class="ft-slide-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<button class="ft-car-arrow ft-car-arrow--prev" aria-label="תמונה קודמת">
					<i class="fa-solid fa-chevron-right"></i>
				</button>
				<button class="ft-car-arrow ft-car-arrow--next" aria-label="תמונה הבאה">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
			</div>
			<div class="ft-car-dots" id="ft-car-dots" aria-hidden="true"></div>
		</div>
	</section>

	<!-- ══ שאלות ותשובות ══ -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

</main>

<!-- ══ Lightbox ══ -->
<div class="ft-lightbox" id="ft-lightbox" role="dialog" aria-modal="true" aria-hidden="true">
	<button class="ft-lb-close" aria-label="סגור"><i class="fa-solid fa-xmark"></i></button>
	<button class="ft-lb-arrow ft-lb-prev" aria-label="תמונה קודמת"><i class="fa-solid fa-chevron-right"></i></button>
	<div class="ft-lb-img-wrap">
		<img class="ft-lb-img" id="ft-lb-img" src="" alt="">
	</div>
	<button class="ft-lb-arrow ft-lb-next" aria-label="תמונה הבאה"><i class="fa-solid fa-chevron-left"></i></button>
	<div class="ft-lb-counter" id="ft-lb-counter"></div>
</div>

<?php
get_footer();
