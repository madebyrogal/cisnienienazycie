<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Entity\CustomField;
use Acard\FrontendBundle\Entity\Page;
use Acard\FrontendBundle\Handler\CalendarHandler;
use Acard\FrontendBundle\Handler\PageHandler;
use Acard\FrontendBundle\Handler\ProvinceHandler;

class PageController extends Controller
{
    private $examinationCount = 0;

    public function preExecute()
    {
        $examinationCountElement = $this->getDoctrine()
            ->getRepository('AcardFrontendBundle:CustomField')
            ->findOneBy(array('name' => 'examination_count'));

        /** @var $examinationCountElement CustomField */
        if ($examinationCountElement) {
            $this->examinationCount = $examinationCountElement->getValue();
        }
    }
    
    public function viewAction($pageUrl)
    {
        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');
        /** @var $page Page */
        $page = $pageHandler->getPageByName($pageUrl);

        if (!$page) {
            throw $this->createNotFoundException("Podana strona nie istnieje");
        }

        $viewParams = array('page' => $page, 'examination_count' => $this->examinationCount);

        $pageName = $page->getName();
        if (!in_array($pageName, array('main', 'calendar'))) {
            if ($pageName === 'about') {
                return $this->render('AcardFrontendBundle:Page:view_page_with_gallery.html.twig', $viewParams);
            } else {
                return $this->render('AcardFrontendBundle:Page:view_page.html.twig', $viewParams);
            }
        } else {
            /** @var $calendarHandler CalendarHandler */
            $calendarHandler = $this->getHandlerFactory()->createHandler('Calendar');
            /** @var $provinceHandler ProvinceHandler */
            $provinceHandler = $this->getHandlerFactory()->createHandler('Province');
            $viewParams = array_merge($viewParams, array(

                'pastEvents' => $calendarHandler->fetchPastEvents(),
                'futureEvents' => $calendarHandler->fetchClosestFutureEvents(),
                'provinces' => $provinceHandler->getProvinces(),
            ));
            if ($pageName === 'main') {
                return $this->render('AcardFrontendBundle:Page:view_main.html.twig', $viewParams);
            } else {
                return $this->render('AcardFrontendBundle:Page:view_calendar.html.twig', $viewParams);
            }
        }
    }
}
