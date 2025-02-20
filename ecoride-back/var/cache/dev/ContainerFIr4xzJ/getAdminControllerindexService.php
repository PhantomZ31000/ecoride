<?php

namespace ContainerFIr4xzJ;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAdminControllerindexService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.OzEre6h.App\Controller\AdminController::index()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.OzEre6h.App\\Controller\\AdminController::index()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'userRepository' => 'App\\Repository\\UserRepository',
        ]))->withContext('App\\Controller\\AdminController::index()', $container);
    }
}
