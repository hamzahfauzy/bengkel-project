<?php

use Core\Database;

$db = new Database;
$inspection = $db->single('ws_inspections',['id' => $_GET['id']]);
$vehicle = $db->single('ws_customer_vehicles', ['id' => $inspection->vehicle_id]);

unset($fields['status']);
$vehicleData = [];
$vehicleData[$vehicle->name.' - '.$vehicle->police_number] = $vehicle->id;
$fields['vehicle_id']['type'] = 'options:'.json_encode($vehicleData);

$fields['keterangan'] = [
    'type' => 'textarea',
    'label' => 'Keterangan'
];
return $fields;