<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Entity\Event;
use Acard\FrontendBundle\Handler\EventHandler;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{
    public function mapAction()
    {
        /** @var $eventHandler EventHandler */
        $eventHandler = $this->getHandlerFactory()->createHandler('Event');

        $activeEvents = array();

        /** @var $event Event */
        foreach ($eventHandler->getAllActiveEvents() as $event) {
            $activeEvents[] = array(
                0 => $event->getCity()->getLabel(),
                1 => $event->getLat(),
                2 => $event->getLng(),
                3 => $event->getCity()->getProvince()->getLabel(),
                4 => $event->getStartDate()->format('Y-m-d'),
                5 => $event->getPlace(),
                6 => $event->getAddress(),
                7 => nl2br($event->getTimeDetails()),
                8 => nl2br($event->getInfo())
            );
        }

        return new JsonResponse($activeEvents);
    }
}
