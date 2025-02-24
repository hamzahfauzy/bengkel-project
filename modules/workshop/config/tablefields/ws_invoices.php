<?php

return [
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'options-obj:ws_customers,id,name'
    ],
    'code' => [
        'label' => 'Invoice No.',
        'type' => 'text'
    ],
    'total_item' => [
        'label' => 'Total Items',
        'type' => 'number'
    ],
    'total_qty' => [
        'label' => 'Total Qty',
        'type' => 'number'
    ],
    'final_price' => [
        'label' => 'Final Price',
        'type' => 'number'
    ],
    'total_payment' => [
        'label' => 'Total Payment',
        'type' => 'number'
    ],
    'status' => [
        'label' => 'Status',
        'type' => 'text'
    ],
    '_userstamp' => true
];