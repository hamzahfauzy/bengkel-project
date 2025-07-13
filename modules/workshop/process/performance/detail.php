<?php

use Core\Database;
use Core\Page;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');

$start_date = (isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')) . ' 00:00:00';
$end_date = (isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')) . ' 23:59:59';
$employee_id = $_GET['employee_id'];

$employee = $db->single('ws_employees', ['id' => $employee_id]);

$presences = $db->all('ws_employee_presences', [
    'employee_id' => $employee_id
]);

$tasks = [];

if($employee->record_type == 'MECHANIC')
{
    $db->query = "SELECT 
        ws_services.*, 
        ws_inspections.code inspection_code,
        ws_invoices.final_price,
        CONCAT(ws_customer_vehicles.name, ' - ', ws_customer_vehicles.police_number) vehicle_name
    FROM ws_services 
    LEFT JOIN ws_invoices ON ws_invoices.inspection_id = ws_services.inspection_id 
    LEFT JOIN ws_inspections ON ws_inspections.id = ws_services.inspection_id 
    LEFT JOIN ws_customer_vehicles ON ws_customer_vehicles.id = ws_inspections.vehicle_id 
    WHERE employee_id = $employee_id AND ws_services.created_at BETWEEN '$start_date' AND '$end_date'";
    $tasks = $db->exec('all');
}
else
{
    $db->query = "SELECT * FROM ws_invoices WHERE created_by = $employee->user_id AND created_at BETWEEN '$start_date' AND '$end_date'";
    $tasks = $db->exec('all');
}

// page section
$title = 'Performance ' . $employee->name;
Page::setActive("workshop.performance.performance");
Page::setTitle($title);
Page::setModuleName($title);
Page::setBreadcrumbs([
    [
        'url' => routeTo('/'),
        'title' => __('crud.label.home')
    ],
    [
        'url' => '#',
        'title' => 'Performance'
    ],
    [
        'title' => $title
    ]
]);

$view = isset($_GET['print']) ? 'workshop/views/performance/detail-print' : 'workshop/views/performance/detail';

return view($view, compact('error_msg','success_msg','old','employee','tasks','presences','start_date','end_date'));