<?php

return [
    'code' => [
        'label' => 'No. Inspeksi',
        'type' => 'text'
    ],
    'customer_type' => [
        'label' => 'Customer Type',
        'type' => 'options:NEW|EXISTING'
    ],
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'options-obj:ws_customers,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Vehicle',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ],
    'booking_date' => [
        'label' => 'Tanggal Pesan',
        'type' => 'datetime-local'
    ],
    'handover_date' => [
        'label' => 'Tanggal Penyerahan',
        'type' => 'datetime-local'
    ],
    'waiting_status' => [
        'label' => 'Status Tunggu',
        'type' => 'options:WAITING|LEAVING'
    ],
    'km_in' => [
        'label' => 'KM Masuk',
        'type' => 'number'
    ],
    'km_out' => [
        'label' => 'KM Keluar',
        'type' => 'number'
    ],
    'complaint' => [
        'label' => 'Keluhan',
        'type' => 'textarea',
    ],
    'description' => [
        'label' => 'Deskripsi Singkat',
        'type' => 'textarea',
    ],
    'spareparts' => [
        'label' => 'Spareparts',
        'type' => 'textarea',
    ],
    'recommendation' => [
        'label' => 'Rekomendasi',
        'type' => 'textarea',
    ],
    'status' => [
        'label' => 'Status',
        'type' => 'text'
    ],
    '_userstamp' => true
];