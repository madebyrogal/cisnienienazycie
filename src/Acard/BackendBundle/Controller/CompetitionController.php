<?php
namespace Acard\BackendBundle\Controller;

class CompetitionController extends Controller {

    public function indexAction() {
        $list = $this->getDoctrine()->getRepository('AcardFrontendBundle:CompetitionForm')->findAll();
        $view = array('list' => $list);
        return $this->render('AcardBackendBundle:Competition:index.html.twig', $view);
    }
    
    public function showAction($id) {
        $item = $this->getDoctrine()->getRepository('AcardFrontendBundle:CompetitionForm')->find($id);
        if(!$item){
            $this->redirect($this->generateUrl('acard_backend_competition_index'));
        }
        $view = array('item' => $item);
        return $this->render('AcardBackendBundle:Competition:show.html.twig', $view);
    }

    public function deleteAction($id) {
        $item = $this->getDoctrine()->getRepository('AcardFrontendBundle:CompetitionForm')->find($id);
        if(!$item){
            return $this->redirect($this->generateUrl('acard_backend_competition_index'));
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($item);
        $em->flush();
        return $this->redirect($this->generateUrl('acard_backend_competition_index'));
    }

}
