<?php

return [
    'code' => [
        'label' => 'Inspection Number',
        'type' => 'text'
    ],
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'options-obj:ws_customers,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Vehicle',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ],
    'booking_date' => [
        'label' => 'Booking Date',
        'type' => 'datetime-local'
    ],
    'handover_date' => [
        'label' => 'Handover Date',
        'type' => 'datetime-local'
    ],
    'waiting_status' => [
        'label' => 'Waiting Status',
        'type' => 'options:WAITING|LEAVING'
    ],
    'km_in' => [
        'label' => 'KM In',
        'type' => 'number'
    ],
    'km_out' => [
        'label' => 'KM Out',
        'type' => 'number'
    ],
    'complaint' => [
        'label' => 'Complaint',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    'spareparts' => [
        'label' => 'Spareparts',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    'recommendation' => [
        'label' => 'Recommendation',
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