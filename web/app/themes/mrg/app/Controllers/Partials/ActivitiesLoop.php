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
    $post_type = get_post_type();

    if ($post_type == 'event') {
      $start_obj = new \DateTime(get_field('start', false, false));
      $start_date = $start_obj->format('j/m/Y');
    } else {
      $start_date = get_the_date();
    }


    return $start_date;
  }

  public static function programadaAnterior()
  {

    $start_obj = new \DateTime(get_field('start', false, false));
    $today_obj = new \DateTime(date('c'));
    $post_type = get_post_type();

    if ($start_obj >= $today_obj && $post_type == 'event') {
      $programada_anterior = 'programada';
    } else {
      $programada_anterior = 'anterior';
    }

    return $programada_anterior;
  }

  public static function ambito()
  {
    global $post;

    $post_type = get_post_type();

    $terms = get_the_terms($post->ID, 'ambit');

    if ($post_type == 'event') {
      if ($terms[0]->slug == 'publico') {
        $ambito = 'publico';
      } else {
        $ambito = 'restringido';
      }
    } else {
      $ambito = 'restringido';
    }

    return $ambito;
  }

  public static function postType()
  {
    $post_type = get_post_type();

    return $post_type;
  }

  public static function extracto()
  {
    global $post;
    $excerpt = $post->post_excerpt;

    if ($excerpt == '') {
      $extracto = wp_trim_words(strip_tags(get_the_content( '' )));
    } else {
      $extracto = $excerpt;
    }

    return $extracto;
  }

  public function now()
  {
    $date_now = date('Y-m-d H:i:s');

    return $date_now;
  }
}
