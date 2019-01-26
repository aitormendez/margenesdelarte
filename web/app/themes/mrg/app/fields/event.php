<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$event = new FieldsBuilder('Event');

$event
    ->setLocation('post_type', '==', 'event');

$event
->addTab('Cuándo', ['placement' => 'left'])
    ->addDatePicker('start_date', [
        'label' => __('Start date', 'sage'),
    ])

    ->addDatePicker('end_date', [
        'label' => __('End date', 'sage'),
    ])

    ->addTimePicker('start_time', [
        'label' => __('Start time', 'sage'),
    ])
    ->conditional('all_day', '==', '0')

    ->addTimePicker('end_time', [
        'label' => __('End time', 'sage'),
    ])
    ->conditional('all_day', '==', '0')

    ->addTrueFalse('all_day', [
        'label' => __('All day', 'sage'),
        'message' => '',
        'ui' => 1,
        'ui_on_text' => __('Yes', 'sage'),
        'ui_off_text' => __('No', 'sage'),
    ])

->addTab('Dónde', ['placement' => 'left'])
    ->addPostObject('donde', [
        'label' => 'Dónde',
        'instructions' => __('Elige el lugar de la lista desplegable. Si no aparece el que buscas, deberás añadirlo en la pestaña Lugares', 'sage'),
        'post_type' => ['location'],
        'return_format' => 'object',
      'ui' => 1,
])

->addTab('Producciones', ['placement' => 'left'])
    ->addRelationship('related_productions', [
    'label' => __('Related Productions', 'sage'),
    'instructions' => __('Selecciona las producciones relacionadas con este evento', 'sage'),
    'post_type' => ['production'],
    'filters' => [
        0 => 'search',
        1 => 'taxonomy',
    ],
    'return_format' => 'object',
]);

return $event;
