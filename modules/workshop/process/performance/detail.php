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
    $tasks = $db->all('ws_services', [
        'employee_id' => $employee_id
    ]);
}
else
{
    $tasks = $db->all('ws_invoices', [
        'user_id' => $employee->user_id
    ]);
}

// page section
$title = 'Performance Detail';
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

return view('workshop/views/performance/detail', compact('error_msg','success_msg','old','employee','tasks'));