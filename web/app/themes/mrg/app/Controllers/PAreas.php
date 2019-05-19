<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PAreas extends Controller
{
  public function todasAreas()
  {
    $terms = get_terms( 'area',
    [
        'hide_empty' => false,
    ] );

    return $terms;
  }
}
