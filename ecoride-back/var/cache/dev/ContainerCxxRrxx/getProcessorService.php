<?php

namespace ContainerCxxRrxx;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ApiPlatform\Symfony\Messenger\Processor' shared service.
     *
     * @return \ApiPlatform\Symfony\Messenger\Processor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Messenger'.\DIRECTORY_SEPARATOR.'DispatchTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Messenger'.\DIRECTORY_SEPARATOR.'Processor.php';

        return $container->privates['ApiPlatform\\Symfony\\Messenger\\Processor'] = new \ApiPlatform\Symfony\Messenger\Processor(($container->services['messenger.default_bus'] ?? self::getMessenger_DefaultBusService($container)));
    }
}
