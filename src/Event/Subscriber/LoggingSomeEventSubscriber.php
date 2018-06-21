<?php

declare(strict_types=1);

namespace App\Event\Subscriber;

use App\Event\Events;
use App\Event\SomeEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class LoggingSomeEventSubscriber implements SomeEventSubscriberInterface, EventSubscriberInterface
{
    /**
     * @var SomeEventSubscriberInterface
     */
    private $someEventListener;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Logging constructor.
     *
     * @param SomeEventSubscriberInterface $someEventListener
     * @param LoggerInterface              $logger
     */
    public function __construct(SomeEventSubscriberInterface $someEventListener, LoggerInterface $logger)
    {
        $this->someEventListener = $someEventListener;
        $this->logger            = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            Events::SOME_EVENT => 'onSomeEvent',
        ];
    }

    /**
     * @param SomeEvent $event
     */
    public function onSomeEvent(SomeEvent $event)
    {
        $this->logger->debug('onSomeEvent', ['payload' => $event->getSomePayload()]);

        $this->someEventListener->onSomeEvent($event);
    }
}
