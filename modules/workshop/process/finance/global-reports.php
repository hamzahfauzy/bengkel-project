<?php

use Core\Database;
use Core\Page;
use Core\Request;

$start_date = (isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')) . ' 00:00:00';
$end_date = (isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')) . ' 23:59:59';

$start_month = date('Y-m-01', strtotime(isset($_GET['start_date']) ? $_GET['start_date'] : 'now')) . ' 00:00:00';
$end_month = date('Y-m-t', strtotime(isset($_GET['end_date']) ? $_GET['end_date'] : 'now')) . ' 23:59:59';

$db = new Database;
$db->query = "SELECT COALESCE(SUM(amount),0) total FROM ws_payments WHERE record_type = 'IN' AND created_at BETWEEN '$start_date' AND '$end_date'";
$totalPemasukan = $db->exec('single')?->total;

$db->query = "SELECT COALESCE(SUM(amount),0) total FROM ws_payments WHERE record_type = 'OUT' AND created_at BETWEEN '$start_date' AND '$end_date'";
$totalPengeluaran = $db->exec('single')?->total;

$db->query = "SELECT COALESCE(SUM(ws_invoices.total_discount),0) total FROM ws_payments LEFT JOIN ws_invoices ON ws_invoices.id = ws_payments.invoice_id WHERE ws_payments.record_type = 'IN' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'";
$totalDiscount = $db->exec('single')?->total;

$db->query = "SELECT COALESCE(SUM(ws_invoice_items.final_price),0) total FROM ws_payments LEFT JOIN ws_invoice_items ON ws_invoice_items.invoice_id = ws_payments.invoice_id WHERE ws_payments.record_type = 'IN' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'";
$allOmset = $db->exec('single')?->total;

$db->query = "SELECT 
                COALESCE(SUM(CASE WHEN ws_products.record_type = 'SERVICE' THEN ws_invoice_items.final_price ELSE 0 END),0) total_service,
                COALESCE(SUM(CASE WHEN ws_products.record_type = 'SPARE PART' THEN ws_invoice_items.final_price ELSE 0 END),0) total_sparepart
              FROM ws_payments 
              LEFT JOIN ws_invoice_items ON ws_invoice_items.invoice_id = ws_payments.invoice_id
              LEFT JOIN ws_products ON ws_products.id = ws_invoice_items.product_id
              WHERE ws_payments.record_type = 'IN' AND ws_payments.created_at BETWEEN '$start_date' AND '$end_date'";

$omset = $db->exec('single');

$db->query = "SELECT 
                DATE_FORMAT(ws_payments.created_at, '%Y-%m') AS bulan,
                COALESCE(SUM(ws_payments.amount),0) total_omset,
                COALESCE(SUM(CASE WHEN ws_products.record_type = 'SERVICE' AND ws_payments.record_type = 'IN' THEN ws_invoice_items.final_price ELSE 0 END),0) total_service,
                COALESCE(SUM(CASE WHEN ws_products.record_type = 'SPARE PART' AND ws_payments.record_type = 'IN' THEN ws_invoice_items.final_price ELSE 0 END),0) total_sparepart,
                COALESCE(SUM(CASE WHEN ws_payments.record_type = 'IN' THEN ws_invoice_items.total_discount ELSE 0 END),0) total_discount,
                COALESCE(SUM(CASE WHEN ws_payments.record_type = 'IN' THEN ws_payments.amount ELSE 0 END),0) total_pemasukan,
                COALESCE(SUM(CASE WHEN ws_payments.record_type = 'OUT' THEN ws_payments.amount ELSE 0 END),0) total_pengeluaran
              FROM ws_payments 
              LEFT JOIN ws_invoice_items ON ws_invoice_items.invoice_id = ws_payments.invoice_id
              LEFT JOIN ws_products ON ws_products.id = ws_invoice_items.product_id
              WHERE  ws_payments.created_at BETWEEN '$start_month' AND '$end_month'
              GROUP BY bulan
              ORDER BY bulan";

$graphic = $db->exec('all');

// page section
$title = 'Laporan Global';
Page::setActive("workshop.ws_global_reports");
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


return view('workshop/views/finance/global-reports', compact('omset','allOmset','graphic','totalPemasukan','totalPengeluaran','totalDiscount'));