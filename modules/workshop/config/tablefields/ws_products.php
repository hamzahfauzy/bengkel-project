<?php

return [
    'category_id' => [
        'label' => 'Category',
        'type' => 'options-obj:ws_categories,id,name'
    ],
    'name' => [
        'label' => 'Name',
        'type' => 'text'
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea'
    ],
    'supplier_name' => [
        'label' => 'Supplier',
        'type' => 'text'
    ],
    'unit' => [
        'label' => 'Unit',
        'type' => 'text'
    ],
    'price' => [
        'label' => 'Price',
        'type' => 'number',
        'search' => 'ws_product_prices.amount'
    ],
];