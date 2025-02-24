<?php

use Core\Database;

$db = new Database;
$invoice = $db->single('ws_invoices',[
    'id' => $data->invoice_id
]);

$total_payment = $invoice->total_payment + $data->amount;
$status = $total_payment - $invoice->final_price == 0 ? 'DONE' : $invoice->status;

$db->update('ws_invoices',[
    'total_payment' => $invoice->total_payment + $data->amount,
    'status' => $status
], [
    'id' => $invoice->id
]);

$db->insert('ws_finance_journals', [
    'code' => $invoice->code,
    'amount' => $data->amount,
    'description' => $invoice->record_type . ' #'.$invoice->code,
    'record_type' => $invoice->record_type == 'PROCUREMENT' ? 'OUT' : 'IN',
    'created_by' => auth()->id
]);
