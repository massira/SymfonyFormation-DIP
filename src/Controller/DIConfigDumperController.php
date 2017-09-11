<?php

namespace DIP\Formation\Controller;

use DIP\Formation\Services\NewsletterManager;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\DumperInterface;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Dumper\YamlDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class DIConfigDumperController
 *
 * @package DIP\Formation\Controller
 */
class DIConfigDumperController
{
    const CACHE_PATH  = __DIR__.'/../../cache/container.php';
    const CONFIGS     = __DIR__.'/../Resources/Config';
    const CONFIG_FILE = __DIR__.'/../Resources/Config/services.yml';

    /**
     * Dumps the container into cache file
     *
     * @return string The cache path
     */
    public function dumpContainer()
    {
        if (!file_exists(self::CACHE_PATH)) {
            //Working with a fresh container
            $container = new ContainerBuilder();
            $ymlLoader = $this->getLoader($container);
            $ymlLoader->load(self::CONFIG_FILE);
            $container->compile();

            //Dumps the container after it was compiled
            //When the container is dumped the name of the class by default is 'ProjectServiceContainer'
            //we can change the name of the class by passing this array ['class' => 'CacheContainer']
            //to the dump method
            file_put_contents(self::CACHE_PATH, $this->getDumper($container)->dump());

            return self::CACHE_PATH;
        }

        return self::CACHE_PATH;
    }

    /**
     * Dumps the container and verifying the freshness
     * of the cache(Using config resources)
     *
     * @return string The cache path
     */
    public function dumpContainerWithConfigCache()
    {
        $configCache = new ConfigCache(self::CACHE_PATH, false);
        if (!$configCache->isFresh()) {
            //Working with a fresh container
            $container = new ContainerBuilder();
            $ymlLoader = $this->getLoader($container);
            $ymlLoader->load(self::CONFIG_FILE);
            $container->compile();
            $className = date('Y-m-d h:i:s').'MyCacheContainer';
            $configCache->write($this->getDumper($container)->dump(['class' => $className]), $container->getResources());

            return $configCache->getPath();
        }

        return $configCache->getPath();
    }

    /**
     * @param ContainerBuilder $container
     *
     * @return YamlFileLoader
     */
    private function getLoader(ContainerBuilder $container)
    {
        //Create fileLocator instance
        $fileLocator = new FileLocator([self::CONFIGS]);

        //Return the loader
        return new YamlFileLoader($container, $fileLocator);
    }

    /**
     * @param ContainerBuilder $container
     *
     * @return DumperInterface
     */
    private function getDumper(ContainerBuilder $container)
    {
        return new PhpDumper($container);
    }
}