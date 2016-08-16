<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\EventHandler;
use Acard\FrontendBundle\Entity\Event;
use Acard\FrontendBundle\Form\EventType;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function listAction()
    {
        /** @var $eventHandler EventHandler */
        $eventHandler = $this->getHandlerFactory()->createHandler('Event');

        return $this->render('AcardBackendBundle:Event:list.html.twig', array(
            'events' => $eventHandler->getAllEvents()
        ));
    }

    public function editAction($id)
    {
        /** @var $request Request */
        $request = $this->get('request');

        /** @var $eventHandler EventHandler */
        $eventHandler = $this->getHandlerFactory()->createHandler('Event');

        /** @var $event Event */
        $event = $eventHandler->getEventById($id);

        if (!$event) {
            return $this->redirect($this->generateUrl('acard_backend_event_index'));
        }

        $form = $this->createForm(new EventType(), $event);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $event->setTimeDetails($_POST[$form->getName()]['time_details']);
                $eventHandler->persistEvent($event);
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:Event:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }


    public function deleteAction($id)
    {
        /** @var $eventHandler EventHandler */
        $eventHandler = $this->getHandlerFactory()->createHandler('Event');

        $eventHandler->deleteEventById($id);

        $session = $this->get('session');
        $session->getFlashBag()->add('success', 'Wydarzenie zostało usunięte');

        return $this->redirect($this->generateUrl('acard_backend_event_index'));
    }

    public function createAction()
    {
        /** @var $request Request */
        $request = $this->get('request');

        /** @var $eventHandler EventHandler */
        $eventHandler = $this->getHandlerFactory()->createHandler('Event');

        $event = new Event();
        $form = $this->createForm(new EventType(), $event);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $eventHandler->persistEvent($event);
                return $this->redirect($this->generateUrl('acard_backend_event_edit', array(
                    'id' => $event->getId()
                )));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:Event:create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
