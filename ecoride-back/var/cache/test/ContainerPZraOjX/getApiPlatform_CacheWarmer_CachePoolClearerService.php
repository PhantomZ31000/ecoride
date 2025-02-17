<?php

namespace ContainerPZraOjX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_CacheWarmer_CachePoolClearerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.cache_warmer.cache_pool_clearer' shared service.
     *
     * @return \ApiPlatform\Symfony\Bundle\CacheWarmer\CachePoolClearerCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'http-kernel'.\DIRECTORY_SEPARATOR.'CacheWarmer'.\DIRECTORY_SEPARATOR.'CacheWarmerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'Bundle'.\DIRECTORY_SEPARATOR.'CacheWarmer'.\DIRECTORY_SEPARATOR.'CachePoolClearerCacheWarmer.php';

        return $container->privates['api_platform.cache_warmer.cache_pool_clearer'] = new \ApiPlatform\Symfony\Bundle\CacheWarmer\CachePoolClearerCacheWarmer(($container->services['cache.system_clearer'] ?? $container->load('getCache_SystemClearerService')), ['api_platform.cache.metadata.property', 'api_platform.cache.metadata.resource', 'api_platform.cache.metadata.resource_collection', 'api_platform.cache.route_name_resolver', 'api_platform.cache.identifiers_extractor', 'api_platform.elasticsearch.cache.metadata.document']);
    }
}
