<?php

/**
 * Template part for displaying "Contacto" page contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

?>
<?php $slug = $post->post_name; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($slug); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->

	<div class="container">
		<div <?php armch_content_class('entry-content'); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php if (is_active_sidebar('contacto')) : ?>
			<aside role="complementary" aria-label="Sidebar">
				<?php dynamic_sidebar('contacto'); ?>
			</aside>
		<?php endif; ?>
	</div><!-- .container -->
</article><!-- #post-<?php the_ID(); ?> -->