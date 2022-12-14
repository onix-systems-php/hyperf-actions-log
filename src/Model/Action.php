<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Model;

use Carbon\Carbon;
use OnixSystemsPHP\HyperfCore\Model\AbstractModel;

/**
 * @property int $id
 * @property int $user_id
 * @property string $action
 * @property string $foreign_id
 * @property string $foreign_table
 * @property string $data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Action extends AbstractModel
{
    protected $table = 'actions';

    protected $guarded = [];

    protected $hidden = [];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'action' => 'string',
        'foreign_id' => 'string',
        'foreign_table' => 'string',
        'data' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
