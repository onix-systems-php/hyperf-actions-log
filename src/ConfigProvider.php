<?php

declare(strict_types=1);
/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace OnixSystemsPHP\HyperfActionsLog;

use App\User\Resource\ResourceUser;
use OnixSystemsPHP\HyperfActionsLog\Contract\UserResource;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                UserResource::class => ResourceUser::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'listeners' => [
                \OnixSystemsPHP\HyperfActionsLog\Listener\ActionListener::class,
            ],
            'publish' => [
                [
                    'id' => 'migration',
                    'description' => 'The addition for migration from onix-systems-php/hyperf-actions-log.',
                    'source' => __DIR__ . '/../publish/migrations/2022_04_04_200047_actions.php',
                    'destination' => BASE_PATH . '/migrations/2022_04_04_200047_actions.php',
                ],
                [
                    'id' => 'migration_ip',
                    'description' => 'The addition for migration from onix-systems-php/hyperf-actions-log.',
                    'source' => __DIR__ . '/../publish/migrations/2022_09_13_114736_add_ip_and_agent_to_actions_table.php',
                    'destination' => BASE_PATH . '/migrations/2022_09_13_114736_add_ip_and_agent_to_actions_table.php',
                ],
            ],
        ];
    }
}
