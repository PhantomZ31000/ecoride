<?php

namespace ContainerPZraOjX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_ParameterService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.parameter' shared service.
     *
     * @return \ApiPlatform\State\Provider\ParameterProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Util'.\DIRECTORY_SEPARATOR.'ParameterParserTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'state'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'ParameterProvider.php';

        return $container->privates['api_platform.state_provider.parameter'] = new \ApiPlatform\State\Provider\ParameterProvider(($container->services['api_platform.state_provider.parameter_validator'] ?? $container->load('getApiPlatform_StateProvider_ParameterValidatorService')), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'api_platform.serializer.filter_parameter_provider' => ['privates', 'api_platform.serializer.filter_parameter_provider', 'getApiPlatform_Serializer_FilterParameterProviderService', true],
        ], [
            'api_platform.serializer.filter_parameter_provider' => 'ApiPlatform\\Serializer\\Parameter\\SerializerFilterParameterProvider',
        ]));
    }
}
