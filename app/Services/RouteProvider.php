<?php

namespace App\Services;

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
     */
    public function register(Container $pimple) {
        require_once app_path() . DIRECTORY_SEPARATOR . 'Http/routes.php';
    }
}