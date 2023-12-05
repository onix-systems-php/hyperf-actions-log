<?php

declare(strict_types=1);
/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

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
     */
    public function toArray(): array
    {
        return [
            'actions' => $this->resource,
        ];
    }
}
