<?php

use Core\Database;
use Core\Response;

$id = $_GET['id'];
$db = new Database;
$inspection = $db->single('ws_inspections', [
    'id' => $id
]);

$inspection->creator = $db->single('users', [
    'id' => $inspection->created_by
]);

$inspection->vehicle = $db->single('ws_customer_vehicles', [
    'id' => $inspection->vehicle_id
]);

// return Response::json($inspection, 'success');

return view('workshop/views/inspections/print', [
    'data' => $inspection
]);