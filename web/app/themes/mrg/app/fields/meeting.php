<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$event = new FieldsBuilder(__('Meeting', 'sage'));

$event
    ->setLocation('taxonomy', '==', 'meeting');

$event
->addTab(__('When', 'sage'))
    ->addDatePicker('start_meeting', [
        'label' => __('Start', 'sage'),
    ])

    ->addDatePicker('end_meeting', [
        'label' => __('End', 'sage'),
    ])


->addTab(__('Where', 'sage'))
    ->addPostObject('donde', [
        'label' => 'Dónde',
        'instructions' => __('Elige el lugar de la lista desplegable. Si no aparece el que buscas, deberás añadirlo en la pestaña Lugares', 'sage'),
        'post_type' => ['location'],
        'return_format' => 'object',
        'ui' => 1,
])

->addTab(__('Meeting poster', 'sage'))
    ->addImage('poster', [
        'label' => __('Meeting poster'),
        'instructions' => __('Meeting poster'),
        'return_format' => 'ID',
        'preview_size' => 'medium',
]);

return $event;
