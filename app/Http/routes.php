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
});