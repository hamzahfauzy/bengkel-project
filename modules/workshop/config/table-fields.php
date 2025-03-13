<?php 

return [
    'ws_customers' => require 'tablefields/ws_customers.php',
    'ws_employees' => require 'tablefields/ws_employees.php',
    'ws_categories' => require 'tablefields/ws_categories.php',
    'ws_products' => require 'tablefields/ws_products.php',
    'ws_customer_vehicles' => require 'tablefields/ws_customer_vehicles.php',
    'ws_product_prices' => require 'tablefields/ws_product_prices.php',
    'ws_invoices' => require 'tablefields/ws_invoices.php',
    'ws_payments' => require 'tablefields/ws_payments.php',
    'ws_inspections' => require 'tablefields/ws_inspections.php',
    'ws_services' => require 'tablefields/ws_services.php',
    'ws_order_items' => [
        'invoice_id',
        'product_id',
        'qty',
        'base_price',
        'total_price',
        'total_discount',
        'final_price',
        '_userstamp' => true
    ],
    'ws_product_logs' => [
        'product_id' => [
            'label' => 'Product',
            'type' => 'options-obj:ws_products,id,name'
        ],
        'amount' => [
            'type' => 'number',
            'label' => 'Amount'
        ],
        'record_type' => [
            'label' => 'Type',
            'type' => 'text'
        ],
        'description' => [
            'label' => 'Description',
            'type' => 'text'
        ],
        '_userstamp' => true
    ],
    'ws_finance_journals' => [
        'code',
        'amount' => [
            'label' => 'Amount',
            'type' => 'number'
        ],
        'record_type' => [
            'label' => 'Type',
            'type' => 'text'
        ],
        'description'
    ],
    'ws_marketing_templates' => [
        'title',
        'description' => [
            'label' => 'Description',
            'type' => 'textarea',
            'attr' => [
                'class' => 'form-control select2-search__field',
                'placeholder' => 'parameter : {name}, {phone}, {address}'
            ]
        ],
        '_userstamp' => true
    ],
    'ws_marketing_campaigns' => [
        'template_id' => [
            'label' => 'Template',
            'type' => 'options-obj:ws_marketing_templates,id,title',
            'attr' => [
                'required' => 'required'
            ]
        ],
        'title' => [
            'label' => 'Title',
            'type' => 'text',
            'attr' => [
                'required' => 'required'
            ]
        ],
        'description' => [
            'label' => 'Description',
            'type' => 'textarea',
            'attr' => [
                'class' => 'form-control select2-search__field',
                'required' => 'required'
            ]
        ],
        'start_at' => [
            'label' => 'Start At',
            'type' => 'datetime-local'
        ],
        'finish_at' => [
            'label' => 'Finish At',
            'type' => 'datetime-local'
        ],
        'status' => [
            'label' => 'Status',
            'type' => 'text'
        ],
        '_userstamp' => true
    ],
    'ws_invoice_items' => [
        'invoice_code' => [
            'label' => 'Invoice',
            'type' => 'text',
            'search' => 'ws_invoices.code'
        ],
        'product_name' => [
            'label' => 'Produk',
            'type' => 'text',
            'search' => 'ws_products.name'
        ],
        'qty' => [
            'label' => 'Qty',
            'type' => 'number'
        ],
        'base_price' => [
            'label' => 'Harga Satuan',
            'type' => 'number'
        ],
        // 'total_price' => [
        //     'label' => 'Total Harga',
        //     'type' => 'number'
        // ],
        // 'total_discount' => [
        //     'label' => 'Diskon',
        //     'type' => 'number'
        // ],
        'final_price' => [
            'label' => 'Harga Akhir',
            'type' => 'number'
        ],
    ],
    'ws_employee_presences' => [
        'employee_id' => [
            'label' => 'Employee',
            'type' => 'options-obj:ws_employees,id,name'
        ],
        'record_status' => [
            'label' => 'Status',
            'type' => 'options:APPROVE|DECLINE'
        ],
        'attachment_url' => [
            'label' => 'Attachment',
            'type' => 'file'
        ],
        '_userstamp' => true,
    ],
    'ws_marketing_campaign_items' => [
        'campaign_id' => [
            'label' => 'Campaign',
            'type' => 'options-obj:ws_marketing_campaigns,id,title'
        ],
        'customer_id' => [
            'label' => 'Customer',
            'type' => 'options-obj:ws_customers,id,name'
        ],
        'message',
        'notes',
        'status'
    ]
];