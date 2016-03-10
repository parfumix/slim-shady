<?php

/**
 * App function .
 *
 * @param null $key
 * @param null $value
 * @return mixed
 */
function ioc($key = null, $value = null) {
    $app = App\Kernel::getInstance();

    if( is_null($key) )
        return $app;

    if( is_null($value) )
        return $app->getContainer()->get($key);

    return $app->getContainer()[$key] = $value;
}

/**
 * Get instance App
 *
 * @param null $method
 * @return \App\Kernel
 */
function app($method = null) {
    if(! is_null($method))
        return App\Kernel::getInstance()->{$method}();

    return App\Kernel::getInstance();
}

/**
 * Get instance View
 * @param null $template
 * @param array $args
 * @return mixed
 */
function view($template = null, array $args = array()) {
    if(is_null($template))
        return ioc('view');

    return ioc('view')->make($template, $args);
}

/**
 * Return mapper instance .
 *
 * @param $entity
 * @return mixed
 */
function mapper($entity) {
    return ioc('db')
        ->mapper($entity);
}


/**
 * Get path .
 *
 * @param $path
 * @return mixed
 */
function path($path) {
    return ioc('paths')[$path];
}

/**
 * Get app path .
 *
 * @return mixed
 */
function app_path() {
    return path('app');
}

/**
 * Get config path
 *
 * @return mixed
 */
function config_path() {
    return path('config');
}

/**
 * Get public path .
 *
 * @return mixed
 */
function public_path() {
    return path('public');
}

/**
 * Get public path .
 *
 * @return mixed
 */
function assets_path() {
    return path('assets');
}


/**
 * Return env by key .
 *
 * @param $key
 * @param null $default
 * @return null|string
 */
function env($key, $default = null) {
    return getenv($key) ?? $default;
}

/**
 * Load config file .
 *
 * @param $filename
 * @return mixed
 */
function load_config($filename) {
    if( file_exists(config_path() . DIRECTORY_SEPARATOR . $filename) )
        return include config_path() . DIRECTORY_SEPARATOR . $filename;
}

/**
 * Adding path for route generator .
 *
 * @param $route
 * @param array $params
 * @return mixed
 */
function pathFor($route, array $params = array()) {
    return ioc('router')
        ->pathFor($route, $params);
}


/**
 * Get service instance ..
 *
 * @param $class
 * @return mixed
 */
function service($class) {
    static $services = [];

    if( ! isset($services[$class]) )
        $services[$class] = (new $class);

    return $services[$class];
}


/**
 * Check if cli mode .
 *
 * @return bool
 */
function is_cli_mode() {
    return php_sapi_name() == 'cli';
}

/**
 * Write cli success message .
 *
 * @param $message
 * @return mixed
 */
function cli_write_success($message) {
    $climate = ioc('formatter');

    return $climate->comment($message);
}

/**
 * Write cli info message .
 *
 * @param $message
 * @return mixed
 */
function cli_write_info($message) {
    $climate = ioc('formatter');

    return $climate->info($message);
}

/**
 * Write cli error message .
 *
 * @param $message
 * @return mixed
 */
function cli_write_error($message) {
    $climate = ioc('formatter');

    return $climate->to('error')->red($message);
}


/**
 * Validate data .
 *
 * @param array $data
 * @param array $rules
 * @return \azi\Validator
 */
function validate(array $data, array $rules = array()) {
    $validator = new azi\Validator();

    return $validator->validate($data, $rules);
}