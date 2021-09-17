<?php
 return [
    'items' => [
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', 
            'page' => '/',
            'new-tab' => false,
        ],
        [
            'title' => 'User Accounts',
            'icon' => 'media/svg/icons/Communication/Group.svg',
            'root' => true,
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'List Users',
                    'page' => '/users'
                ],
                [
                    'title' => 'Register User',
                    'page' => '/register',
                    'new-tab'=>true
                ],
            ],
        ],
        [
            'title' => 'Settings',
            'icon' => 'media/svg/icons/General/Settings-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Country',
                    'page' => '/country'
                ],
            ]
        ]
    ]
];

