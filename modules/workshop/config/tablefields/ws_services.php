<?php

return [
    'inspection_id' => [
        'label' => 'Kode Inspeksi',
        'type' => 'options-obj:ws_inspections,id,code'
    ],
    'employee_id' => [
        'label' => 'Karyawan',
        'type' => 'options-obj:ws_employees,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Kendaraan',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ],
    'description' => [
        'label' => 'Deskripsi',
        'type' => "text"
    ],
    'created_at' => [
        'label' => 'Tanggal Masuk',
        'type' => "date"
    ]
];