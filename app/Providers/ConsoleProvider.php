<?php

namespace App\Providers;

use App\Console\Kernel;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConsoleProvider implements ServiceProviderInterface {

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
        ioc('console', function() use($pimple) {
            return new Kernel(
                $pimple->get('settings')['commands'] ?? [], $_SERVER['argv'] ?? []
            );
        });

        return $this;
    }
}