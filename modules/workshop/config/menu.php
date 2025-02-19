<?php 

return [
    [
        'label' => 'workshop.menu.master_data',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
        'activeState' => [
            'workshop.ws_customers',
            'workshop.ws_employees',
            'workshop.ws_categories',
            'workshop.ws_customer_vehicles',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.customers',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
                'route' => routeTo('crud/index',['table' => 'ws_customers']),
                'activeState' => 'workshop.ws_customers'
            ],
            [
                'label' => 'workshop.menu.employees',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_employees']),
                'activeState' => 'workshop.ws_employees'
            ],
            [
                'label' => 'workshop.menu.categories',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_categories']),
                'activeState' => 'workshop.ws_categories'
            ],
            [
                'label' => 'workshop.menu.vehicles',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_customer_vehicles']),
                'activeState' => 'workshop.ws_customer_vehicles'
            ],
            
        ]
    ],
    [
        'label' => 'workshop.menu.products',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-boxes',
        'activeState' => [
            'workshop.product.spare part',
            'workshop.product.service',
            'workshop.ws_product_prices',
            'workshop.ws_product_logs',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.spareparts',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_products', 'filter' => ['record_type' => 'SPARE PART']]),
                'activeState' => 'workshop.product.spare part'
            ],
            [
                'label' => 'workshop.menu.services',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_products', 'filter' => ['record_type' => 'SERVICE']]),
                'activeState' => 'workshop.product.service'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.performance',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-chart-line',
        'activeState' => [
            'workshop.ws_employee_presences',
            'workshop.performance.presence',
            'workshop.performance.leave',
            'workshop.performance.performance',
            // 'workshop.ws_product_prices',
            // 'workshop.ws_product_logs',
            // 'workshop.ws_customer_vehicles',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.presences',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
                'route' => routeTo('crud/index',['table' => 'ws_employee_presences', 'filter' => ['record_type' => 'PRESENCE']]),
                'activeState' => 'workshop.performance.presence'
            ],
            [
                'label' => 'workshop.menu.leaves',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table' => 'ws_employee_presences', 'filter' => ['record_type' => 'LEAVE']]),
                'activeState' => 'workshop.performance.leave'
            ],
            [
                'label' => 'workshop.menu.performance',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('workshop/performance/index'),
                'activeState' => 'workshop.ws_categories'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.transactions',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-receipt',
        'activeState' => [
            'workshop.transactions.procurement',
            'workshop.transactions.sales',
            'workshop.transactions.spare part',
            'workshop.transactions.service',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.procurement',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
                'route' => routeTo('crud/index',['table' => 'ws_invoices', 'filter' => ['record_type' => 'PROCUREMENT']]),
                'activeState' => 'workshop.transactions.procurement'
            ],
            [
                'label' => 'workshop.menu.sales',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table' => 'ws_invoices', 'filter' => ['record_type' => 'SALES']]),
                'activeState' => 'workshop.transactions.sales'
            ],
            [
                'label' => 'workshop.menu.spareparts',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_invoice_items', 'filter' => ['product_type' => 'SPARE PART']]),
                'activeState' => 'workshop.transactions.spare part'
            ],
            [
                'label' => 'workshop.menu.services',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_invoice_items', 'filter' => ['product_type' => 'SERVICE']]),
                'activeState' => 'workshop.transactions.service'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.finances',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-dollar-sign',
        'activeState' => [
            'workshop.ws_finance_journals',
            // 'workshop.ws_employees',
            // 'workshop.ws_products',
            // 'workshop.ws_product_prices',
            // 'workshop.ws_product_logs',
            // 'workshop.ws_customer_vehicles',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.payroll',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
                'route' => '#', // routeTo('crud/index',['table' => 'ws_customers']),
                'activeState' => 'workshop.ws_customers'
            ],
            [
                'label' => 'workshop.menu.journals',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_finance_journals']),
                'activeState' => 'workshop.ws_finance_journals'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.marketing',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-bullhorn',
        'activeState' => [
            'workshop.ws_marketing_templates',
            'workshop.ws_marketing_campaigns',
            'workshop.ws_marketing_campaign_items',
            // 'workshop.ws_employees',
            // 'workshop.ws_products',
            // 'workshop.ws_product_prices',
            // 'workshop.ws_product_logs',
            // 'workshop.ws_customer_vehicles',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.templates',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
                'route' => routeTo('crud/index',['table' => 'ws_marketing_templates']),
                'activeState' => 'workshop.ws_marketing_templates'
            ],
            [
                'label' => 'workshop.menu.campaigns',
                'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-fill-drip',
                'route' => routeTo('crud/index',['table'=>'ws_marketing_campaigns']),
                'activeState' => 'workshop.ws_marketing_campaigns'
            ],
        ]
    ]
];