<?php

declare(strict_types=1);
/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace OnixSystemsPHP\HyperfActionsLog\Listener;

use Hyperf\Context\ApplicationContext;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use OnixSystemsPHP\HyperfActionsLog\Event\Action;
use OnixSystemsPHP\HyperfActionsLog\Repository\ActionRepository;
use OnixSystemsPHP\HyperfCore\Contract\CoreAuthenticatableProvider;

class ActionListener implements ListenerInterface
{
    public function __construct(
        private ActionRepository $rAction,
        private CoreAuthenticatableProvider $authenticatableProvider,
    ) {}

    public function listen(): array
    {
        return [
            Action::class,
        ];
    }

    /**
     * @param Action $event
     */
    public function process(object $event): void
    {
        if ($event instanceof Action) {
            $clientData = $this->getClientData();
            $action = $this->rAction->create([
                'user_id' => $this->getUserId($event),
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

    protected function getUserId(Action $event): mixed
    {
        if (! empty($event->actor)) {
            return $event->actor->getId();
        }
        return $this->authenticatableProvider->user()?->getId();
    }

    private function getClientData(): array
    {
        try {
            $request = ApplicationContext::getContainer()->get(RequestInterface::class);
            $headers = $request->getHeaders();

            if (isset($headers['x-forwarded-for'][0]) && ! empty($headers['x-forwarded-for'][0])) {
                $ip = $headers['x-forwarded-for'][0];
            } elseif (isset($headers['x-real-ip'][0]) && ! empty($headers['x-real-ip'][0])) {
                $ip = $headers['x-real-ip'][0];
            } else {
                $serverParams = $request->getServerParams();
                $ip = $serverParams['remote_addr'] ?? null;
            }

            $userAgent = isset($headers['user-agent'][0]) && ! empty($headers['user-agent'][0])
                ? $headers['user-agent'][0] : null;
        } catch (\Throwable) {
            $ip = null;
            $userAgent = null;
        }

        return [
            'ip' => $ip,
            'user_agent' => $userAgent,
        ];
    }
}
