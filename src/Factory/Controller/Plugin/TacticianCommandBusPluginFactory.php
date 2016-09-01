<?php
namespace TacticianModule\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use League\Tactician\CommandBus;
use TacticianModule\Controller\Plugin\TacticianCommandBusPlugin;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractPluginManager;

class TacticianCommandBusPluginFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {

        /** @var CommandBus $commandBus */
        $commandBus = $container->get(CommandBus::class);


        return new TacticianCommandBusPlugin($commandBus);
    }

}
