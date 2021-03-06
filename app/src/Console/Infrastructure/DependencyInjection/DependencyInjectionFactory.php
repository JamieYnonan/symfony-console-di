<?php

namespace Console\Infrastructure\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class DependencyInjectionFactory
 * @package Console\Infrastructure\DependencyInjection
 */
class DependencyInjectionFactory
{
    public function build(): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__)
        );
        $loader->load('services.yaml');
        $container->compile();

        return $container;
    }
}
