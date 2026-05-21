<?php
/**
 * Default fallback template.
 *
 * Used when no more specific template matches. Will be overridden by
 * front-page.php, page.php, etc. as those are built out.
 */
get_header(); ?>

<main class="container" style="padding-block: 140px 80px;">
	<h1 style="font-family: var(--font-display); color: var(--blue-900); margin-bottom: 16px;">CAG — WordPress build</h1>
	<p style="color: var(--ink-600);">Header and footer are ported. Front-page content will follow.</p>
</main>

<?php
get_footer();
