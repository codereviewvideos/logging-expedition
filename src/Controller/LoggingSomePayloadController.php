<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

final class LoggingSomePayloadController extends Controller
{
    // this just doesn't work
    // time for a rethink

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var Controller
     */
    private $controller;

    /**
     * SomePayloadController constructor.
     *
     * @param SomePayloadController $controller
     * @param LoggerInterface       $logger
     */
    public function __construct(SomePayloadController $controller, LoggerInterface $logger)
    {
        $this->logger     = $logger;
        $this->controller = $controller;
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

        return $this->controller->index($placeholder);
    }
}
