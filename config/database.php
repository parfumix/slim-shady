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
            'host' => 'localhost',
            'dbname' => 'sellcode',
            'user' => 'root',
            'password' => '',
        ]
    ]
];