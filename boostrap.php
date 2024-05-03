<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = require_once CONFIG_PATH . '/container.php';

AppFactory::setContainer($container);

return AppFactory::create();
