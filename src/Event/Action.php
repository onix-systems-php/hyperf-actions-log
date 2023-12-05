<?php

declare(strict_types=1);
/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace OnixSystemsPHP\HyperfActionsLog\Event;

use Hyperf\Database\Model\Model;
use OnixSystemsPHP\HyperfCore\Contract\CoreAuthenticatable;

class Action
{
    public function __construct(
        public string $action,
        public null|Model $subject = null,
        public array $data = [],
        public null|CoreAuthenticatable $actor = null,
    ) {}
}
