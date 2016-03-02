<?php

namespace App\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class RouteProvider extends AbstractProvider implements ServiceProviderInterface {

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple) {
        $app = $this->getApp();

        require_once APP_PATH . 'Http/routes.php';
    }
}