<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\CustomFieldHandler;
use Acard\FrontendBundle\Form\CustomFieldType;
use Symfony\Component\HttpFoundation\Request;

class CustomFieldController extends Controller
{
    public function listAction()
    {
        /** @var $customFieldHandler CustomFieldHandler */
        $customFieldHandler = $this->getHandlerFactory()->createHandler('CustomField');

        return $this->render('AcardBackendBundle:CustomField:list.html.twig', array(
            'customFields' => $customFieldHandler->getAllCustomFields()
        ));
    }

    public function editAction($id)
    {
        /** @var $customFieldHandler CustomFieldHandler */
        $customFieldHandler = $this->getHandlerFactory()->createHandler('CustomField');

        $customField = $customFieldHandler->getCustomField($id);

        if (!$customField) {
            return $this->redirect($this->generateUrl('acard_backend_index'));
        }

        $form = $this->createForm(new CustomFieldType(), $customField);

        /** @var $request Request */
        $request = $this->get('request');
        $form->handleRequest($request);
        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $customFieldHandler->updateCustomField($form->getData());
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
                return $this->redirect($this->generateUrl('acard_backend_custom_field_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:CustomField:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
