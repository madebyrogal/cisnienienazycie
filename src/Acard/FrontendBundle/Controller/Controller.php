<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 13.03.14
 * Time: 00:30
 */

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Handler\HandlerFactory;

class Controller extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    protected $handlerFactory;

    protected function getHandlerFactory()
    {
        if (!$this->handlerFactory) {
            $this->handlerFactory = new HandlerFactory($this->container);
        }

        return $this->handlerFactory;
    }
} 