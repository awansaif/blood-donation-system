<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'donor' => [
            'driver' => 'session',
            'provider' => 'donors',
        ],

        'org' => [
            'driver' => 'session',
            'provider' => 'orgs',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'donors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Donor::class,
        ],

        'orgs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Organization::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'donors' => [
            'provider' => 'donors',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'orgs' => [
            'provider' => 'orgs',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,

];
