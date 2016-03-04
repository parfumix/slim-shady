<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Debugging
    |--------------------------------------------------------------------------
    |
    | The service allow you to enable / disable debugging .
    |
    */
    'displayErrorDetails' => true,

    /*
    |--------------------------------------------------------------------------
    | Autoladed Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */
    'providers' => [
        \App\Providers\RouteProvider::class,
        \App\Providers\DotEnvProvider::class,
        \App\Providers\CacheProvider::class,
        \App\Providers\SpotProvider::class,
        \App\Providers\ClimateProvider::class,
        \App\Providers\TemplateProvider::class
    ],

    /*
    |--------------------------------------------------------------------------
    | View Template Engine
    |--------------------------------------------------------------------------
    |   SetUp template view paths .
    |
    */
    'view' => [
        'paths' => [
            __DIR__ . '/../assets/templates'
        ]
    ]
];