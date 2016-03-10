<?php

use App\Services\UserService;

$app = app();

$app->any('/', function (\Slim\Http\Request $request, $response, $args) {

});

$app->group('/u', function () {
    $this->get('/reset-password', function ($request, $response, $args) {

    })->setName('user-password-reset');

    $this->get('/login', function ($request, $response, $args) {
        return $response->write(view('user/login')->render());

    })->setName('user-login');

    $this->map(['GET', 'POST'], '/register', function ($request, $response) {
        if( $request->isGet() )
            return $response->write(view('user/register')->render());

        service(UserService::class)
            ->register(
                $request->getParams()
            );

        return $response->withRedirect(
            pathFor('user-register')
        );

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
        $this->map(['GET', 'POST'], '/upload', function ($request, $response, $args) {

            if( $request->isPost() ) {
                $file = $request->getUploadedFiles()['file'] ?? null;

                $local = ioc('flysystem')->getFilesystem('local');

                $local->writeStream(
                    $file->getClientFilename(),
                    $file->getStream()->stream
                );
//todo
                return $response->withRedirect('/a');
            }

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