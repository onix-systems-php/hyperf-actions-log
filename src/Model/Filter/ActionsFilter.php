<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Model\Filter;

use OnixSystemsPHP\HyperfCore\Model\Filter\AbstractFilter;
use OpenApi\Annotations as OA;

/**
 * @OA\Parameter(parameter="ActionsFilter__action", in="query", name="action", example="login", @OA\Schema(type="string"))
 * @OA\Parameter(parameter="ActionsFilter__user_id", in="query", name="action", example="1", @OA\Schema(type="integer"))
 */
class ActionsFilter extends AbstractFilter
{
    public function action(string $param): void
    {
        $this->builder->where('action', '=', $param);
    }

    public function userId(int $param): void
    {
        $this->builder->where('user_id', '=', $param);
    }
}
