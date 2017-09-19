<?php

namespace DIP\Formation\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * Class AcmeDemoCompilationExtension
 *
 * @package DIP\Formation\Extension
 */
class AcmeDemoCompilationExtension implements ExtensionInterface, CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        // TODO: Implement process() method.
        //If an extension is implementing the "CompilerPassInterface" interface we don't need to create compiler passes
        //The process method is executed after all extension configuration is loaded
        //So we can work on the container during compilation(working on service definitions of other extensions)

        /*
         * ->As a rule, only work with "services definition" in a compiler pass and do "not create service" instances.
         * ->In practice, this means using the methods has(), findDefinition(), getDefinition(), setDefinition(),
         * etc. instead of get(), set(), etc.
         */

        /*
         * ->Make sure your compiler pass does not require services to exist. Abort the method call if some
         * required service is not available.
         */
    }

    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Implement load() method.
        // -Load extension configuration
        // -Always a fresh container is passed to the load method, so we can't customize the container
        // with extension we should use compiler passes or the extension should implements
        // the CompilerPassInterface interface
    }

    /**
     * @inheritdoc
     */
    public function getNamespace()
    {
        return 'https://www.example.com/symfony';
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
    public function getAlias()
    {
        return 'acme_demo_compilation';
    }

}