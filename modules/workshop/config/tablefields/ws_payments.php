<?php

return [
    'invoice_id' => [
        'label' => 'Invoice',
        'type' => 'options-obj:ws_invoices,id,code'
    ],
    'payment_type' => [
        'label' => 'Payment Type',
        'type' => 'options:CASH|TRANSFER'
    ],
    'amount' => [
        'label' => 'Amount',
        'type' => 'text',
        'attr' => [
            'data-type' => 'currency',
            'class' => 'form-control'
        ]
    ],
    'status' => [
        'label' => 'Status',
        'type' => 'options:LUNAS|TEMPO|HUTANG|KURANG|PIUTANG'
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea',
        'attr' => [
            'class' => 'form-control select2-search__field'
        ]
    ],
    '_userstamp' => true
];