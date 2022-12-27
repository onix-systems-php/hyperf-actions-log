<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Service;

use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationResultDTO;
use OnixSystemsPHP\HyperfCore\Service\Service;

#[Service]
class ActionsListingService
{

    public function __construct(
        private ActionRepository $rActionLog,
    ) {
    }


    public function list(array $filters, PaginationRequestDTO $paginationRequest): PaginationResultDTO
    {
        return $this->rActionLog->getPaginated($filters, $paginationRequest);
    }
}
