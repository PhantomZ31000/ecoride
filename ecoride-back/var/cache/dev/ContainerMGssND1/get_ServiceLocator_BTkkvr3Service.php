<?php

namespace ContainerMGssND1;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_BTkkvr3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.BTkkvr3' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.BTkkvr3'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'passwordEncoder' => ['privates', '.errored.syF_FQm', NULL, 'Cannot determine controller argument for "App\\Controller\\RegistrationController::register()": the $passwordEncoder argument is type-hinted with the non-existent class or interface: "Symfony\\Component\\Security\\Core\\Encoder\\UserPasswordEncoderInterface".'],
        ], [
            'passwordEncoder' => '?',
        ]);
    }
}
