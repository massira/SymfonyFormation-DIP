<?php

namespace DIP\Formation\Passes;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class CustomPass
 *
 * @package DIP\Formation\Passes
 */
class CustomPass implements CompilerPassInterface
{

    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        //Working on service definition
        foreach ($container->getDefinitions() as $id => $definition) {
            if ($definition->hasTag('newsletter.name')) {
                $definition->addMethodCall('setName', ['Custom Pass']);
            }
        }
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