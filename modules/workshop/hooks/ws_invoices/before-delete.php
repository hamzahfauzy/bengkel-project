<?php

use Core\Database;

$db = new Database;
$db->delete('ws_finance_journals', ['code' => $data->code]);
$db->delete('ws_invoice_items', ['invoice_id' => $data->id]);