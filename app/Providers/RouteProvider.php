<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RouteProvider implements ServiceProviderInterface {

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

        require_once app_path() . DIRECTORY_SEPARATOR . 'Http/routes.php';
    }
}