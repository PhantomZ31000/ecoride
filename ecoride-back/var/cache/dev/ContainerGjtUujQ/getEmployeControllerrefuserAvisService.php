<?php

namespace ContainerGjtUujQ;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEmployeControllerrefuserAvisService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.i.fVVTo.App\Controller\EmployeController::refuserAvis()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.i.fVVTo.App\\Controller\\EmployeController::refuserAvis()'] = ($container->privates['.service_locator.i.fVVTo'] ?? $container->load('get_ServiceLocator_I_FVVToService'))->withContext('App\\Controller\\EmployeController::refuserAvis()', $container);
    }
}
