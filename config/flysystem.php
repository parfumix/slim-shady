<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Declare adapters
    |--------------------------------------------------------------------------
    |
    | Here you will declare all available adapters .
    |
    */
    'adapters' => [
        'local' => [
            'resolver' => League\Flysystem\Adapter\Local::class,
            'args' => realpath(__DIR__ . DIRECTORY_SEPARATOR . '../assets/upload')
        ]
    ]
];