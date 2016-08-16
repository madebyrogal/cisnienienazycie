<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/18/14
 * Time: 8:00 PM
 */

namespace Acard\BackendBundle\Handler;


abstract class Handler extends \Acard\FrontendBundle\Handler\Handler
{
    protected function getUploadDir()
    {
        return $this->container->get('kernel')->getRootDir() . '/../web/uploads/';
    }
} 