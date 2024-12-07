<?php

/**
 * Custom functions for specific uses
 *
 * @package armch
 */

/* Disable CF7 autop */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Disable <InnerBlocks /> wrapper in 'div' and 'flexbox' blocks
 */
add_filter('lazyblock/div/allow_inner_blocks_wrapper', '__return_false');
add_filter('lazyblock/flexbox/allow_inner_blocks_wrapper', '__return_false');

/**
 * Disable wrapper in 'div' and 'flexbox' blocks
 */
add_filter('lazyblock/btn/frontend_allow_wrapper', '__return_false');

/**
 * Core image block should render without being wrapped in a <figure> tag
 */

function remove_figure_from_image_block($block_content, $block) {
  if (strpos($block_content, '<figure') !== false) {
    // Remove the opening and closing figure tags
    $block_content = preg_replace('/<figure[^>]*>/', '', $block_content);
    $block_content = str_replace('</figure>', '', $block_content);

    // Remove any leftover figcaption tags if present
    $block_content = preg_replace('/<figcaption.*?>(.*?)<\/figcaption>/is', '', $block_content);
  }
  return $block_content;
}
add_filter('render_block_core/image', 'remove_figure_from_image_block', 10, 2);
