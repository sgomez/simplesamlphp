<?php

use SimpleSAML\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

if (! function_exists('ssp_container')) {
    /**
     * Get the available container instance.
     *
     * @return ContainerBuilder
     */
    function ssp_container()
    {
        return Container::getInstance();
    }
}

if (! function_exists('ssp_service')) {
    /**
     * Get the associated service.
     *
     * @param $name
     *
     * @return object
     *
     * @throws Exception
     */
    function ssp_service($name)
    {
        return ssp_container()->get($name);
    }
}

ssp_container()
    ->register('configuration', '\SimpleSAML\Configuration')
    ->setFactory(array('\SimpleSAML\Configuration', 'getInstance'))
;

ssp_container()
    ->register('memcache.servers.group', '\SimpleSAML\Component\Memcache\MemcacheServersGroup')
    ->setAutowired(true)
;

ssp_container()->compile();
