<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Event;

use Hyperf\Database\Model\Model;
use OnixSystemsPHP\HyperfCore\Contract\CoreAuthenticatable;

class Action
{
    public function __construct(
        public string $action,
        public Model|null $subject = null,
        public array $data = [],
        public CoreAuthenticatable|null $actor = null,
    ) {
    }
}
