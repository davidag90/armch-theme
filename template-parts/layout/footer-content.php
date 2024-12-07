<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

?>

<footer id="colophon">
	<?php if (is_active_sidebar('sidebar-1')) : ?>
		<aside role="complementary" aria-label="<?php esc_attr_e('Footer', 'armch-theme'); ?>">
			<?php dynamic_sidebar('sidebar-1'); ?>
		</aside>
	<?php endif; ?>

	<?php if (has_nav_menu('menu-2')) : ?>
		<nav aria-label="<?php esc_attr_e('Footer Menu', 'armch-theme'); ?>">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'menu-2',
				'menu_class'     => 'footer-menu',
				'depth'          => 1,
			));
			?>
		</nav>
	<?php endif; ?>

	<div class="copyright">
		<?php
		$armch_blog_info = get_bloginfo('name');
		if (! empty($armch_blog_info)) : ?>
			Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a> - Dev by <a href="https://dagdev.com.ar/" target="_blank">David A Gómez</a>
		<?php endif; ?>
	</div>
</footer><!-- #colophon -->