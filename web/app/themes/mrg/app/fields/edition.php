<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$event = new FieldsBuilder(__('Edition', 'sage'));

$event
    ->setLocation('taxonomy', '==', 'edition');

$event
->addTextarea('aditional_info', [
      'label' => __('Aditional info', 'sage'),
      'instructions' => '',
  ]);

return $event;
