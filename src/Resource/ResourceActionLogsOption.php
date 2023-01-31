<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Resource;

use OnixSystemsPHP\HyperfCore\Resource\AbstractResource;
use OpenApi\Attributes as OA;

/**
 * @method __construct(array $resource)
 * @property array $resource
 */
#[OA\Schema(
    schema: 'ResourceActionLogsOption',
    properties: [new OA\Property(property: 'actions', type: 'array', items: new OA\Items(type: 'string'))],
    type: 'object'
)]
class ResourceActionLogsOption extends AbstractResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'actions' => $this->resource,
        ];
    }
}
