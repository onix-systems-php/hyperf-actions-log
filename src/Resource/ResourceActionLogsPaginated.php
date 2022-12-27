<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Resource;

use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Resource\AbstractPaginatedResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ResourceActionLogsPaginated",
 *     type="object",
 *     @OA\Property(property="list", type="array", @OA\Items(ref="#/components/schemas/ResourceActionLog")),
 *     @OA\Property(property="total", type="integer"),
 *     @OA\Property(property="page", type="integer"),
 *     @OA\Property(property="per_page", type="integer"),
 *     @OA\Property(property="total_pages", type="integer"),
 * ),
 * @method __construct(PaginationResultDTO $resource)
 * @property PaginationResultDTO $resource
 */
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
