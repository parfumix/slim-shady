<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use League\Flysystem\MountManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FlySystemProvider implements ServiceProviderInterface {

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
        $config = load_config('flysystem.php');

        $mount = [];
        foreach($config['adapters'] as $alias => $config)
            $mount[$alias] = (new Filesystem(
                ($config['args'] instanceof \Closure) ? $config['args']($config['resolver']) : new $config['resolver']($config['args'])
            ));

        $manager = new MountManager($mount);

        ioc('flysystem', $manager);

        return $this;
    }
}