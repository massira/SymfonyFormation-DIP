<?php

namespace DIP\Formation\Controller;


use DIP\Formation\Extension\AcmeDemo2Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class DIConfigExtensionController
 *
 * @package DIP\Formation\Controller
 */
class DIConfigExtensionController
{
    private $container;
    private $extension;

    const CONFIGS     = __DIR__.'/../Resources/Config';
    const CONFIG_FILE = __DIR__.'/../Resources/Config/extension_config_2.yml';

    /**
     * DIConfigExtensionController constructor.
     *
     * @param ContainerBuilder $container
     */
    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
        $this->extension = new AcmeDemo2Extension();
    }

    /**
     * Loads an extension into the container
     */
    public function loadExtension()
    {
        //Register the extension in the container
        $this->container->registerExtension($this->extension);

        $ymlLoader  = $this->getLoader();

        $ymlLoader->load(self::CONFIG_FILE);

        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();
    }

    /**
     * @return YamlFileLoader
     */
    public function getLoader()
    {
        //Create fileLocator instance
        $fileLocator = new FileLocator([self::CONFIGS]);

        //Return the loader
        return new YamlFileLoader($this->container, $fileLocator);
    }
}