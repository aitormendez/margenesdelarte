<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomyMeeting extends Controller
{
    protected $acf = 'intro_jornadas';

  public static function fechasEventos()
  {
    $start_raw = get_field('start', false, false);
    $start_obj = new \DateTime($start_raw);
    $start_time = $start_obj->format('G:s');
    $start_unixtimestamp = strtotime($start_raw);
    $comparador = $start_obj->format('Y-m-d');

    $end_raw = get_field('end', false, false);
    $end_obj = new \DateTime($end_raw);
    $end_time = $end_obj->format('G:s');

    $start_day_i18n = date_i18n('d', $start_unixtimestamp);
    $start_month_i18n = date_i18n('F', $start_unixtimestamp);
    $frase = sprintf( esc_html__('%2$s %1$s', 'sage'), $start_day_i18n, $start_month_i18n );

    $fechas_eventos = [
      'start_obj'  => $start_obj,
      'start_unix' => $start_unixtimestamp,
      'end_obj'    => $end_obj,
      'fecha_i18n' => $frase,
      'start_time' => $start_time,
      'end_time'   => $end_time,
      'comparador' => $comparador,
    ];

    return $fechas_eventos;
  }

  public function poster()
  {
    $term = get_queried_object();
    $image_arr = get_field('poster', $term);
    $image = wp_get_attachment_image( $image_arr, 'very-large' );
    return $image;
  }

  public function lugarJornadas()
  {
    $term = get_queried_object();
    $donde_obj = get_field('donde', $term);
    $donde_permalink = get_permalink($donde_obj->ID);
    $start_date = get_field('start_meeting', $term);
    $end_date = get_field('end_meeting', $term);
    $direccion = get_field('direccion', $donde_obj->ID);

    $array = [
      'lugar_title' => $donde_obj->post_title,
      'lugar_permalink' => $donde_permalink,
      'lugar_direccion' => $direccion,
      'start_date' => $start_date,
      'end_date' => $end_date,
    ];
    return $array;
  }
}
