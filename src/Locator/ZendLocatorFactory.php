<?php

namespace TacticianModule\Locator;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ZendLocatorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        return new ZendLocator($container);
    }


}