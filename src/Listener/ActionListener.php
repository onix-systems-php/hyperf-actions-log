<?php
declare(strict_types=1);

namespace OnixSystemsPHP\HyperfActionsLog\Listener;

use OnixSystemsPHP\HyperfActionsLog\Event\Action;
use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Utils\ApplicationContext;

#[Listener]
class ActionListener implements ListenerInterface
{
    public function __construct(
        private ActionRepository $rAction
    ) {
    }

    public function listen(): array
    {
        return [
            Action::class,
        ];
    }

    /**
     * @param Action $event
     */
    public function process(object $event)
    {

        if ($event instanceof Action) {
            $clientData = $this->getClientData();
            $action = $this->rAction->create([
                'user_id' => $event->actor?->id,
                'action' => $event->action,
                'foreign_id' => $event->subject?->getKey(),
                'foreign_table' => $event->subject?->getTable(),
                'data' => $event->data,
                'ip' => $clientData['ip'],
                'user_agent' => $clientData['user_agent'],
            ]);
            $this->rAction->save($action);
        }
    }

    private function getClientData(): array
    {
        $request = ApplicationContext::getContainer()->get(RequestInterface::class);
        $headers = $request->getHeaders();

        if (isset($headers['x-forwarded-for'][0]) && !empty($headers['x-forwarded-for'][0])) {
            $ip = $headers['x-forwarded-for'][0];
        } elseif (isset($headers['x-real-ip'][0]) && !empty($headers['x-real-ip'][0])) {
            $ip = $headers['x-real-ip'][0];
        } else {
            $serverParams = $request->getServerParams();
            $ip = $serverParams['remote_addr'] ?? null;
        }

        $userAgent = isset($headers['user-agent'][0]) &&
        !empty($headers['user-agent'][0]) ? $headers['user-agent'][0] : null;

        return [
            'ip' => $ip,
            'user_agent' => $userAgent,
        ];
    }
}
