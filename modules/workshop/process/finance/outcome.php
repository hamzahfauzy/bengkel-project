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
                COALESCE(SUM(ws_payments.amount),0) total_outcome
              FROM ws_payments 
              WHERE ws_payments.record_type = 'OUT' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'";

$outcome = $db->exec('single');

$db->query = "SELECT 
                DATE_FORMAT(ws_payments.created_at, '%Y-%m') AS bulan,
                COALESCE(SUM(ws_payments.amount),0) total_outcome
              FROM ws_payments 
              WHERE ws_payments.record_type = 'OUT' AND ws_payments.created_at BETWEEN '$start_month' AND '$end_month'
              GROUP BY bulan
              ORDER BY bulan";

$graphic = $db->exec('all');

$db->query = "SELECT 
                DATE_FORMAT(ws_payments.created_at, '%Y-%m-%d') AS hari,
                COALESCE(SUM(ws_payments.amount),0) total_outcome
              FROM ws_payments 
              LEFT JOIN ws_invoice_items ON ws_invoice_items.invoice_id = ws_payments.invoice_id
              LEFT JOIN ws_products ON ws_products.id = ws_invoice_items.product_id
              WHERE ws_payments.record_type = 'OUT' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'
              GROUP BY hari
              ORDER BY hari";

$outcomes = $db->exec('all');

// page section
$title = 'Laporan Pengeluaran';
Page::setActive("workshop.ws_outcome");
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


return view('workshop/views/finance/outcome', compact('outcome','graphic','outcomes'));