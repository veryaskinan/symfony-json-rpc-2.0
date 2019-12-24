<?php

namespace App\Infrastructure\EventListeners;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    protected $logger;

    public function onKernelException(ExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();

        if ($exception instanceof \App\Exceptions\JsonParseException)
        {
            $event->setResponse(new \App\Responses\AppResponses\ErrorJsonParseResponse());
        }
    }
}