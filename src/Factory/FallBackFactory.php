<?php
/**
 * Created by PhpStorm.
 * User: radek
 * Date: 01.09.16
 * Time: 14:04
 */

namespace TacticianModule\Factory;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FallBackFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        return new $requestedName();
    }


}