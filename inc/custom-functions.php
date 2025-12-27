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

function remove_figure_from_image_block($block_content, $block)
{
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

function handle_load_expediciones()
{
  // Get the paged parameter from the AJAX request
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

  // Set up the query arguments
  $args = array(
    'post_type' => 'expedicion',
    'posts_per_page' => 6,
    'paged' => $paged,
  );

  // Execute the query
  $query = new WP_Query($args);

  // Check if there are posts
  if ($query->have_posts()) {
    // Start output buffering
    ob_start();

    // Loop through the posts and output them
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/content/content', 'archive-expedicion');
    }

    // Get the buffered content
    $content = ob_get_clean();

    // Send the response back to the AJAX call
    wp_send_json_success(array(
      'content' => $content,
      'maxPages' => $query->max_num_pages,
    ));
  } else {
    // No more posts
    wp_send_json_error('No more posts');
  }

  // Restore original Post Data
  wp_reset_postdata();
  wp_die();
}

add_action('wp_ajax_nopriv_load_expediciones', 'handle_load_expediciones');
add_action('wp_ajax_load_expediciones', 'handle_load_expediciones');

