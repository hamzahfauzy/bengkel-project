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
                'route' => routeTo('crud/index',['table'=>'ws_employees']),
                'activeState' => 'workshop.ws_employees'
            ],
            [
                'label' => 'workshop.menu.categories',
                'route' => routeTo('crud/index',['table'=>'ws_categories']),
                'activeState' => 'workshop.ws_categories'
            ],
            [
                'label' => 'workshop.menu.vehicles',
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
                'route' => routeTo('crud/index',['table'=>'ws_products', 'filter' => ['record_type' => 'SPARE PART']]),
                'activeState' => 'workshop.product.spare part'
            ],
            [
                'label' => 'workshop.menu.services',
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
                'route' => routeTo('crud/index',['table' => 'ws_employee_presences', 'filter' => ['record_type' => 'LEAVE']]),
                'activeState' => 'workshop.performance.leave'
            ],
            [
                'label' => 'workshop.menu.performance',
                'route' => routeTo('workshop/performance/index'),
                'activeState' => 'workshop.performance.performance'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.tasks',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-list-check',
        'activeState' => [
            'workshop.ws_inspections',
            'workshop.ws_services',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.inspections',
                'route' => routeTo('crud/index',['table' => 'ws_inspections']),
                'activeState' => 'workshop.ws_inspections'
            ],
            [
                'label' => 'workshop.menu.services',
                'route' => routeTo('crud/index',['table' => 'ws_services']),
                'activeState' => 'workshop.ws_services'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.invoices',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-receipt',
        'activeState' => [
            'workshop.invoices.procurement',
            'workshop.invoices.sales',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.procurement',
                'route' => routeTo('crud/index',['table' => 'ws_invoices', 'filter' => ['record_type' => 'PROCUREMENT']]),
                'activeState' => 'workshop.invoices.procurement'
            ],
            [
                'label' => 'workshop.menu.sales',
                'route' => routeTo('crud/index',['table' => 'ws_invoices', 'filter' => ['record_type' => 'SALES']]),
                'activeState' => 'workshop.invoices.sales'
            ],
        ]
    ],
    [
        'label' => 'workshop.menu.transactions',
        'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-cash-register',
        'activeState' => [
            'workshop.transactions.spare part',
            'workshop.transactions.service',
            'workshop.ws_payments',
        ],
        'items' => [
            [
                'label' => 'workshop.menu.payments',
                'route' => routeTo('crud/index',['table'=>'ws_payments']),
                'activeState' => 'workshop.ws_payments'
            ],
            [
                'label' => 'workshop.menu.spareparts',
                'route' => routeTo('crud/index',['table'=>'ws_invoice_items', 'filter' => ['product_type' => 'SPARE PART']]),
                'activeState' => 'workshop.transactions.spare part'
            ],
            [
                'label' => 'workshop.menu.services',
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
        ],
        'items' => [
            // [
            //     'label' => 'workshop.menu.payroll',
            //     'icon'  => 'fa-fw fa-lg me-2 fa-solid fa-stream',
            //     'route' => '#', // routeTo('crud/index',['table' => 'ws_customers']),
            //     'activeState' => 'workshop.ws_customers'
            // ],
            [
                'label' => 'workshop.menu.journals',
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
                'route' => routeTo('crud/index',['table'=>'ws_marketing_campaigns']),
                'activeState' => 'workshop.ws_marketing_campaigns'
            ],
        ]
    ]
];