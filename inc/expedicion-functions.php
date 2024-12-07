<?php

function armch_get_expedicion($id_expedicion) {
  $data = [];

  $data['feat_img'] = get_the_post_thumbnail_url();

  $custom_fields = get_fields($id_expedicion);

  foreach ($custom_fields as $field => $value) {
    $data[$field] = $value;
  }

  return $data;
}
