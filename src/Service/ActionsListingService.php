<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Service;

use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\Contract\CorePolicyGuard;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Service\Service;

#[Service]
class ActionsListingService
{

    public function __construct(
        private ActionRepository $rActionLog,
        private ?CorePolicyGuard $policyGuard,
    ) {
    }


    public function list(array $filters, PaginationRequestDTO $paginationRequest): PaginationResultDTO
    {
        $this->policyGuard?->check('list', $this->rActionLog);
        return $this->rActionLog->getPaginated($filters, $paginationRequest);
    }
}
