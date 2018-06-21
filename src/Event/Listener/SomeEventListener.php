<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\Events;
use App\Event\SomeEvent;
use App\Repository\SomeRepositoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class SomeEventListener implements EventSubscriberInterface
{
    /**
     * @var SomeRepositoryInterface
     */
    private $someRepository;

    /**
     * SomeEventListener constructor.
     *
     * @param SomeRepositoryInterface $someRepository
     */
    public function __construct(SomeRepositoryInterface $someRepository)
    {
        $this->someRepository = $someRepository;
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
        $this->someRepository->save(
            $event->getSomePayload()
        );
    }
}
