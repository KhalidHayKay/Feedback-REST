<?php

declare(strict_types=1);

use Slim\App;
use Slim\Middleware\BodyParsingMiddleware;

return function (App $app) {
    $app->add(BodyParsingMiddleware::class);
};