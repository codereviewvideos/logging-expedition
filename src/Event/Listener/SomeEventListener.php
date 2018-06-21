<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\Events;
use App\Event\SomeEvent;
use App\Repository\SomeRepositoryInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class SomeEventListener implements EventSubscriberInterface
{
    /**
     * @var SomeRepositoryInterface
     */
    private $someRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(SomeRepositoryInterface $someRepository, LoggerInterface $logger)
    {
        $this->someRepository = $someRepository;
        $this->logger         = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::SOME_EVENT => 'onSomeEvent',
        ];
    }

    public function onSomeEvent(SomeEvent $event)
    {
        $this->logger->debug('onSomeEvent', ['payload' => $event->getSomePayload()]);

        $this->someRepository->save(
            $event->getSomePayload()
        );
    }
}
