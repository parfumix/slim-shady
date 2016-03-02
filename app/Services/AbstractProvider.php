<?php

namespace App\Services;

use Slim\App;

abstract class AbstractProvider {

    /**
     * @var App
     */
    private $app;

    /**
     * AbstractProvider constructor.
     * @param App $app
     */
    public function __construct(App $app) {
        $this->setApp($app);
    }

    /**
     * Get app instance ..
     *
     * @return App
     */
    public function getApp() {
        return $this->app;
    }

    /**
     * Set app instance .
     *
     * @param App $app
     * @return $this
     */
    public function setApp(App $app) {
        $this->app = $app;

        return $this;
    }
}