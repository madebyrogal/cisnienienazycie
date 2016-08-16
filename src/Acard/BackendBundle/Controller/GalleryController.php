<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\GalleryHandler;
use Acard\FrontendBundle\Entity\GalleryElement;
use Acard\FrontendBundle\Form\GalleryElementType;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    public function listAction()
    {
        /** @var $galleryHandler GalleryHandler */
        $galleryHandler = $this->getHandlerFactory()->createHandler('Gallery');

        return $this->render('AcardBackendBundle:Gallery:list.html.twig', array(
            'galleryElements' => $galleryHandler->getAllGalleryElements()
        ));
    }

    public function deleteAction($id)
    {
        /** @var $galleryHandler GalleryHandler */
        $galleryHandler = $this->getHandlerFactory()->createHandler('Gallery');

        $galleryHandler->deleteGalleryElement($id);

        $session = $this->get('session');
        $session->getFlashBag()->add('success', 'Element galerii został usunięty');

        return $this->redirect($this->generateUrl('acard_backend_gallery_index'));
    }

    public function createAction()
    {
        $galleryElement = new GalleryElement();
        $form = $this->createForm(new GalleryElementType(), $galleryElement);

        /** @var $request Request */
        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                /** @var $galleryHandler GalleryHandler */
                $galleryHandler = $this->getHandlerFactory()->createHandler('Gallery');
                $galleryHandler->persistGalleryElement($galleryElement);
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
                return $this->redirect($this->generateUrl('acard_backend_gallery_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:Gallery:create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
