<?php

$record_type = $_GET['filter']['record_type'];

unset($fields['category_id']);

if($record_type == 'SERVICE')
{
    unset($fields['supplier_name']);
}

unset($fields['description']);

return array_merge([
    'category_name' => [
        'label' => 'Kategori',
        'type' => 'text',
        'search' => 'ws_categories.name'
    ]
], $fields);