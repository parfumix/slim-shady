<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DotEnvProvider implements ServiceProviderInterface {

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
        $dotenv = new Dotenv(app_path() . DIRECTORY_SEPARATOR . '../');
        $dotenv->load();

        return $this;
    }
}