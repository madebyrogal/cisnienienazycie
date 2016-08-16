<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/18/14
 * Time: 7:57 PM
 */

namespace Acard\BackendBundle\Handler;


class HandlerFactory extends \Acard\FrontendBundle\Handler\HandlerFactory
{
    protected function getHandlerNamespace()
    {
        return __NAMESPACE__;
    }

} 