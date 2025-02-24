<?php

return [
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'options-obj:ws_customers,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Vehicle',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    'status' => [
        'label' => 'Status',
        'type' => 'text'
    ],
    '_userstamp' => true
];