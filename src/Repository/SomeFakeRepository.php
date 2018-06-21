<?php

declare(strict_types=1);

namespace App\Repository;

use Psr\Log\LoggerInterface;

final class SomeFakeRepository implements SomeRepositoryInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SomeFakeRepository constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param mixed ...$whatever
     *
     * @return bool
     * @throws \Exception
     */
    public function save(...$whatever): bool
    {
        $this->logger->emergency('PRE SAVE', ['whatever' => $whatever]);

        sleep(1); // do some hard work

        $result = (bool)random_int(0, 1);

        $this->logger->critical(
            'POST SAVE',
            [
                'whatever' => $whatever,
                'result'   => $result,
            ]
        );

        return $result;
    }
}
