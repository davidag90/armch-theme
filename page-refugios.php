<?php

/**
 * The template for displaying page "Refugios"
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

get_header();
?>

<section id="primary">
	<main id="main">
		<?php
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content/content', 'page-refugios');
		endwhile;
		?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
