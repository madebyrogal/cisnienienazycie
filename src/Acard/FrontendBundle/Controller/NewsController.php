<?php

namespace Acard\FrontendBundle\Controller;

class NewsController extends Controller {

    public function preExecute() {

        $examinationCountElement = $this->getDoctrine()
                ->getRepository('AcardFrontendBundle:CustomField')
                ->findOneBy(array('name' => 'examination_count'));
        /** @var $examinationCountElement CustomField */
        if ($examinationCountElement) {
            $this->examinationCount = $examinationCountElement->getValue();
        }
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');
        $this->page = $pageHandler->getPageByName('aktualnosci');
    }

    public function indexAction() {
        $request = $this->getRequest();
        $currentPage = $request->get('page', 1);
        $limit = 4;
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->findAllVisibleForPagging($currentPage, $limit);
        $maxPages = ceil($news->count() / $limit);
        $thisPage = $currentPage;
        return $this->render('AcardFrontendBundle:News:index.html.twig', array('news' => $news, 'maxPages' => $maxPages, 'thisPage' => $thisPage, 'page' => $this->page, 'examination_count' => $this->examinationCount));
    }

    public function showAction($id) {
        $news = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:News')->find($id);
        $gallery = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:GalleryNews')->findByNewsId($id);
        return $this->render('AcardFrontendBundle:News:show.html.twig', array('news' => $news, 'page' => $this->page, 'examination_count' => $this->examinationCount, 'gallery' => $gallery));
    }

}
