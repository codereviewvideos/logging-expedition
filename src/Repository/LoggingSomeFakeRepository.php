<?php

declare(strict_types=1);

namespace App\Repository;

use Psr\Log\LoggerInterface;

final class LoggingSomeFakeRepository implements SomeRepositoryInterface
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
     * LoggingSomeFakeRepository constructor.
     *
     * @param SomeRepositoryInterface $someRepository
     * @param LoggerInterface         $logger
     */
    public function __construct(SomeRepositoryInterface $someRepository, LoggerInterface $logger)
    {
        $this->someRepository = $someRepository;
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

        $result = $this->someRepository->save($whatever);

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
