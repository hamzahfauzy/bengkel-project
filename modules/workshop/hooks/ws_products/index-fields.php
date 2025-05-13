<?php

$record_type = $_GET['filter']['record_type'];

if($record_type == 'SERVICE')
{
    unset($fields['supplier_name']);
}

unset($fields['description']);

return $fields;