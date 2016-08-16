<?php

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\VideoHandler;
use Acard\FrontendBundle\Entity\Video;
use Acard\FrontendBundle\Form\VideoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class VideoController extends Controller
{
    public function listAction()
    {
        /** @var $videoHandler VideoHandler */
        $videoHandler = $this->getHandlerFactory()->createHandler('Video');

        return $this->render('AcardBackendBundle:Video:list.html.twig', array(
            'videos' => $videoHandler->getAllVideos()
        ));
    }

    public function editAction($id)
    {
        /** @var $videoHandler VideoHandler */
        $videoHandler = $this->getHandlerFactory()->createHandler('Video');

        $video = $videoHandler->getVideo($id);

        if (!$video) {
            return $this->redirect($this->generateUrl('acard_backend_video_index'));
        }

        /** @var $request Request */
        $request = $this->get('request');
        $form = $this->createForm(new VideoType(), $video);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $videoHandler->persistVideo($form->getData());
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Link został zaktualizowany.');
                return $this->redirect($this->generateUrl('acard_backend_video_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }

        }

        return $this->render('AcardBackendBundle:Video:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        /** @var $videoHandler VideoHandler */
        $videoHandler = $this->getHandlerFactory()->createHandler('Video');

        $videoHandler->deleteVideo($id);

        $session = $this->get('session');
        $session->getFlashBag()->add('success', 'Link został usunięty');

        return $this->redirect($this->generateUrl('acard_backend_video_index'));
    }

    public function createAction()
    {
        /** @var $videoHandler VideoHandler */
        $videoHandler = $this->getHandlerFactory()->createHandler('Video');
        if (count($videoHandler->getAllVideos()) > 1) {
            /** @var $session Session */
            $session = $this->get('session');
            $session->getFlashBag()->add('error', 'Możesz mieć maksymalnie 2 filmy w jednym momencie.');
            return $this->redirect($this->generateUrl('acard_backend_video_index'));
        }

        /** @var $request Request */
        $request = $this->get('request');
        $form = $this->createForm(new VideoType(), $video = new Video());
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                $videoHandler->persistVideo($form->getData());
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Link został dodany');
                return $this->redirect($this->generateUrl('acard_backend_video_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:Video:create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
