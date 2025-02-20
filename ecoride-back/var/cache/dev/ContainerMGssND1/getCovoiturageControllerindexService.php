<?php

namespace ContainerMGssND1;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCovoiturageControllerindexService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.gcAlB65.App\Controller\CovoiturageController::index()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.gcAlB65.App\\Controller\\CovoiturageController::index()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'covoiturageRepository' => ['privates', 'App\\Repository\\CovoiturageRepository', 'getCovoiturageRepositoryService', true],
            'serializer' => ['privates', 'debug.serializer', 'getDebug_SerializerService', false],
        ], [
            'covoiturageRepository' => 'App\\Repository\\CovoiturageRepository',
            'serializer' => '?',
        ]))->withContext('App\\Controller\\CovoiturageController::index()', $container);
    }
}
