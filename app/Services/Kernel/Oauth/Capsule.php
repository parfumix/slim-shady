<?php

namespace App\Services\Kernel\Oauth;

class Capsule {

    /**
     * @var array
     */
    private $configuration;

    /**
     * @var array
     */
    protected $providers = [];

    /**
     * OauthManager constructor.
     * @param array $configuration
     */
    public function __construct(array $configuration) {
        $this->setConfiguration(
            $configuration
        );
    }


    /**
     * Set connections .
     *
     * @param array $configuration
     * @return $this
     */
    public function setConfiguration(array $configuration) {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Get all connections
     *
     * @return array
     */
    public function getConfiguration() {
        return $this->configuration;
    }


    /**
     * Get connection instance .
     *
     * @param $name
     * @return mixed
     * @throws \OAuthException
     */
    public function connection($name) {
        if(! isset($this->providers[$name])) {
            $providerClass = $this->getProviderClass($name);

            if(! $providerClass)
                throw new \OAuthException('Invalid social provider');

            $this->providers[$name] = (new $providerClass(
                $this->configuration['connections'][$name]
            ));
        }

        return $this->providers[$name];
    }

    /**
     * @param $name
     * @return null
     */
    protected function getProviderClass($name) {
        return $this->configuration['providers'][$name] ?? null;
    }
}