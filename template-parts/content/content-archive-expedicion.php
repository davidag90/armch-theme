<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> style="background-image:linear-gradient(0deg, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0) 100%), url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
  <h3><?php echo get_the_title(); ?></h3>
  <p><?php echo get_the_excerpt(); ?></p>
  <div><a href="<?php echo get_the_permalink(); ?>">Más información</a></div>
</article><!-- #post-${ID} -->