<?php

namespace App\Controllers\Partials;

trait Edition
{
  public function ed()
  {
    global $post;

    $data = get_terms('edition')[0]->name;

    return $data;
  }
}
