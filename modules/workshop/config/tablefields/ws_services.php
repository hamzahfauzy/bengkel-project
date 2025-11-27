<?php

return [
    'inspection_id' => [
        'label' => 'Kode Inspeksi',
        'type' => 'options-obj:ws_inspections,id,code',
    ],
    'employee_id' => [
        'label' => 'Karyawan',
        'type' => 'options-obj:ws_employees,id,name'
    ],
    'advisor_id' => [
        'label' => 'Service Advisor',
        'type' => 'options-obj:ws_employees,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Kendaraan',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ],
    'description' => [
        'label' => 'Deskripsi',
        'type' => "text",
        'search' => 'ws_services.description'
    ],
    'record_status' => [
        'label' => 'Status',
        'type' => "options:MENUNGGU ANTRIAN|ESTIMASI BIAYA|PEKERJAAN SERVICE|MENUNGGU SPAREPART|MENUNGGU FINAL INSPEKSI|SELESAI|ISTIRAHAT|PENDING/MENGINAP|KLAIM GARANSI"
    ],
    'created_at' => [
        'label' => 'Tanggal Masuk',
        'type' => "date"
    ]
];