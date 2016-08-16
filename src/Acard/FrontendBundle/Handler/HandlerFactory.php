<?php

namespace Acard\FrontendBundle\Handler;

use Acard\FrontendBundle\Handler;
use Symfony\Component\DependencyInjection\Container;

class HandlerFactory
{
    /**
     * @var \Symfony\Component\DependencyInjection\Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param $handlerName
     *
     * @return Handler
     * @throws \InvalidArgumentException
     */
    public function createHandler($handlerName)
    {
        if (empty($handlerName)) {
            throw new \InvalidArgumentException;
        }
        $handlerClassWithNamespace = $this->getHandlerNamespace() . "\\{$handlerName}Handler";

        return new $handlerClassWithNamespace($this->container);
    }

    /**
     * @return string
     */
    protected function getHandlerNamespace()
    {
        return __NAMESPACE__;
    }
} 