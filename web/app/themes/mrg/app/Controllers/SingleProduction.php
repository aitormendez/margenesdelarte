<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleProduction extends Controller
{
  public function eventosRelacionados()
  {
    $eventos = get_posts([
      'post_type' => 'event',
      'meta_query' => [
        [
          'key' => 'related_productions',
					'value' => '"' . get_the_ID() . '"',
					'compare' => 'LIKE'
        ]
      ]
    ]);

    if ($eventos) {
      $data = '<ul>';
      foreach ($eventos as $evento) {
        $data .= '<li> <a href="'. get_permalink( $evento->ID ) . '">' . $evento->post_title . '</a></li>';
      }
      $data .= '</ul>';
    }
    return $data;
  }
}
