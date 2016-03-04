<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CacheProvider implements ServiceProviderInterface {

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
        $pimple['cache'] = function () {
            return new \Slim\HttpCache\CacheProvider();
        };

        return $this;
    }
}