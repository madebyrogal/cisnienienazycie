<?php

namespace Acard\BackendBundle\Controller;

use Acard\FrontendBundle\Entity\News;
//use Acard\FrontendBundle\Entity\NewsRepository;
use Acard\FrontendBundle\Form\NewsType;
use Acard\BackendBundle\Utility\Thumb;

//use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller {

    public function indexAction() {
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->findAll();

        return $this->render('AcardBackendBundle:News:index.html.twig', array('news' => $news->getResult()));
    }

    public function createAction() {
        /** @var $request Request */
        $request = $this->get('request');

        $news = new News();
        $form = $this->createForm(new NewsType(), $news);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                /** @var $file UploadedFile */
                if ($file = $news->getFile()) {
                    //Upload pliku
                    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/news/';
                    $randomFileName = bin2hex(openssl_random_pseudo_bytes(8));
                    $fileName = $randomFileName . '.' . $file->getClientOriginalExtension();
                    //Zapis pliku głównego
                    $file->move($uploadDir, $fileName);
                    $fullPathFile = $uploadDir . $fileName;
                    //Tworzenie miniatury
                    $fileTHName1 = Thumb::makeThumb($fullPathFile, $randomFileName . '_th_1', $uploadDir, 300, 200, \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND);
                    $fileTHName2 = Thumb::makeThumb($fullPathFile, $randomFileName . '_th_2', $uploadDir, 580, 600, \Imagine\Image\ImageInterface::THUMBNAIL_INSET);
                    //Ustawienie flagi do usunięcia
                    $news->setFlagRedyToDel(true);
                    //Wstawienie nowych
                    $news->setFile($fileName);
                    $news->setFileThumb1($fileTHName1);
                    $news->setFileThumb2($fileTHName2);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($news);
                    $em->flush();
                    $session = $this->get('session');
                    $session->getFlashBag()->add('success', 'News został dodany');
                    return $this->redirect($this->generateUrl('acard_backend_news_index'));
                } else {
                    $session = $this->get('session');
                    $session->getFlashBag()->add('error', 'Musisz wybrać plik');
                }
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:News:edit.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function editAction($id) {
        /** @var $request Request */
        $request = $this->get('request');
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->find($id);
        if (!$news) {
            return $this->redirect($this->generateUrl('acard_backend_news_index'));
        }
        $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/news/';
        //Ustawienie starych plików do usunięcia
        $news->setFileToDel($uploadDir);

        $form = $this->createForm(new NewsType(), $news);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {

                //Jezeli jest plik
                if ($file = $news->getFile()) {
                    //Upload pliku

                    $randomFileName = bin2hex(openssl_random_pseudo_bytes(8));
                    $fileName = $randomFileName . '.' . $file->getClientOriginalExtension();
                    //Zapis pliku głównego
                    $file->move($uploadDir, $fileName);
                    $fullPathFile = $uploadDir . $fileName;
                    //Tworzenie miniatury
                    $fileTHName1 = Thumb::makeThumb($fullPathFile, $randomFileName . '_th_1', $uploadDir, 300, 200, \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND);
                    $fileTHName2 = Thumb::makeThumb($fullPathFile, $randomFileName . '_th_2', $uploadDir, 580, 600, \Imagine\Image\ImageInterface::THUMBNAIL_INSET);
                    //Ustawienie flagi do usunięcia
                    $news->setFlagRedyToDel(true);
                    //Wstawienie nowych
                    $news->setFile($fileName);
                    $news->setFileThumb1($fileTHName1);
                    $news->setFileThumb2($fileTHName2);
                }
                //Zapis
                $em = $this->getDoctrine()->getManager();
                $em->persist($news);
                $em->flush();
                //Usunięcie starych plikow jeżeli były zaznaczone
                $news->delSetedFile();
                $session = $this->get('session');
                $session->getFlashBag()->add('success', 'Zmiany zostały zapisane');
                return $this->redirect($this->generateUrl('acard_backend_news_index'));
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:News:edit.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function deleteAction($id) {
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->find($id);

        if (!$news) {
            return $this->redirect($this->generateUrl('acard_backend_news_index'));
        } else {
            try {
                $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/news/';
                //Usunięcie plików
                $news->setFileToDel($uploadDir);
                $news->setFlagRedyToDel(true);
                $news->delSetedFile();
                $em = $this->getDoctrine()->getManager();
                $em->remove($news);
                $em->flush();
            } catch (\Exception $e) {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', $e->getMessage());
                return $this->redirect($this->generateUrl('acard_backend_news_index'));
            }

            $session = $this->get('session');
            $session->getFlashBag()->add('success', 'Aktualność została usunięta');
            return $this->redirect($this->generateUrl('acard_backend_news_index'));
        }
    }

}
