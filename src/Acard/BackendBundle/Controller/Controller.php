<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/18/14
 * Time: 7:55 PM
 */

namespace Acard\BackendBundle\Controller;

use Acard\BackendBundle\Handler\HandlerFactory;

class Controller extends \Symfony\Bundle\FrameworkBundle\Controller\Controller
{
    protected $handlerFactory;

    /**
     * @return HandlerFactory
     */
    public function getHandlerFactory()
    {
        if (!$this->handlerFactory) {
            $this->handlerFactory = new HandlerFactory($this->container);
        }
        return $this->handlerFactory;
    }
} 