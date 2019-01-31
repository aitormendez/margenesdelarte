<?php

namespace App\Controllers\Partials;

trait ActivitiesLoop
{
  public static function editionLoop()
  {
    global $post;

    $data = get_terms('edition')[0]->name;

    return $data;
  }

  public static function fecha()
  {
    global $post;

    $start_obj = new \DateTime(get_field('start', false, false));
    $start_date = $start_obj->format('j/m/Y');


    return $start_date;
  }
}
