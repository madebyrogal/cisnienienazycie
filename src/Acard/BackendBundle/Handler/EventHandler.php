<?php

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\Event;

class EventHandler extends Handler
{
    public function getAllEvents()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->findAll();
    }

    public function getEventById($id)
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->find($id);
    }

    public function persistEvent(Event $event)
    {
        $this->getDoctrine()->getManager()->persist($event);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }

    public function deleteEventById($id)
    {
        $event = $this->getEventById($id);
        if (!$event) {
            return false;
        }
        $this->getDoctrine()->getManager()->remove($event);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 