<?php

namespace App\Providers;

use App\Services\Kernel\Oauth\Capsule;
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
        if(! session_id()) session_start();

        ioc('oauth', function() {
            return (new Capsule(
                load_config('social.php')
            ));
        });

        return $this;
    }

}