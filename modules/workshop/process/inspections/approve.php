<?php

use Core\Database;

$db = new Database;
$success_msg  = get_flash_msg('success');
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');
$id = $_GET['id'];

$db->update('ws_inspections', [
    'status' => 'APPROVE'
], [
    'id' => $id
]);

return redirectBack(['success' => 'Data Approved']);