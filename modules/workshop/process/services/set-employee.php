<?php

use Core\Database;

$db = new Database;
$db->update('ws_services', [
    'employee_id' => $_POST['employee_id'],
    'advisor_id' => $_POST['advisor_id'],
], [
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>"Set karyawan berhasil"]);

header('location:'.crudRoute('crud/index','ws_services'));
die();