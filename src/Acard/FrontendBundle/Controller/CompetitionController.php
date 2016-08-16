<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Form\CompetitionFormType;
use Acard\FrontendBundle\Entity\CompetitionForm;
use Symfony\Component\HttpFoundation\Request;

class CompetitionController extends Controller {

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

    public function indexAction() {
        
        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');
        /** @var $page Page */
        $page = $pageHandler->getPageByName('formularz-konkursowy');
        if (!$page) {
            throw $this->createNotFoundException("Podana strona nie istnieje");
        }
        $competitionForm = new CompetitionForm();
        $form = $this->createForm(new CompetitionFormType(), $competitionForm, array(
            'action' => $this->generateUrl('acard_frontend_konkurs_index'),
            'method' => 'POST'
        ));
        //Pobranie requesta
        $request = Request::createFromGlobals();

        if($request->isMethod('POST')){
            $formValue = $request->get($form->getName());
            $formPost = $request->get('post');
            //Przypisanie 
            $formValue['postCode'] = $formPost[0] . $formPost[1] . '-' . $formPost[2] . $formPost[3] . $formPost[4];
            $form->handleRequest($request);
            if($form->isValid()){
                //Zapis do bazy
                $em = $this->getDoctrine()->getManager();
                $competitionForm->setFromArray($formValue);
                $em->persist($competitionForm);
                $em->flush();
                //Przekierowanie na stronę podziękowania
                return $this->redirect($this->generateUrl('acard_frontend_konkurs_send_form'));
            }
        }
        
        $viewParams = array('page' => $page, 'examination_count' => $this->examinationCount, 'form' => $form->createView());
        return $this->render('AcardFrontendBundle:Competition:index.html.twig', $viewParams);
    }

    public function sendFormAction() {
        /** @var $pageHandler PageHandler */
        $pageHandler = $this->getHandlerFactory()->createHandler('Page');
        /** @var $page Page */
        $page = $pageHandler->getPageByName('formularz-konkursowy-podziekowanie');
        if (!$page) {
            throw $this->createNotFoundException("Podana strona nie istnieje");
        }
        
        $viewParams = array('page' => $page, 'examination_count' => $this->examinationCount);
        return $this->render('AcardFrontendBundle:Competition:sendForm.html.twig', $viewParams);
    }

}
