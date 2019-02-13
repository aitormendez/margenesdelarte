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
    $start_obj = new \DateTime(get_field('start', false, false));
    $start_date = $start_obj->format('j/m/Y');

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

    $terms = get_the_terms($post->ID, 'ambit');

    if ($terms[0]->slug == 'publico') {
      $ambito = 'publico';
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
}
