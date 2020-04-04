<?php

return [
    'role_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'admin' => 'c,r,u,d',
            'profile' => 'r,d'
        ],
        'subadmin' => [
            'users' => 'c,r,u',
            'profile' => 'r,u'
        ],
    ],
    'user_roles' => [
        'admin' => [
            ['name' => "Admin", "email" => "admin@gmail.com", "password" => '12345678'],
        ],
        'user' => [
            ['name' => "Saif", "email" => "saif@gmail.com", "password" => '12345678'],
        ],
        'developer' => [
            ['name' => "Developer", "email" => "developer@gmail.com", "password" => '12345678'],
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
