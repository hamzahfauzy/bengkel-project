<?php

$record_type = $_GET['filter']['record_type'];

$fields['category_id']['type'] .= '|record_type,'.$record_type;

if($record_type == 'SERVICE')
{
    unset($fields['supplier_name']);
}

return $fields;