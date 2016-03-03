<?php

return [

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
        \App\Services\RouteProvider::class,
        \App\Services\SpotProvider::class
    ]
];