<?php

use Core\Database;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');
$code = $_GET['code'];

$db->update('ws_invoices', [
    'status' => 'WAITING PAYMENT'
], [
    'code' => $code
]);

return redirectBack(['success' => 'Data Approved']);