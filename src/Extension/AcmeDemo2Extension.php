<?php

namespace DIP\Formation\Extension;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * Class AcmeDemoExtension_2
 *
 * @package DIP\Formation\Extension
 */
class AcmeDemo2Extension extends Extension implements PrependExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        //If not extending from the abstract class Extension
        /*
            $configuration = new Configuration();
            $processor = new Processor();
            $config = $processor->processConfiguration($configuration, $configs);
        */

        $configuration = $this->getConfiguration($configs, $container);
        $configs = $this->processConfiguration($configuration, $configs);

        $container->setParameter('acme_demo_2', $configs['foo']);
    }

    /**
     * @return string The extension alias should be unique
     */
    public function getAlias()
    {
        return 'acme_demo_2';
    }

    /**
     * @inheritdoc
     */
    public function prepend(ContainerBuilder $container)
    {
        //Prepends a config array to the configs of the given extension.
        //The first argument is the name(alias) of the extension
        $container->prependExtensionConfig('acme_demo_2', ['key' => 'value']);
    }
}