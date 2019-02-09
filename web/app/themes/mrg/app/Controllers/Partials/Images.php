<?php

namespace App\Controllers\Partials;

trait Images
{
  public static function featured()
  {
    global $post;

    return get_the_post_thumbnail($post->ID, 'large');
  }

  public static function clase()
  {
    if (has_post_thumbnail()) {
      $data = 'con-imagen';
    } else {
      $data = 'sin-imagen';
    }
    return $data;
  }
}
