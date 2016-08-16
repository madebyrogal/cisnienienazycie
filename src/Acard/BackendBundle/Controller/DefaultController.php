<?php

namespace Acard\BackendBundle\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcardBackendBundle:Default:list.html.twig', array('name' => $name));
    }
}
