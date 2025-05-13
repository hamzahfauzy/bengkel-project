<?php

use Core\Database;

$db = new Database;
$customer = $data['customer_id'];
$vehicle = $data['vehicle_id'];
try {
    // Ambil semua pasangan Key: Value
    preg_match_all('/^(.*?):\s*(.+)$/m', $customer, $customers, PREG_SET_ORDER);

    // Buat array hasil
    $result = [];

    foreach ($customers as $match) {
        $key = trim($match[1]);
        $value = trim($match[2]);
        $result[$key] = $value;
    }

    $customer = $db->insert('ws_customers', [
        'name' => $result['Nama'],
        'address' => $result['Alamat'],
        'phone' => $result['No. HP'],
    ]);

    $data['customer_id'] = $customer->id;
} catch (\Throwable $th) {
    //throw $th;
    unset($data['customer_id']);
}

try {
    // Ambil semua pasangan Key: Value
    preg_match_all('/^(.*?):\s*(.+)$/m', $vehicle, $vehicles, PREG_SET_ORDER);

    // Buat array hasil
    $result = [];

    foreach ($vehicles as $match) {
        $key = trim($match[1]);
        $value = trim($match[2]);
        $result[$key] = $value;
    }

    $dataKendaraan =  [
        'name' => $result['Model'],
        'merk' => $result['Merk'],
        'type' => $result['Varian'],
        'police_number' => $result['No. Polisi'],
        'description' => $result['Tahun'],
    ];

    if(isset($data['customer_id']))
    {
        $dataKendaraan['customer_id'] = $data['customer_id'];
    }

    $vehicle = $db->insert('ws_customer_vehicles', $dataKendaraan);

    $data['vehicle_id'] = $vehicle->id;
} catch (\Throwable $th) {
    //throw $th;
    unset($data['vehicle_id']);
}

unset($data['customer_type']);