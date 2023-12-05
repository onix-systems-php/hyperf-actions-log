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

namespace OnixSystemsPHP\HyperfActionsLog\Resource;

use OnixSystemsPHP\HyperfActionsLog\Contract\UserResource;
use OnixSystemsPHP\HyperfActionsLog\Model\Action;
use OnixSystemsPHP\HyperfCore\Resource\AbstractResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'ResourceActionLog',
    properties: [
        new OA\Property(property: 'id', type: 'integer'),
        new OA\Property(property: 'user_id', type: 'integer'),
        new OA\Property(property: 'user', ref: '#/components/schemas/ResourceUser'),
        new OA\Property(property: 'action', type: 'string'),
        new OA\Property(property: 'foreign_id', type: 'string'),
        new OA\Property(property: 'foreign_table', type: 'string'),
        new OA\Property(property: 'data', type: 'array', items: new OA\Items(type: 'string')),
        new OA\Property(property: 'ip', type: 'string'),
        new OA\Property(property: 'user_agent', type: 'string'),
        new OA\Property(property: 'created_at', type: 'string'),
        new OA\Property(property: 'updated_at', type: 'string'),
    ],
    type: 'object',
)]
/**
 * @method __construct(Action $resource)
 * @property Action $resource
 */
class ResourceActionLog extends AbstractResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(): array
    {
        $this->resource->load('user');

        return [
            'id' => $this->resource->id,
            'user_id' => $this->resource->user_id,
            'user' => UserResource::make($this->resource->user),
            'action' => $this->resource->action,
            'foreign_id' => $this->resource->foreign_id,
            'foreign_table' => $this->resource->foreign_table,
            'data' => $this->resource->data,
            'ip' => $this->resource->ip,
            'user_agent' => $this->resource->user_agent,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
