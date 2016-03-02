<?php

require_once 'constants.php';

$config = require_once CONFIG_PATH . 'app.php';

$app = new \Slim\App;

foreach ($config['providers'] as $provider)
    $app->getContainer()->register(new $provider($app));

$app->run();