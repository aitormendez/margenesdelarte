<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$locat = new FieldsBuilder('Lugar');

$locat
    ->setLocation('post_type', '==', 'location');

$locat
    ->addTab('Mapa', ['placement' => 'left'])
      ->addGoogleMap('mapa', [
          'label' => __('Location', 'sage'),
          'instructions' => __('Elige la localización en el mapa', 'sage'),
          'required' => 0,
          'center_lat' => '40.420692',
          'center_lng' => '-3.653397',
          'zoom' => '14',
          'height' => '300',
      ])

    ->addTab('Dirección', ['placement' => 'left'])
      ->addTextarea('direccion', [
      'label' => __('Address', 'sage'),
      'rows' => '5',
      ])
      ->addText('poblacion', [
        'label' => __('City', 'sage'),
      ])
      ->addText('codigo_postal', [
        'label' => __('Zip code', 'sage'),
      ])
      ->addText('pais', [
        'label' => __('Country', 'sage'),
        'default_value' => 'España',
      ]);

return $locat;
