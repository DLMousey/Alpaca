<?php

/**
 * Index file, Starts the application
 */

chdir(dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

$app = new Framework\Bootstrap\Bootstrapper();
$app->bootstrap();