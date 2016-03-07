<?php

$app = app();

$app->get('/', function (\Slim\Http\Request $request, $response, $args) {

});

$app->group('/u', function () {
    $this->get('/reset-password', function ($request, $response, $args) {

    })->setName('user-password-reset');

    $this->get('/login', function ($request, $response, $args) {
        return $response->write(view('user/login')->render());

    })->setName('user-login');

    $this->get('/register', function ($request, $response, $args) {

    })->setName('user-register');

    /**
     * User dashboard .
     *
     */
    $this->group('/dashboard', function () {

        /**
         * Upload code .
         *
         */
        $this->get('/upload', function ($request, $response, $args) {
            return $response->write(
                view('dashboard/upload')->render()
            );

        })->setName('user-dashboard-upload');
    });

});

/*
|--------------------------------------------------------------------------
| Api routes v1.0
|--------------------------------------------------------------------------
*/
$app->group('/api', function () {
    $this->group('/v1.0', function () {

    });
});