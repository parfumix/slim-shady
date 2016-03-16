<?php

return [

    /**
     *The session name. The default value is PHPSESSID
     *
     */
    'name' => 'PHPSESSID',

    /**
     * The name of the key where flash data will be saved. The default value is opis:flashdata
     *
     */
    'flashslot' => 'opis:flashdata',

    /**
     * Lifetime of the session cookie, defined in seconds. The default value is retrieved from
     *
     */
    'lifetime' => null,

    /**
     * If set to true then PHP will attempt to send the httponly flag when setting the session cookie.
     * The default value is retrieved from php.ini (session.cookie_httponly)
     *
     */
    'httponly' => true,

    /**
     * Handler class name, by default will be used filesystem save path .
     *
     */
    'handler' => null
];