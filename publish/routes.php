<?php

declare(strict_types=1);
use Hyperf\HttpServer\Router\Router;
use OnixSystemsPHP\HyperfActionsLog\Controller\ActionLogsController;

Router::addGroup('/v1/admin/action_logs', function () {
    Router::get('', [ActionLogsController::class, 'index']);
});
