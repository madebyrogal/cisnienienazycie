<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/18/14
 * Time: 8:00 PM
 */

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\Page;

class PageHandler extends Handler
{
    public function getAllPages()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Page')->findAll();
    }

    public function getPage($id)
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Page')->find($id);
    }

    public function persistPage(Page $page)
    {
        $this->getDoctrine()->getManager()->persist($page);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 