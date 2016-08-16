<?php
namespace Acard\FrontendBundle\Handler;

class PageHandler extends Handler
{
    public function getPageByName($pageName)
    {
        $page = $this->getDoctrine()->getRepository('AcardFrontendBundle:Page')->findOneBy(array(
            'url_title' => $pageName
        ));

        return $page;
    }
} 