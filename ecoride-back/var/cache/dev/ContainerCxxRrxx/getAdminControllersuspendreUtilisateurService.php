<?php

namespace ContainerCxxRrxx;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAdminControllersuspendreUtilisateurService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.EWAQaZu.App\Controller\AdminController::suspendreUtilisateur()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.EWAQaZu.App\\Controller\\AdminController::suspendreUtilisateur()'] = ($container->privates['.service_locator.EWAQaZu'] ?? $container->load('get_ServiceLocator_EWAQaZuService'))->withContext('App\\Controller\\AdminController::suspendreUtilisateur()', $container);
    }
}
