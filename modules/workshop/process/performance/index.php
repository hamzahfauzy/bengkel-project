<?php

use Core\Database;
use Core\Page;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');

$start_date = (isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')) . ' 00:00:00';
$end_date = (isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')) . ' 23:59:59';

$db->query = "SELECT 
            ws_employees.id,
            ws_employees.name,
            SUM(CASE WHEN ws_employee_presences.record_type = 'PRESENCE' THEN 1 ELSE 0 END) total_presence,
            SUM(CASE WHEN ws_employee_presences.record_type = 'LEAVE' THEN 1 ELSE 0 END) total_leave,
            COUNT(ws_services.id)+COUNT(ws_invoices.id) total_task
          FROM ws_employees
          LEFT JOIN ws_services ON ws_services.employee_id = ws_employees.id AND ws_services.created_at BETWEEN '$start_date' AND '$end_date'
          LEFT JOIN ws_invoices ON ws_invoices.created_by = ws_employees.user_id AND ws_invoices.created_at BETWEEN '$start_date' AND '$end_date'
          LEFT JOIN ws_employee_presences ON ws_employee_presences.employee_id = ws_employees.id AND ws_employee_presences.created_at BETWEEN '$start_date' AND '$end_date'
          GROUP BY ws_employees.id";
$employees = $db->exec('all');

// page section
$title = 'Performance';
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

return view('workshop/views/performance/index', compact('error_msg','success_msg','old','employees'));