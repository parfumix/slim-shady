<?php

/*
|--------------------------------------------------------------------------
| Create new application
|--------------------------------------------------------------------------
| To create new application you have to create new instance of \App\App and pass to the arguments
|   config file directory .
|
*/
$app = new App\Kernel(
    require_once __DIR__ . '/../config/app.php'
);

$app->run();