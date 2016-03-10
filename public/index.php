<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$bench = (new Ubench);
$bench->start();

require_once '../bootstrap/app.php';

$bench->end();

echo '<script>console.log("Generated in '.$bench->getTime().'. Memory usage '.$bench->getMemoryUsage().'")</script>';