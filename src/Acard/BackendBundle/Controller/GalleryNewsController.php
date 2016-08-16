<?php

namespace Acard\BackendBundle\Controller;

use Acard\FrontendBundle\Entity\GalleryNews;
use \Acard\FrontendBundle\Form\GalleryNewsType;
use Acard\BackendBundle\Utility\Thumb;

class GalleryNewsController extends Controller {

    public function indexAction($newsId) {
        $gallery = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:GalleryNews')->findByNewsId($newsId);
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->find($newsId);
        //echo "<pre>";var_dump($gallery);die;
        return $this->render('AcardBackendBundle:GalleryNews:index.html.twig', array('gallery' => $gallery, 'newsId' => $newsId, 'news' => $news ));
    }

    public function createAction($newsId) {
        /** @var $request Request */
        $request = $this->get('request');

        $gallery = new GalleryNews();
        
        $form = $this->createForm(new GalleryNewsType(), $gallery);
        $form->handleRequest($request);

        if ($request->isMethod('post')) {
            if ($form->isValid()) {
                /** @var $file UploadedFile */
                if ($file = $gallery->getFile()) {
                    //Upload pliku
                    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/gallery/';
                    $randomFileName = bin2hex(openssl_random_pseudo_bytes(8));
                    $fileName = $randomFileName . '.' . $file->getClientOriginalExtension();
                    //Zapis pliku głównego
                    $file->move($uploadDir, $fileName);
                    $fullPathFile = $uploadDir . $fileName;
                    //Tworzenie miniatury
                    //$fileName = Thumb::makeThumb($fullPathFile, $randomFileName , $uploadDir, 700, 1000, \Imagine\Image\ImageInterface::THUMBNAIL_INSET);
                    $fileTHName1 = Thumb::makeThumb($fullPathFile, $randomFileName . '_th_1', $uploadDir, 183, 122, \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND);
                    //Wstawienie nowych
                    $gallery->setFile($fileName);
                    $gallery->setFileThumb($fileTHName1);

                    $em = $this->getDoctrine()->getManager();
                    $gallery->setNewsId($newsId);
                    $em->persist($gallery);
                    $em->flush();
                    $session = $this->get('session');
                    $session->getFlashBag()->add('success', 'Obrazek został dodany');
                    return $this->redirect($this->generateUrl('acard_backend_gallery_news_index', array('newsId' => $newsId)));
                } else {
                    $session = $this->get('session');
                    $session->getFlashBag()->add('error', 'Musisz wybrać plik');
                }
            } else {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', 'Formularz zawiera błędy');
            }
        }

        return $this->render('AcardBackendBundle:GalleryNews:create.html.twig', array(
                    'form' => $form->createView(), 'newsId' => $newsId
        ));
    }

    public function deleteAction($id) {
        $gallery = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:GalleryNews')->find($id);
        $newsId = $gallery->getNewsId();
        if (!$gallery) {
            return $this->redirect($this->generateUrl('acard_backend_news_index'));
        } else {
            try {
                $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/gallery/';
                //Usunięcie plików
                $file = $gallery->getFile();
                $fileTH = $gallery->getFileThumb();
                if (file_exists( $uploadDir . $file)) {
                    unlink($uploadDir . $file);
                }
                if (file_exists($uploadDir . $fileTH)) {
                    unlink($uploadDir . $fileTH);
                }
                $em = $this->getDoctrine()->getManager();
                $em->remove($gallery);
                $em->flush();
            } catch (\Exception $e) {
                $session = $this->get('session');
                $session->getFlashBag()->add('error', $e->getMessage());
                return $this->redirect($this->generateUrl('acard_backend_news_index'));
            }

            $session = $this->get('session');
            $session->getFlashBag()->add('success', 'Element galerii został usunięty');
            return $this->redirect($this->generateUrl('acard_backend_gallery_news_index', array('newsId' => $newsId) ));
        }
    }

}
