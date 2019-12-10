<?php

namespace App\EventListeners;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Psr\Log\LoggerInterface;

class ExceptionListener
{
    protected $logger;

    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();

        if ($exception instanceof \App\Exceptions\JsonParseException)
        {
            $event->setResponse(new \App\Responses\ErrorJsonParseResponse());
        }
    }
}