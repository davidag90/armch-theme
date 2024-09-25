<?php

/**
 * The template for displaying all single post from "Expedicion" custom type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package armch
 */

get_header();

?>

<div class="container">
	<section id="primary">
		<main id="main">
			<div <?php post_class('py-12'); ?>>
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content/content', 'expedicion');
				endwhile;
				?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
</div>

<?php
get_footer();
