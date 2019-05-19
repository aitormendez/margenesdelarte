<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$area = new FieldsBuilder(__('Area', 'sage'));

$area
    ->setLocation('taxonomy', '==', 'area');

$area
->addImage('imagen', [
    'label' => __('Imagen de área'),
    'return_format' => 'ID',
    'preview_size' => 'medium',
]);

return $area;
