<?php

use Core\Database;

unset($fields['status']);
$fields['vehicle_id']['type'] = 'options:- Pilih -';

$db = new Database;
$db->query = "SELECT COUNT(*) as `counter` FROM ws_inspections WHERE created_at LIKE '%" . date('Y-m') . "%'";
$counter = $db->exec('single')?->counter ?? 0;

$code = 'PKB' . date('Ym') . sprintf("%04d", $counter + 1);
$fields['code']['attr']['value'] = $code;
$fields['code']['attr']['readonly'] = 'readonly';
$fields['booking_date']['attr']['value'] = date('Y-m-d H:i:s');
$fields['handover_date']['attr']['value'] = date('Y-m-d H:i:s');

$isNew = !isset($_GET['customer_type']) || $_GET['customer_type'] == 'NEW' ? 1 : 0;

$fields['customer_type']['attr'] = ['value' => isset($_GET['customer_type']) ? $_GET['customer_type'] : 'NEW'];

if($isNew)
{
    $fields['customer_id']['label'] = 'Kustomer (Format tidak boleh di ubah)';
    $fields['customer_id']['type'] = 'textarea';
    $fields['customer_id']['attr']['value'] = "Nama: \nAlamat: \nNo. HP: ";
    $fields['customer_id']['attr']['rows'] = 8;
    $fields['vehicle_id']['label'] = 'Kendaraan (Format tidak boleh di ubah)';
    $fields['vehicle_id']['type'] = 'textarea';
    $fields['vehicle_id']['attr']['value'] = "Merk: \nModel: \nVarian: \nTahun: \nNo. Polisi: ";
    $fields['vehicle_id']['attr']['rows'] = 8;
}

return $fields;