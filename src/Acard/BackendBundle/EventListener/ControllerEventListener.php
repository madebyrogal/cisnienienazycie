<?php

namespace Acard\BackendBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class ControllerEventListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController()[0];
        if (method_exists($controller, 'preExecute')) {
            $controller->preExecute();
        }
    }
}