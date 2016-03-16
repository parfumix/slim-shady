<?php

namespace App\Providers;

use Opis\Session\Session;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SessionProvider implements ServiceProviderInterface {

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     * @return $this
     */
    public function register(Container $pimple) {
        if( is_cli_mode() ) return $this;

        $config = load_config('session.php');

        // if someone will start session before me.
        session_name($config['name'] ?? ini_get('session.name'));

        ioc('session', function() use($config) {
            return (new Session(
                $config['handler'] ?? null, $config
            ));
        });

        return $this;
    }
}