<?php

use Core\Database;

$db = new Database;
$db->query = "SELECT ws_invoices.id, CONCAT(ws_invoices.created_at, ' - ',ws_invoices.code, ' - ', COALESCE(ws_customer_vehicles.police_number,FORMAT(ws_invoices.final_price, '0.00')), ' - ', ws_customer_vehicles.type, ' - ', ws_customers.name) as code FROM ws_invoices LEFT JOIN ws_customer_vehicles ON ws_customer_vehicles.id = ws_invoices.vehicle_id LEFT JOIN ws_customers ON ws_customers.id = ws_customer_vehicles.customer_id WHERE ws_invoices.`status` = 'WAITING PAYMENT' ORDER BY ws_invoices.id DESC";
$invoices = $db->exec('all');
$invoicesObj = ['- Pilih -' => 0];
foreach($invoices as $invoice)
{
    if(empty($invoice->code)) continue;
    $invoicesObj[$invoice->code] = $invoice->id;
}

$fields['invoice_id']['type'] = 'options:'.json_encode($invoicesObj);
// unset($fields['status']);
// $fields['status'] = [
//     'label' => 'Status',
//     'type' => 'options:LUNAS|TEMPO|HUTANG|KURANG|PIUTANG'
// ];
return $fields;