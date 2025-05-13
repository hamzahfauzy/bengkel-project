<?php

use Core\Database;

$db = new Database;
$db->insert('ws_services', [
    'inspection_id' => $data->id,
    'vehicle_id' => $data->vehicle_id,
    'description' => $data->description,
    'record_status' => 'MENUNGGU ANTRIAN'
]);