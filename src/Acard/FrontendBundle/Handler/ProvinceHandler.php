<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/14/14
 * Time: 10:26 PM
 */

namespace Acard\FrontendBundle\Handler;

class ProvinceHandler extends Handler
{
    /**
     * @return array
     */
    public function getProvinces()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:Province')->findAll();
    }
} 