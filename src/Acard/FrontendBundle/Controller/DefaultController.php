<?php

namespace Acard\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcardFrontendBundle:Default:list.html.twig', array('name' => $name));
    }
}
