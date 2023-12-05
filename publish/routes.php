<?php

declare(strict_types=1);
/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;
use OnixSystemsPHP\HyperfActionsLog\Controller\ActionLogsController;

Router::addGroup('/v1/admin/action_logs', function () {
    Router::get('', [ActionLogsController::class, 'index']);
    Router::get('/options', [ActionLogsController::class, 'options']);
});
