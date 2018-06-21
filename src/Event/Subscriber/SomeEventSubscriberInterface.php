<?php

namespace App\Event\Subscriber;

use App\Event\SomeEvent;

interface SomeEventSubscriberInterface
{
    /**
     * @param SomeEvent $event
     *
     * @return mixed
     */
    public function onSomeEvent(SomeEvent $event);
}
