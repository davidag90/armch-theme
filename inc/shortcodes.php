<?php

add_shortcode('show-next-expediciones', 'show_next_expediciones');

function show_next_expediciones() {
  ob_start();

  $query_args = array(
    'post_type' => 'expedicion',
    'posts_per_page' => 4,
  );

  $query = new WP_Query($query_args);

  if ($query->have_posts()) {
    echo '<div class="next-expediciones not-prose">';

    while ($query->have_posts()) {
      $query->the_post();
      echo '<div class="expedicion" style="background-image:linear-gradient(0deg, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0) 100%), url(' . esc_url(get_the_post_thumbnail_url()) . ');">';
      echo '<h3>' . get_the_title() . '</h3>';
      echo '<p>' . get_the_excerpt() . '</p>';
      echo '<div><a href="' . get_the_permalink() . '">' . 'Más información</a></div>';
      echo '</div>'; // .expedicion
    }

    echo '</div>'; // .next-expediciones
  } else {
    echo 'Lo siento, no se encontraron contenidos adecuados para esta sección.';
  }

  $output = ob_get_clean();

  return $output;
}
