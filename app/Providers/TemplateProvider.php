<?php

namespace App\Providers;

use League\Plates\Engine;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TemplateProvider implements ServiceProviderInterface {

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

        $view = $pimple['settings']->get('view', []);

        $engine = new Engine(
            array_pop($view['paths']), $view['extension'] ?? 'phtml'
        );

        foreach($view['paths'] as $alias =>  $path)
            $engine->addFolder($alias, $path);

        ioc('view', $engine);

        return $this;
    }
}