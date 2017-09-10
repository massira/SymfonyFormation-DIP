<?php

namespace DIP\Formation\Extension;


use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    private $treeBuilder;

    public function __construct()
    {
        $this->treeBuilder = new TreeBuilder();
    }

    /**
     * @inheritdoc
     */
    public function getConfigTreeBuilder()
    {
        /** @var ArrayNodeDefinition $root */
        $root = $this->treeBuilder->root('acme_demo_2');

        //Create the config tree
        $root->children()
                ->scalarNode('foo')->isRequired()->end()
                ->scalarNode('bar')->isRequired()->end()
            ->end();

        return $this->treeBuilder;
    }
}