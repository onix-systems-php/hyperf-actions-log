<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace OnixSystemsPHP\HyperfActionsLog\Service;

use Hyperf\DbConnection\Annotation\Transactional;
use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\Service\Service;

#[Service]
class ActionLogsOptionsService
{
    public function __construct(
        private ActionRepository $rAction,
    ) {}

    #[Transactional(attempts: 1)]
    public function run(): array
    {
        return $this->rAction->query()
            ->distinct()
            ->pluck('action')
            ->all();
    }
}
