<?php

namespace App;

use Slim\{
    App, Collection
};
use App\Providers\ConsoleProvider;
use Pimple\ServiceProviderInterface;

class Factory extends App {

    /**
     * @var
     */
    public static $instance;

    public function __construct($args) {
        $args = is_array($args) ? $args : include_once $args;

        parent::__construct(
            ['settings' => $args]
        );

        $this->setInstance($this);

        $this->includeHelpers();

        $this->registerPaths();

        $this->registerProviders(
            $this->getContainer()->get('settings')['providers']
        );
    }

    /**
     * Set instance {@Singleton pattern .}
     *
     * @param $app
     * @return mixed
     */
    public static function setInstance($app) {
        self::$instance = $app;

        return self::$instance;
    }

    /**
     * Get instance for current application .
     *
     * @return App
     */
    public static function getInstance() {
        if (! self::$instance)
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * Register base paths .
     *
     * @param array $paths
     * @return mixed
     */
    protected function registerPaths(array $paths = []) {
        $collection = (new Collection);

        foreach (array_merge(['public', 'bootstrap', 'config', 'app', 'assets'], $paths) as $path)
            $collection->set($path, realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $path));

        ioc('paths', $collection);

        return $this;
    }

    /**
     * Include helpers .
     *
     */
    protected function includeHelpers() {
        require_once __DIR__ . DIRECTORY_SEPARATOR . '../config/helpers.php';
    }

    /**
     * @param ServiceProviderInterface $provider
     * @return $this
     */
    protected function register($provider) {
        $this->getContainer()->register(
            new $provider
        );

        return $this;
    }

    /**
     * Register providers .
     *
     * @param array $providers
     * @return $this
     */
    protected function registerProviders(array $providers = array()) {
        foreach ($providers as $provider)
            $this->register($provider);

        return $this;
    }

    /**
     * Run application .
     *
     * @param bool $silent
     * @return int
     */
    public function run($silent = false) {
        if( is_cli_mode() ) {
            $this->register(ConsoleProvider::class);

            return ioc('console')
                ->run();
        }

        return parent::run($silent);
    }
}