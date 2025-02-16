<?php

namespace ContainerTrfVUyD;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_AVKDDNUService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aVKDDNU' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aVKDDNU'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'api_platform.doctrine.orm.links_handler' => ['privates', 'api_platform.doctrine.orm.links_handler', 'getApiPlatform_Doctrine_Orm_LinksHandlerService', true],
        ], [
            'api_platform.doctrine.orm.links_handler' => 'ApiPlatform\\Doctrine\\Orm\\State\\LinksHandler',
        ]);
    }
}
