<?php

use Core\Database;

$db = new Database;
$inspection = $db->single('ws_inspections',['id' => $_GET['id']]);
$vehicle = $db->single('ws_customer_vehicles', ['id' => $inspection->vehicle_id]);

unset($fields['status']);
$fields['vehicle_id']['type'] = 'options:'.$vehicle->name.' - '.$vehicle->police_number;
return $fields;