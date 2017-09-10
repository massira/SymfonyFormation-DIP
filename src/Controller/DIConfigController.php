<?php

namespace DIP\Formation\Controller;


use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DIConfigController
 *
 * @package DIP\Formation\Controller
 */
class DIConfigController
{
    private $loader;

    /**
     * @param LoaderInterface  $loader
     */
    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    /**
     * Loads service configuration
     *
     * @param string $path The config file to load
     */
    public function loadServiceConfiguration($path)
    {
        $this->loader->load($path);
    }
}