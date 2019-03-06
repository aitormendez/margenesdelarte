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

    $cantidad_eventos = count($eventos);

    if ($eventos) {

      if ($cantidad_eventos == 1 ) {
        $numero = 'singular';
      } elseif ($cantidad_eventos > 1) {
        $numero = 'plural';
      }

      $data = '<ul>';
      foreach ($eventos as $evento) {
        $data .= '<li> <a href="'. get_permalink( $evento->ID ) . '">' . $evento->post_title . '</a></li>';
      }
      $data .= '</ul>';
    } else {
      $numero = 'cero';
    }
    return ['numero' => $numero, 'eventos' => $data];
  }

  public function edicionTerm()
  {
    global $post;
    $terms = wp_get_post_terms($post->ID, 'edition');

    $edi = $terms[0]->name;
    return $edi;
  }
}
