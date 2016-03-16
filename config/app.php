<?php

use App\Console\Commands\{Migrate, Seed};

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
        \App\Providers\SessionProvider::class,
        \App\Providers\RouteProvider::class,
        \App\Providers\DotEnvProvider::class,
        \App\Providers\HttpCacheProvider::class,
        \App\Providers\SpotProvider::class,
        \App\Providers\TemplateProvider::class,
        \App\Providers\FlySystemProvider::class,
        \App\Providers\SocialProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    */
    'middleware' => [
        \App\Http\Middleware\AuthMiddleware::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Commands Register
    |--------------------------------------------------------------------------
    |
    | That option allow you to register new commands .
    |
    */
    'commands' => [
        'db:migrate' => Migrate::class,
        'db:seed' => Seed::class
    ],

    /*
    |--------------------------------------------------------------------------
    | View Template Engine
    |--------------------------------------------------------------------------
    |   SetUp template view paths .
    |
    */
    'view' => [
        'extension'=> 'phtml',
        'paths' => [
            __DIR__ . '/../assets/templates'
        ]
    ]
];