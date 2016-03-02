<?php

foreach (array('bootstrap', 'config', 'app', 'pubic') as $path) {
    $path_name = strtoupper($path . '_PATH');

    if(! defined($path_name))
        define($path_name, __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR);
}