<?php

declare(strict_types=1);

namespace App\Controller;

use App\Event\Events;
use App\Event\SomeEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

final class SomePayloadController extends Controller
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * SomePayloadController constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
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
            // log something
        } else {
            // log something else
        }

        $this->eventDispatcher->dispatch(
            Events::SOME_EVENT,
            new SomeEvent($placeholder)
        );

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SomePayloadController.php',
        ]);
    }
}
