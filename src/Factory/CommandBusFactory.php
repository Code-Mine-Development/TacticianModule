<?php
namespace TacticianModule\Factory;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;
use League\Tactician\Middleware;
use Zend\ServiceManager\Factory\FactoryInterface;

class CommandBusFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $configMiddleware = $container->get('config')['tactician']['middleware'];

        arsort($configMiddleware);

        $list = [];
        foreach (array_keys($configMiddleware) as $serviceName) {
            /** @var Middleware $middleware */
            $list[] = $container->get($serviceName);
        }

        return new CommandBus($list);
    }

}
