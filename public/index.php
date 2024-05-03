<?php

declare(strict_types=1);

require_once __DIR__ . '/../configs/paths.php';

$app = require __DIR__ . '/../boostrap.php';
$route = require CONFIG_PATH . '/routes.php';
$middleware = require CONFIG_PATH . '/middleware.php';

$middleware($app);
$route($app);

$app->run();