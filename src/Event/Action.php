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
