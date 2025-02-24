<?php

return [
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'options-obj:ws_customers,id,name'
    ],
    'name' => [
        'label' => 'Name',
        'type' => 'text'
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    'merk' => [
        'label' => 'Merk',
        'type' => 'text'
    ],
    'type' => [
        'label' => 'Tipe',
        'type' => 'text'
    ],
    'police_number' => [
        'label' => 'No. Polisi',
        'type' => 'text'
    ],
    'chasis_number' => [
        'label' => 'No. Rangka Mesin',
        'type' => 'text'
    ],
    'color' => [
        'label' => 'Warna',
        'type' => 'text'
    ],
    'year' => [
        'label' => 'Tahun',
        'type' => 'text'
    ],
];