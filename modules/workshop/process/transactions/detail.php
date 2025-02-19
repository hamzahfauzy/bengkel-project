<?php

use Core\Database;
use Core\Page;
use Core\Request;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');
$code = $_GET['code'];

$invoice = $db->single('ws_invoices',['code' => $code]);
$invoice->customer = $db->single('ws_customers',['id' => $invoice->customer_id]);
$db->query = "SELECT 
                ws_invoice_items.*, 
                ws_products.name product_name,
                ws_products.record_type product_type,
                ws_employees.name employee_name,
                CONCAT(ws_customer_vehicles.name,' - ',ws_customer_vehicles.police_number) vehicle_name
              FROM ws_invoice_items 
              LEFT JOIN ws_products ON ws_products.id = ws_invoice_items.product_id 
              LEFT JOIN ws_services ON ws_services.invoice_item_id = ws_invoice_items.id
              LEFT JOIN ws_customer_vehicles ON ws_customer_vehicles.id = ws_services.vehicle_id
              LEFT JOIN ws_employees ON ws_employees.id = ws_services.employee_id
              WHERE ws_invoice_items.invoice_id = $invoice->id";

$invoice->items = $db->exec('all');

$employees = $db->all('ws_employees',['record_type' => 'MECHANIC']);
$vehicles = $db->all('ws_customer_vehicles', ['customer_id' => $invoice->customer_id]);

if(Request::isMethod('POST'))
{
    $db->insert('ws_services',[
        'invoice_item_id' => $_POST['invoice_item_id'],
        'vehicle_id' => $_POST['vehicle'],
        'employee_id' => $_POST['employee'],
    ]);

    return redirectBack(['success' => 'Employee set success']);
}

// page section
$title = 'Detail';
Page::setActive("workshop.transactions.detail");
Page::setTitle($title);
Page::setModuleName($title);
Page::setBreadcrumbs([
    [
        'url' => routeTo('/'),
        'title' => __('crud.label.home')
    ],
    [
        'url' => '#',
        'title' => 'Transaction'
    ],
    [
        'title' => $title
    ]
]);

Page::pushHead('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />');
Page::pushHead('<style>.select2,.select2-selection{height:38px!important;} .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:38px!important;}.select2-selection__arrow{height:34px!important;}</style>');
Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>');
Page::pushFoot("<script>$('.select2insidemodal').select2({dropdownParent: $('#employeeModal .modal-body')});$('.select2insidemodal2').select2({dropdownParent: $('#customerModal .modal-body')});</script>");

return view('workshop/views/transactions/detail', compact('error_msg','success_msg','old','invoice','employees','vehicles'));