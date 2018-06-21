<?php

declare(strict_types=1);

namespace App\Event;

use Symfony\Component\EventDispatcher\Event;

final class SomeEvent extends Event
{
    /**
     * @var string
     */
    private $somePayload;

    /**
     * SomeEvent constructor.
     *
     * @param string $somePayload
     */
    public function __construct(string $somePayload)
    {
        $this->somePayload = $somePayload;
    }

    /**
     * @return string
     */
    public function getSomePayload(): string
    {
        return $this->somePayload;
    }
}
