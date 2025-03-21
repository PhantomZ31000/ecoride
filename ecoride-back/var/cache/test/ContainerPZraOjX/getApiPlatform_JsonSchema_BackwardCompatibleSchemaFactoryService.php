<?php

namespace ContainerPZraOjX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_JsonSchema_BackwardCompatibleSchemaFactoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.json_schema.backward_compatible_schema_factory' shared service.
     *
     * @return \ApiPlatform\JsonSchema\BackwardCompatibleSchemaFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'json-schema'.\DIRECTORY_SEPARATOR.'SchemaFactoryInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'json-schema'.\DIRECTORY_SEPARATOR.'SchemaFactoryAwareInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'json-schema'.\DIRECTORY_SEPARATOR.'BackwardCompatibleSchemaFactory.php';

        $a = ($container->privates['api_platform.hydra.json_schema.schema_factory'] ?? $container->load('getApiPlatform_Hydra_JsonSchema_SchemaFactoryService'));

        if (isset($container->privates['api_platform.json_schema.backward_compatible_schema_factory'])) {
            return $container->privates['api_platform.json_schema.backward_compatible_schema_factory'];
        }

        return $container->privates['api_platform.json_schema.backward_compatible_schema_factory'] = new \ApiPlatform\JsonSchema\BackwardCompatibleSchemaFactory($a);
    }
}
