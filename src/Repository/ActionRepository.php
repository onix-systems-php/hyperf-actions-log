<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Repository;

use Hyperf\Database\Model\Builder;
use OnixSystemsPHP\HyperfActionsLog\Model\Action;
use OnixSystemsPHP\HyperfActionsLog\Model\Filter\ActionsFilter;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Repository\AbstractRepository;

/**
 * @method Action create(array $data)
 * @method Action update(Action $model, array $data)
 * @method Action save(Action $model)
 * @method bool delete(Action $model)
 */
class ActionRepository extends AbstractRepository
{
    protected string $modelClass = Action::class;

    public function getPaginated(array $filters, PaginationRequestDTO $paginationDTO): PaginationResultDTO
    {
        return $this->paginate($this->filter(new ActionsFilter($filters)), $paginationDTO);
    }

    //-----

    public function getById(int $id, bool $lock = false, bool $force = false): ?Action
    {
        return $this->fetchOne($this->queryById($id), $lock, $force);
    }
    public function queryById(int $id): Builder
    {
        return $this->query()->where('id', $id);
    }

    //-----

    protected function fetchOne(Builder $builder, bool $lock, bool $force): ?Action
    {
        /** @var ?Action $result */
        $result = parent::fetchOne($builder, $lock, $force);
        return $result;
    }
}
