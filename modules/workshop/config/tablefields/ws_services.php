<?php

return [
    'employee_id' => [
        'label' => 'Employee',
        'type' => 'options-obj:ws_employees,id,name'
    ],
    'vehicle_id' => [
        'label' => 'Vehicle',
        'type' => "options-obj:ws_customer_vehicles,id,CONCAT(name,' - ',police_number)"
    ]
];