<?php

declare(strict_types=1);
namespace OnixSystemsPHP\HyperfActionsLog\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use OnixSystemsPHP\HyperfActionsLog\Resource\ResourceActionLogsPaginated;
use OnixSystemsPHP\HyperfActionsLog\Service\ActionsListingService;
use OnixSystemsPHP\HyperfCore\Controller\AbstractController;
use OnixSystemsPHP\HyperfCore\DTO\Common\PaginationRequestDTO;
use OpenApi\Attributes as OA;

class ActionLogsController extends AbstractController
{
    #[OA\Get(
        path: '/v1/admin/action_logs',
        operationId: 'appAdminActionLogs',
        summary: 'Get list of action logs',
        security: [['bearerAuth' => []]],
        tags: ['action_logs'],
        parameters: [
            new OA\Parameter(ref: '#/components/parameters/Locale'),
            new OA\Parameter(ref: '#/components/parameters/Pagination_page'),
            new OA\Parameter(ref: '#/components/parameters/Pagination_per_page'),
            new OA\Parameter(ref: '#/components/parameters/Pagination_order'),
            new OA\Parameter(ref: '#/components/parameters/ActionsFilter__action'),
        ],
        responses: [
            new OA\Response(response: 200, description: '', content: new OA\JsonContent(properties: [
                new OA\Property(property: 'status', type: 'string'),
                new OA\Property(property: 'data', ref: '#/components/schemas/ResourceActionLogsPaginated'),
            ])),
            new OA\Response(response: 401, ref: '#/components/responses/401'),
            new OA\Response(response: 500, ref: '#/components/responses/500'),
        ],
    )]
    public function index(RequestInterface $request, ActionsListingService $service): ResourceActionLogsPaginated
    {
        return ResourceActionLogsPaginated::make(
            $service->list($request->getQueryParams(), PaginationRequestDTO::make($request))
        );
    }
}
