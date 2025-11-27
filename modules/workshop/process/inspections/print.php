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

$inspection->customer = $db->single('ws_customers', [
    'id' => $inspection->customer_id
]);

$inspection->vehicle = $db->single('ws_customer_vehicles', [
    'id' => $inspection->vehicle_id
]);

$inspection->service = $db->single('ws_services', [
    'inspection_id' => $inspection->id
]);

$inspection->mechanic = $db->single('ws_employees', [
    'id' => $inspection->service->employee_id
]);

$inspection->advisor = $db->single('ws_employees', [
    'id' => $inspection->service->advisor_id
]);

// return Response::json($inspection, 'success');

return view('workshop/views/inspections/print', [
    'data' => $inspection
]);