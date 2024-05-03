<?php

declare(strict_types=1);

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\FeedbackController;

return function(App $app) {
    $app->group('', function(RouteCollectorProxy $feedback) {  
        $feedback->get('/', [FeedbackController::class, 'index']);
        $feedback->get('/{id}', [FeedbackController::class, 'retrieve']);
    });
};