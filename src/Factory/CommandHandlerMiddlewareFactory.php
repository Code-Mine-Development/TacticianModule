<?php
namespace TacticianModule\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CommandHandlerMiddlewareFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $config = $container->get('config')['tactician'];

        /** @var CommandNameExtractor $extractor */
        $extractor = $container->get($config['default-extractor']);

        /** @var HandlerLocator $locator */
        $locator = $container->get($config['default-locator']);

        /** @var MethodNameInflector $inflector */
        $inflector = $container->get($config['default-inflector']);

        return new CommandHandlerMiddleware($extractor, $locator, $inflector);
    }


}
