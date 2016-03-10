<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SocialProvider implements ServiceProviderInterface {

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
        $socials = load_config('social.php');

        foreach($socials as $alias => $social)
            ioc($alias, function() use($social) {
                return (new $social['resolver']($social['args']));
            });

        return $this;
    }

}