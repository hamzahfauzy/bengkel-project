<?php

use Core\Database;

$db = new Database;

$code = $_GET['code'];

$invoice = $db->single('ws_invoices',['code' => $code]);
$invoice->vehicle = $invoice->vehicle_id ? $db->single('ws_customer_vehicles',['id' => $invoice->vehicle_id]) : null;
$invoice->customer = $db->single('ws_customers',['id' => $invoice->customer_id]);
$invoice->inspection = $db->single('ws_inspections',['id' => $invoice->inspection_id]);
$db->query = "SELECT 
                ws_invoice_items.*, 
                ws_products.name product_name,
                ws_products.unit product_unit,
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

return view('workshop/views/invoices/print', compact('invoice'));