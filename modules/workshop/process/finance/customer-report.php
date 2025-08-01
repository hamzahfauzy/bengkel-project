<?php

use Core\Database;
use Core\Page;
use Core\Request;

$start_date = (isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')) . ' 00:00:00';
$end_date = (isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')) . ' 23:59:59';

$start_month = date('Y-m-01', strtotime(isset($_GET['start_date']) ? $_GET['start_date'] : 'now')) . ' 00:00:00';
$end_month = date('Y-m-t', strtotime(isset($_GET['end_date']) ? $_GET['end_date'] : 'now')) . ' 23:59:59';

$db = new Database;
$db->query = "SELECT 
                ws_customers.name customer_name,
                COALESCE(SUM(ws_payments.amount),0) total_transaction
              FROM ws_payments 
              LEFT JOIN ws_invoices ON ws_invoices.id = ws_payments.invoice_id
              LEFT JOIN ws_customers ON ws_customers.id = ws_invoices.customer_id
              WHERE ws_payments.record_type = 'IN' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'
              GROUP BY ws_customers.id
              ";

$customers = $db->exec('all');

// page section
$title = 'Laporan Kustomer';
Page::setActive("workshop.ws_customer_report");
Page::setTitle($title);
Page::setModuleName($title);
Page::setBreadcrumbs([
    [
        'url' => routeTo('/'),
        'title' => __('crud.label.home')
    ],
    [
        'url' => '#',
        'title' => 'Keuangan'
    ],
    [
        'title' => $title
    ]
]);


return view('workshop/views/finance/customer-report', compact('customers'));