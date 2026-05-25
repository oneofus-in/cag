<?php
/**
 * Template Name: Simple
 *
 * Inner-hero + the_content() prose body. Use for legal pages (privacy policy,
 * accessibility statement) or any page where the editor controls all content
 * via the block editor.
 */
get_header();
?>

<main class="page-top">

	<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>

	<section class="section simple-content">
		<div class="container">
			<div class="simple-body">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
