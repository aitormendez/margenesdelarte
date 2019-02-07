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

  public static function programadaAnterior()
  {
    $start_obj = new \DateTime(get_field('start', false, false));
    $today_obj = new \DateTime(date());

    if ($start_obj >= $today_obj) {
      $programada_anterior = 'programada';
    } else {
      $programada_anterior = 'anterior';
    }

    return $programada_anterior;
  }
}
