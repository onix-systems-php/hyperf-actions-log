<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Repository;

use OnixSystemsPHP\HyperfActionsLog\Model\Action;
use OnixSystemsPHP\HyperfActionsLog\Model\Filter\ActionsFilter;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Model\Builder;
use OnixSystemsPHP\HyperfCore\Repository\AbstractRepository;

/**
 * @method Action create(array $data)
 * @method Action update(Action $model, array $data)
 * @method Action save(Action $model)
 * @method bool delete(Action $model)
 * @method ActionRepository|Builder finder(string $type, ...$parameters)
 * @method null|Action fetchOne(bool $lock, bool $force)
 */
class ActionRepository extends AbstractRepository
{
    protected string $modelClass = Action::class;

    public function getPaginated(
        array $filters,
        PaginationRequestDTO $paginationDTO,
        array $contain = []
    ): PaginationResultDTO {
        $query = $this->query()->filter(new ActionsFilter($filters));
        if (! empty($contain)) {
            $query->with($contain);
        }

        return $query->paginateDTO($paginationDTO);
    }

    public function getById(int $id, bool $lock = false, bool $force = false): ?Action
    {
        return $this->finder('id')->fetchOne($lock, $force);
    }

    public function scopeId(Builder $query, int $id): void
    {
        $query->where('id', '=', $id);
    }

    public function scopeUserId(Builder $query, int $id): void
    {
        $query->where('user_id', '=', $id);
    }

    public function scopeAction(Builder $query, string $action): void
    {
        $query->where('action', '=', $action);
    }
}
