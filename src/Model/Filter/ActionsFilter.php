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

namespace OnixSystemsPHP\HyperfActionsLog\Model\Filter;

use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\Model\Filter\AbstractFilter;
use OpenApi\Attributes as OA;

/**
 * @property ActionRepository $repository
 */
#[OA\Parameter(parameter: 'ActionsFilter__action', name: 'action', in: 'query', schema: new OA\Schema(type: 'string'), example: 'login')]
#[OA\Parameter(parameter: 'ActionsFilter__user_id', name: 'user_id', in: 'query', schema: new OA\Schema(type: 'integer'), example: '1')]
#[OA\Parameter(parameter: 'ActionsFilter__user_only', name: 'user_only', in: 'query', schema: new OA\Schema(type: 'boolean'), example: 'true')]
class ActionsFilter extends AbstractFilter
{
    public function action(string $param): void
    {
        $this->builder->finder('action', $param);
    }

    public function userId(int $param): void
    {
        $this->builder->finder('userId', $param);
    }

    public function userOnly(): void
    {
        $this->builder->finder('userOnly');
    }
}
