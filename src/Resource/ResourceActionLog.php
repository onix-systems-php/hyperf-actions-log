<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Resource;

use App\Resource\User\ResourceUser;
use OnixSystemsPHP\HyperfActionsLog\Model\Action;
use OnixSystemsPHP\HyperfCore\Resource\AbstractResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ResourceActionLog",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="user_id", type="integer"),
 *     @OA\Property(property="user", ref="#/components/schemas/ResourceUser"),
 *     @OA\Property(property="action", type="string"),
 *     @OA\Property(property="foreign_id", type="string"),
 *     @OA\Property(property="foreign_table", type="string"),
 *     @OA\Property(property="data", type="array", @OA\Items(type="string")),
 *     @OA\Property(property="ip", type="string"),
 *     @OA\Property(property="user_agent", type="string"),
 *     @OA\Property(property="created_at", type="string"),
 *     @OA\Property(property="updated_at", type="string"),
 * )
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
            'user' => ResourceUser::make($this->resource->user),
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
