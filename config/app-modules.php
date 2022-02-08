<?php

use Illuminate\Support\Str;

return [
    'tanam-pohon' => [
        'TANAM POHON',
        [
            'text' => 'Orders',
            'icon' => 'fas fa-fw fa-shopping-basket',
            'route' => 'transaction.index',
            'active' => ['admin/tanam-pohon/transaction','admin/tanam-pohon/transaction/*']
        ],
        [
            'text' => 'Payment Confirmation',
            'icon' => 'fas fa-fw fa-clipboard-check',
            'route' => 'payment-confirmation.index',
        ],
        [
            
            'text' => 'Tree Catalog',
            'icon' => 'fas fa-fw fa-tree',
            'route' => 'tree-catalog.index'
        ],
        [
            
            'text' => 'Tree Inventory',
            'icon' => 'fas fa-fw fa-tree',
            'route' => 'tree-inventory.index',

        ],
        'MANAGEMENT',
        [
            'text' => 'Tree Species',
            'route'  => 'tree-species.index',
        ],
        [
            'text' => 'Canopy Shape',
            'route'  => 'canopy-shape.index',
        ],
        [
            'text' => 'Plant Location',
            'route'  => 'plant-location.index',
        ],
        [
            'text' => 'Plant Location Type',
            'route'  => 'plant-location-type.index',
        ],
     
    ],

    'app-config' => [
        [
            'text' => 'Bank Account',
            'icon' => 'fas fa-fw fa-university',
            'route' => 'bank-account.index'
        ],
        [
            'text' => 'Payment Method',
            'icon' => 'fas fa-fw fa-credit-card',
            'route' => 'payment-method.index'
        ],
    ]
];
