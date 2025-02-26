<?php

$record_type = $_GET['filter']['record_type'];

$fields['category_id']['type'] .= '|record_type,'.$record_type;

if($record_type == 'SERVICE')
{
    unset($fields['supplier_name']);
    $fields['unit']['type'] = 'options:PCS|SET|.';
}

if($record_type == 'SPARE PART')
{
    $fields['unit']['type'] = 'options:.|BOTOL|GALON|LITER|PCS|SET|KALENG|METER';
}

return $fields;