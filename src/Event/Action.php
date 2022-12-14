<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Event;

use Hyperf\Database\Model\Model;

class Action
{
    public function __construct(
        public string $action,
        public ?Model $subject = null,
        public array $data = [],
        public ?Model $actor,
    ) {
    }
}
