<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use OnixSystemsPHP\HyperfActionsLog\Resource\ResourceActionLogsPaginated;
use OnixSystemsPHP\HyperfActionsLog\Service\ActionsListingService;
use OnixSystemsPHP\HyperfCore\Controller\AbstractController;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OpenApi\Annotations as OA;

class ActionLogsController extends AbstractController
{
    /**
     * @OA\Get(
     *     path="/v1/admin/action_logs",
     *     summary="Get list of action logs",
     *     operationId="appAdminActionLogs",
     *     tags={"action_logs"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(ref="#/components/parameters/Locale"),
     *     @OA\Parameter(ref="#/components/parameters/Pagination_page"),
     *     @OA\Parameter(ref="#/components/parameters/Pagination_per_page"),
     *     @OA\Parameter(ref="#/components/parameters/Pagination_order"),
     *     @OA\Parameter(ref="#/components/parameters/ActionsFilter__action"),
     *     @OA\Response(response=200, description="", @OA\JsonContent(
     *         @OA\Property(property="status", type="string"),
     *         @OA\Property(property="data", ref="#/components/schemas/ResourceActionLogsPaginated"),
     *     )),
     *     @OA\Response(response=401, ref="#/components/responses/401"),
     *     @OA\Response(response=500, ref="#/components/responses/500"),
     * )
     */
    public function index(RequestInterface $request, ActionsListingService $service): ResourceActionLogsPaginated
    {
        return ResourceActionLogsPaginated::make(
            $service->list($request->getQueryParams(), PaginationRequestDTO::make($request))
        );
    }
}
