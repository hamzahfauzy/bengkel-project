<?php

unset($fields['start_at']);
unset($fields['finish_at']);
unset($fields['status']);

$fields['customers'] = [
    'label' => 'Customers',
    'type' => 'options-obj:ws_customers,id,name',
    'attr' => [
        'multiple' => 'multiple'
    ]
];
$fields['start_at'] = [
    'label' => 'Schedule',
    'type' => 'datetime-local'
];
return $fields;