<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleEvent extends Controller
{
  public function data()
  {
    $location_post_object = get_field('donde');

    $mapa = get_field('mapa', $location_post_object->ID);

    $nombre_lugar = get_the_title($location_post_object->ID);

    $link_location = get_permalink($location_post_object->ID);

    $direccion =
    '<p>' . $nombre_lugar . '</p>' .
    '<p>' . get_field('direccion', $location_post_object->ID) . '</p>' .
    '<p>' . get_field('codigo_postal', $location_post_object->ID) . ', ' .
            get_field('poblacion', $location_post_object->ID) . '</p>';

    $start_date = get_field('start_date');

    $horario = __('From', 'sage') . ' ' . get_field('start_time') . ' ' . __('to') . ' ' .  get_field('end_time');

    $data = [
      'mapa' => $mapa,
      'direccion' => $direccion,
      'start_date' => $start_date,
      'horario' => $horario,
      'nombre_lugar' => $nombre_lugar,
      'link_location' => $link_location,
    ];

    return $data;
  }

  protected $acf = 'related_productions';

}
