<?php

/**
 * Template part for displaying "Nosotros" page content
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
	</div><!-- .container -->
</article><!-- #post-<?php the_ID(); ?> -->