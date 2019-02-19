<?php

namespace App\Controllers\Partials;

trait Edicion
{
  public function ed()
  {
    global $post;

    $data = wp_get_post_terms( $post->ID, 'edition')[0]->name;

    return $data;
  }
}
