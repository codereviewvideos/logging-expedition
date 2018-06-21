<?php

declare(strict_types=1);

namespace App\Event\Subscriber;

use App\Event\Events;
use App\Event\SomeEvent;
use App\Repository\SomeRepositoryInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class SomeEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var SomeRepositoryInterface
     */
    private $someRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SomeEventSubscriber constructor.
     *
     * @param SomeRepositoryInterface $someRepository
     * @param LoggerInterface         $logger
     */
    public function __construct(SomeRepositoryInterface $someRepository, LoggerInterface $logger)
    {
        $this->someRepository = $someRepository;
        $this->logger         = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            Events::SOME_EVENT => 'onSomeEvent',
        ];
    }

    /**
     * @param SomeEvent $event
     */
    public function onSomeEvent(SomeEvent $event): void
    {
        $this->logger->debug('onSomeEvent', ['payload' => $event->getSomePayload()]);

        $this->someRepository->save(
            $event->getSomePayload()
        );
    }
}
