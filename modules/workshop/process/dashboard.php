<?php

use Core\Database;
use Core\Page;

$db = new Database;
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d');

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

$db->query = "SELECT record_status, COUNT(*) jumlah FROM `ws_services` WHERE created_at BETWEEN '$start_date' AND '$end_date' GROUP BY record_status";
$allServices = $db->exec('all');

$service_stats = [
  'MENUNGGU ANTRIAN' => 0,
  'PEKERJAAN SERVICE' => 0,
  'SELESAI' => 0,
];

foreach($allServices as $data)
{
  $service_stats[$data->record_status] = $data->jumlah;
}

$title = 'Dashboard';
Page::setActive("workshop.dashboard");
Page::setTitle($title);

return view('workshop/views/dashboard', compact('omset','allOmset','totalPemasukan','totalPengeluaran','totalDiscount','allServices','service_stats'));