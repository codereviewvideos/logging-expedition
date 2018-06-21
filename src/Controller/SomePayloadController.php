<?php

declare(strict_types=1);

namespace App\Controller;

use App\Event\Events;
use App\Event\SomeEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SomePayloadController extends Controller
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SomePayloadController constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, LoggerInterface $logger)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->logger          = $logger;
    }

    /**
     * @Route("/log-tester/{placeholder}", name="some_payload")
     * @param string $placeholder
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(string $placeholder = 'default')
    {
        if ($placeholder === 'default') {
            $this->logger->info('The placeholder was default');
        } else {
            $this->logger->notice('The placeholder was NOT default', ['placeholder' => $placeholder]);
        }

        $this->eventDispatcher->dispatch(
            Events::SOME_EVENT,
            new SomeEvent($placeholder)
        );

        return $this->json(
            [
                'message' => 'Welcome to your new controller!',
                'path'    => 'src/Controller/SomePayloadController.php',
            ]
        );
    }
}
