<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Resource;

use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Resource\AbstractPaginatedResource;
use OpenApi\Attributes as OA;

/**
 * @method __construct(PaginationResultDTO $resource)
 * @property PaginationResultDTO $resource
 */
#[OA\Schema(
    schema: 'ResourceActionLogsPaginated',
    properties: [
        new OA\Property(property: 'list', type: 'array', items: new OA\Items(ref: '#/components/schemas/ResourceActionLog')),
        new OA\Property(property: 'total', type: 'integer'),
        new OA\Property(property: 'page', type: 'integer'),
        new OA\Property(property: 'per_page', type: 'integer'),
        new OA\Property(property: 'total_pages', type: 'integer'),
    ],
    type: 'object'
)]
class ResourceActionLogsPaginated extends AbstractPaginatedResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(): array
    {
        $result = parent::toArray();
        $result['list'] = ResourceActionLog::collection($this->resource->list);

        return $result;
    }
}
