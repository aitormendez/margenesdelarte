<?php

namespace App\Controllers\Partials;

trait Images
{
  public static function featured()
  {
    global $post;

    if (has_post_thumbnail()) {
      $data = get_the_post_thumbnail($post->ID, 'large');
    }
    return $data;
  }
}
