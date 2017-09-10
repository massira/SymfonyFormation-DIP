<?php

namespace DIP\Formation\Extension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AcmeDemoExtension
 *
 * @package DI\Formation\Extension
 */
class AcmeDemoExtension implements ExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        //Extension load method executed only when the container is compiled.
        //The extension should be registered and loaded in the container

        //$configs array contain an array for each file loaded that contain extension config
        $foo = $configs[0]['foo'];
        $bar = $configs[0]['bar'];

        $ymlFileLoader = new YamlFileLoader($container, new FileLocator([__DIR__.'/../Resources/Config']));
        $ymlFileLoader->load(__DIR__.'/../Resources/Config/services.yml');
    }

    /**
     * @inheritdoc
     */
    public function getXsdValidationBasePath()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getNamespace()
    {
        return 'http://www.example.com/symfony/schema/';
    }

    /**
     * @inheritdoc
     */
    public function getAlias()
    {
        return 'acme_demo';
    }
}