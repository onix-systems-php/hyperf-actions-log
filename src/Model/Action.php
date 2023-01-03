<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Model;

use Carbon\Carbon;
use OnixSystemsPHP\HyperfCore\Model\AbstractOwnedModel;

/**
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property string $foreign_id
 * @property string $foreign_table
 * @property string $data
 * @property string $ip
 * @property string $user_agent
 * @property ?User $user
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Action extends AbstractOwnedModel
{
    protected ?string $table = 'actions';

    protected array $guarded = [];

    protected array $hidden = [];

    protected array $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'action' => 'string',
        'foreign_id' => 'string',
        'foreign_table' => 'string',
        'ip' => 'string',
        'user_agent' => 'string',
        'data' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
