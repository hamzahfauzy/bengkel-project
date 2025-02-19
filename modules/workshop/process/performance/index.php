<?php

use Core\Database;
use Core\Page;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');

$db->query = "SELECT 
            ws_employees.id,
            ws_employees.name,
            SUM(CASE WHEN ws_employee_presences.record_type = 'PRESENCE' THEN 1 ELSE 0 END) total_presence,
            SUM(CASE WHEN ws_employee_presences.record_type = 'LEAVE' THEN 1 ELSE 0 END) total_leave,
            COUNT(ws_services.id)+COUNT(ws_invoices.id) total_task
          FROM ws_employees
          LEFT JOIN ws_services ON ws_services.employee_id = ws_employees.id
          LEFT JOIN ws_invoices ON ws_invoices.created_by = ws_employees.user_id
          LEFT JOIN ws_employee_presences ON ws_employee_presences.employee_id = ws_employees.id
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