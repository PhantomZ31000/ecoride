<?php

namespace ContainerFIr4xzJ;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiRegistrationControllerapiRegisterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.2JsKP_J.App\Controller\ApiRegistrationController::apiRegister()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.2JsKP_J.App\\Controller\\ApiRegistrationController::apiRegister()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'passwordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'passwordHasher' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]))->withContext('App\\Controller\\ApiRegistrationController::apiRegister()', $container);
    }
}
