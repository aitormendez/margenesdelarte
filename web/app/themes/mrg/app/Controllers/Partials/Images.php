<?php

namespace App\Controllers\Partials;

trait Images
{
  public static function hero()
  {
    global $post;

    if (has_post_thumbnail()) {
      $data = get_the_post_thumbnail($post->ID, 'hd');
    }
    return $data;
  }
}

trait ImagesSingle
{
  public function hero()
  {
    global $post;

    if (has_post_thumbnail()) {
      $data = get_the_post_thumbnail($post->ID, 'hd');
    }
    return $data;
  }
}
