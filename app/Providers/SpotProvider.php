<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Spot\Config;
use Spot\Locator;

class SpotProvider implements ServiceProviderInterface {

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
        $database = require_once config_path() . DIRECTORY_SEPARATOR . 'database.php';

        $cfg = new Config();

        foreach($database['connections'] as $alias => $connection)
            $cfg->addConnection($alias, $connection, isset($database['default']) ?? 'default' == $alias);

        $spot = new Locator($cfg);

        $pimple['database'] = $spot;

        return $this;
    }
}