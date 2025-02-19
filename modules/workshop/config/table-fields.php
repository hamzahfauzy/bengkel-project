<?php 

return [
    'ws_customers' => [
        'name' => [
            'label' => 'Name',
            'type' => 'text'
        ],
        'phone' => [
            'label' => 'Phone',
            'type' => 'text'
        ],
        'address' => [
            'label' => 'Address',
            'type' => 'textarea'
        ],
    ],
    'ws_employees' => [
        'name' => [
            'label' => 'Name',
            'type' => 'text'
        ],
        'phone' => [
            'label' => 'Phone',
            'type' => 'text'
        ],
        'address' => [
            'label' => 'Address',
            'type' => 'textarea'
        ],
        'record_type' => [
            'label' => 'Type',
            'type' => 'options:REGULAR|MECHANIC'
        ],
    ],
    'ws_categories' => [
        'name' => [
            'label' => 'Name',
            'type' => 'text'
        ],
        'record_type' => [
            'label' => 'Type',
            'type' => 'options:SPARE PART|SERVICE'
        ],
    ],
    'ws_products' => [
        'category_id' => [
            'label' => 'Category',
            'type' => 'options-obj:ws_categories,id,name'
        ],
        'name' => [
            'label' => 'Name',
            'type' => 'text'
        ],
        'description' => [
            'label' => 'Description',
            'type' => 'textarea'
        ],
        'supplier_name' => [
            'label' => 'Supplier',
            'type' => 'text'
        ],
        // 'record_type' => [
        //     'label' => 'Type',
        //     'type' => 'options:SPARE PART|SERVICE'
        // ],
    ],
    'ws_customer_vehicles' => [
        'customer_id' => [
            'label' => 'Customer',
            'type' => 'options-obj:ws_customers,id,name'
        ],
        'name' => [
            'label' => 'Name',
            'type' => 'text'
        ],
        'description' => [
            'label' => 'Description',
            'type' => 'textarea'
        ],
        'merk' => [
            'label' => 'Merk',
            'type' => 'text'
        ],
        'type' => [
            'label' => 'Tipe',
            'type' => 'text'
        ],
        'police_number' => [
            'label' => 'No. Polisi',
            'type' => 'text'
        ],
        'chasis_number' => [
            'label' => 'No. Rangka Mesin',
            'type' => 'text'
        ],
        'color' => [
            'label' => 'Warna',
            'type' => 'text'
        ],
        'year' => [
            'label' => 'Tahun',
            'type' => 'text'
        ],
    ],
    'ws_product_prices' => [
        'product_id' => [
            'label' => 'Product',
            'type' => 'options-obj:ws_products,id,name'
        ],
        'amount' => [
            'label' => 'Amount',
            'type' => 'number'
        ],
        'status' => [
            'label' => 'Status',
            'type' => 'text'
        ]
    ],
    'ws_invoices' => [
        'customer_id' => [
            'label' => 'Customer',
            'type' => 'options-obj:ws_customers,id,name'
        ],
        'code' => [
            'label' => 'Invoice No.',
            'type' => 'text'
        ],
        'total_item' => [
            'label' => 'Total Items',
            'type' => 'number'
        ],
        'total_qty' => [
            'label' => 'Total Qty',
            'type' => 'number'
        ],
        'final_price' => [
            'label' => 'Final Price',
            'type' => 'number'
        ],
        'total_payment' => [
            'label' => 'Total Payment',
            'type' => 'number'
        ],
        // 'status' => [
        //     'label' => 'Status',
        //     'type' => 'text'
        // ],
        '_userstamp' => true
    ],
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
        'description',
        '_userstamp' => true
    ],
    'ws_marketing_campaigns' => [
        'template_id' => [
            'label' => 'Template',
            'type' => 'options-obj:ws_marketing_templates,id,title'
        ],
        'title',
        'description',
        'start_at',
        'finish_at',
        'status',
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
        // 'record_type' => [
        //     'label' => 'Type',
        //     'type' => 'options:PRESENCE|LEAVE'
        // ],
        'record_status' => [
            'label' => 'Status',
            'type' => 'options:APPROVE|DECLINE'
        ],
        'attachment_url' => [
            'label' => 'Attachment',
            'type' => 'file'
        ],
        '_userstamp' => true,
    ]
];