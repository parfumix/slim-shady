<?php

/**
 * App function .
 *
 * @param null $key
 * @param null $value
 * @return mixed
 */
function ioc($key = null, $value = null) {
    $app = App\App::getInstance();

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
 * @return \App\App
 */
function app($method = null) {
    if(! is_null($method))
        return App\App::getInstance()->{$method}();

    return App\App::getInstance();
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

