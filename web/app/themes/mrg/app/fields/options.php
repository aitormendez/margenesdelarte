<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

acf_add_options_page([
    'page_title' => get_bloginfo('name') . ' Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug'  => 'theme-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
]);

$edi = new FieldsBuilder('Edición');

$edi
    ->setLocation('options_page', '==', 'theme-options');

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
