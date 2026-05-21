<?php
/**
 * Template Name: Accessories
 *
 * Ported from the static prototype's pages/accessories/index.html.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<!-- ══ Accessories grid ══ -->
	<section class="section acc-grid-section">
		<div class="container">
			<div class="section-head" data-anim="fade-up">
				<h2>מגוון רחב של <span class="gradient-text">אבזרים נלווים</span></h2>
				<p>מבחר אביזרים והשלמות לקרוואנים ולמבני לינה — מנעולים, מנשאים, פתרונות אנרגיה ועוד</p>
			</div>

			<div class="acc-grid">

				<article class="acc-card" data-anim="fade-up" data-delay="0">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול לכף ריתום דגם 2">
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנעול לכף ריתום דגם 2</h3>
					</div>
				</article>

				<article class="acc-card has-price-strip" data-anim="fade-up" data-delay="0.06">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנשא אופניים לקרוואן">
						<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנשא אופניים לקרוואן</h3>
					</div>
				</article>

				<article class="acc-card has-price-strip" data-anim="fade-up" data-delay="0.12">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול לכף ריתום">
						<span class="acc-price-strip">למחיר יש ליצור קשר!</span>
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנעול לכף ריתום</h3>
					</div>
				</article>

				<article class="acc-card" data-anim="fade-up" data-delay="0.18">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול שרשרת">
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנעול שרשרת</h3>
					</div>
				</article>

				<article class="acc-card" data-anim="fade-up" data-delay="0.24">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול לכף ריתום">
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנעול לכף ריתום</h3>
					</div>
				</article>

				<article class="acc-card" data-anim="fade-up" data-delay="0.30">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="חבל לקשירה והידוק מטען">
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">חבל לקשירה והידוק מטען</h3>
					</div>
				</article>

				<article class="acc-card" data-anim="fade-up" data-delay="0.36">
					<div class="acc-card-media">
						<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/Lock.jpeg' ) ); ?>" alt="מנעול שרשרת מאובטח">
					</div>
					<div class="acc-card-body">
						<h3 class="acc-card-title">מנעול שרשרת מאובטח</h3>
					</div>
				</article>

			</div>
		</div>
	</section>

	<!-- ══ Mini contact form ══ -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<?php
get_footer();
