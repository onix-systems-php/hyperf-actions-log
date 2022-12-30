<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
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
