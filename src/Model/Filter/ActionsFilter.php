<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Model\Filter;

use OnixSystemsPHP\HyperfCore\Model\Filter\AbstractFilter;

class ActionsFilter extends AbstractFilter
{
    public function action(string $param): void
    {
        $this->builder->where('action', '=', $param);
    }
}
