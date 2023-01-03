<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Model\Filter;

use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\Model\Filter\AbstractFilter;
use OpenApi\Attributes as OA;

/**
 * @property ActionRepository $repository
 */
#[OA\Parameter(parameter: 'ActionsFilter__action', name: 'action', in: 'query', schema: new OA\Schema(type: 'string'), example: 'login')]
#[OA\Parameter(parameter: 'ActionsFilter__user_id', name: 'user_id', in: 'query', schema: new OA\Schema(type: 'integer'), example: '1')]
class ActionsFilter extends AbstractFilter
{
    public function action(string $param): void
    {
        $this->repository->scopeAction($this->builder, $param);
    }

    public function userId(int $param): void
    {
        $this->repository->scopeUserId($this->builder, $param);
    }
}
