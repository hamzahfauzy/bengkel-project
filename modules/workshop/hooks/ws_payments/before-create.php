<?php


use Core\Database;

$db = new Database;
$invoice = $db->single('ws_invoices',[
    'id' => $data['invoice_id']
]);

$data['record_type'] = $invoice->record_type == 'PROCUREMENT' ? 'OUT' : 'IN';