<?php

return [

    /**
     * SetUp default connection .
     *
     */
    'default' => 'default',

    /**
     * Describe all the connections .
     *
     */
    'connections' => [
        'default' => [
            'driver' => 'pdo_mysql',
            'host' => env('DB_HOST', 'localhost'),
            'dbname' => env('DB_DATABASE', 'sellcode'),
            'user' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
        ]
    ]
];