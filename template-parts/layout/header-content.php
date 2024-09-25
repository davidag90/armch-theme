<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

?>

<header id="masthead">
	<div id="site-title">
		<?php if (is_front_page()) : ?>
			<h1 class="hidden"><?php bloginfo('name'); ?></h1>
		<?php else : ?>
			<p class="hidden"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
		<?php endif;

		$armch_description = get_bloginfo('description', 'display');

		if ($armch_description || is_customize_preview()) : ?>
			<p class="hidden"><?php echo $armch_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
		<?php endif; ?>

		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.svg" class="w-auto h-12" /></a>
	</div><!-- #site-title -->

	<nav id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'armch-theme'); ?>">
		<button aria-controls="primary-menu" aria-expanded="false" class="lg:hidden text-secondary menu-toggler"><span class="hidden"><?php esc_html_e('Primary Menu', 'armch-theme'); ?></span><i class="fa-solid fa-bars"></i></button>

		<?php
		wp_nav_menu(
			array(
				'container'				=> 'div',
				'container_class' => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s" aria-label="submenu" armch-menu-state="collapsed">%3$s</ul>',
				'menu_id'         => 'primary-menu',
				'theme_location'  => 'menu-1',
			)
		);
		?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->