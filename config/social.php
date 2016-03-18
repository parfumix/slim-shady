<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Available providers
    |--------------------------------------------------------------------------
    |
    | Here will be available providers .
    |
    */
    'providers' => [
        'facebook' => League\OAuth2\Client\Provider\Facebook::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Available connections
    |--------------------------------------------------------------------------
    |
    */
    'connections' => [
        'facebook' => [
            'clientId' => env('SC_FB_CLIENT_ID'),
            'clientSecret' => env('SC_FB_CLIENT_SECRET'),
            'redirectUri' => env('SC_FB_CLIENT_REDIRECT'),
            'graphApiVersion' => env('SC_FB_CLIENT_VERSION'),
        ]
    ]
];