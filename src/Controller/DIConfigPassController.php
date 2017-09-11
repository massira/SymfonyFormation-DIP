<?php

namespace DIP\Formation\Controller;

use DIP\Formation\Passes\CustomPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DIConfigPassController
 *
 * @package DIP\Formation\Extension
 */
class DIConfigPassController
{
    /**
     * Adds the compiler pass to the container
     *
     * @param ContainerBuilder $container
     */
    public function executePass(ContainerBuilder $container)
    {
        $pass = new CustomPass();

        /*
         * ->The "optimization passes" run first and include tasks such as resolving references within
         * the definitions.
         * ->The "removal passes" perform tasks such as removing private aliases and unused services.
         * ->By default, they are run before the optimization passes.
         */

        /*
         * ->$priority = 10 > $priority = 30;
         * ->The option to prioritize compiler passes was added in "Symfony 3.2".
         */
        $container->addCompilerPass($pass, PassConfig::TYPE_BEFORE_OPTIMIZATION, 10);
    }
}