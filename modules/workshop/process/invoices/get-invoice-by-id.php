<?php

use Core\Database;
use Core\Response;

$db = new Database;

$invoice = $db->single('ws_invoices', ['id' => $_GET['id']]);

return Response::json($invoice, 'invoice retrieved');