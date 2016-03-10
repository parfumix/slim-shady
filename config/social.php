<?php

use League\OAuth2\Client\Provider\Facebook;

return [

    'facebook' => [
        'resolver' => Facebook::class,
        'args' => [
            'clientId' => env('SC_FB_CLIENT_ID'),
            'clientSecret' => env('SC_FB_CLIENT_SECRET'),
            'redirectUri' => env('SC_FB_CLIENT_REDIRECT'),
            'graphApiVersion' => env('SC_FB_CLIENT_VERSION'),
        ]
    ]
];