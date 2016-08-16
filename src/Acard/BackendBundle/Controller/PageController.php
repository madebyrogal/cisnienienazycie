<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\PageHandler;
use Acard\FrontendBundle\Entity\Page;
use Acard\FrontendBundle\Form\PageType;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function listAction()
    {
        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');

        return $this->render('AcardBackendBundle:Page:list.html.twig', array('pages' => $pageHandler->getAllPages()));
    }

    public function editAction($id)
    {
        /** @var $request Request */
        $request = $this->get('request');

        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');

        /** @var $page Page */
        $page = $pageHandler->getPage($id);

        if (!$page) {
            return $this->redirect($this->generateUrl('acard_backend_page_index'));
        }

        $form = $this->createForm(new PageType(), $page);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if($form->isValid()) {
                $pageHandler->persistPage($page);
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
                return $this->redirect($this->generateUrl('acard_backend_page_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:Page:edit.html.twig', array(
            'form' => $form->createView()));
    }
}
