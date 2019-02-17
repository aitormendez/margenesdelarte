<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$edi = new FieldsBuilder('Edición');

$edi
    ->setLocation('options_page', '==', 'acf-options-edicion');

$edi
    ->addRadio('year', [
      'label' => __('Year', 'sage'),
      'instructions' => __('Choose the year for the actual edition. Will be shown on the front page', 'sage'),
      'choices' => [
        '2018',
        '2019',
      ],
      'allow_null' => 0,
      'other_choice' => 0,
      'save_other_choice' => 0,
      'default_value' => '2019',
      'layout' => 'vertical',
      'return_format' => 'value',
    ])

    ->addImage('sutitut_img', [
        'label' => 'Imagen de sustituución',
        'instructions' => 'Esta imagen aparecerá en portada cuando no haya posts para mostrar en el slider',
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
    ]);

return $edi;
