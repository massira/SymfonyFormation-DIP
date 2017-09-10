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
        /*
            $configuration = new Configuration();
            $processor = new Processor();
            $config = $processor->processConfiguration($configuration, $configs);
        */
        var_dump($configs);die;
        $configuration = $this->getConfiguration($configs, $container);
        $configs = $this->processConfiguration($configuration, $configs);

        $container->setParameter('acme_demo_2', $configs['foo']);
    }

    /**
     * @return string
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
        $container->prependExtensionConfig('acme_demo_2', ['key' => 'value']);
    }
}