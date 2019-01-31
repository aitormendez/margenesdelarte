<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PAnteriores extends Controller
{
  public function data()
  {


    return $data;
  }

  protected $acf = 'related_productions';

  use Partials\Edicion;

}
