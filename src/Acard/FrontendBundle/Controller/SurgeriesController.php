<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Entity\SurgeriesRepository;
use Symfony\Component\HttpFoundation\Request;

class SurgeriesController extends Controller {

    private $examinationCount = 0;

    public function preExecute() {
        $examinationCountElement = $this->getDoctrine()
                ->getRepository('AcardFrontendBundle:CustomField')
                ->findOneBy(array('name' => 'examination_count'));
        /** @var $examinationCountElement CustomField */
        if ($examinationCountElement) {
            $this->examinationCount = $examinationCountElement->getValue();
        }
    }
    
    public function searchAction(Request $request) {
        $cityId = $request->get('city');
        if($cityId > 0){
            $city = $this->getDoctrine()->getRepository('AcardFrontendBundle:City')->find($cityId);
            return $this->redirect( $this->generateUrl('acard_frontend_surgeries_show', array('city_id'=> $cityId, 'city' => $this->genSlug($city->getName()) ) ) );
        } else {
            return $this->redirect( $this->generateUrl('acard_frontend_page_view', array('pageUrl'=> 'konkurs' ) ) );
        }
    }

    public function showAction($city_id) {
        $surgeries = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:Surgeries')->findByCity($city_id);
        $cities = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:Surgeries')->findCities();
        $city = $this->getDoctrine()->getRepository('AcardFrontendBundle:City')->find($city_id);
        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');
        $page = $pageHandler->getPageByName('gabinety');
        return $this->render('AcardFrontendBundle:Surgeries:show.html.twig', array('cities' => $cities, 'city' => $city, 'surgeries' => $surgeries, 'page' => $page, 'examination_count' => $this->examinationCount));
    }

    public function cityAction() {
        $cities = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:Surgeries')->findCities();
        return $this->render('AcardFrontendBundle:Surgeries:city.html.twig', array('cities' => $cities));
    }
    
    private function genSlug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','ł','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}

}
