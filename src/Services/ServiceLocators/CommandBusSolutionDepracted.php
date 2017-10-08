<?php

namespace DIP\Formation\Services\ServiceLocators;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CommandBusSolutionDepracted
 *
 * @package DIP\Formation\Services\ServiceLocators
 */
class CommandBusSolutionDepracted
{
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        /*
         * ->Injecting the entire container is discouraged because it gives too broad access to existing services
         * and it hides the actual dependencies of the services.
         */
        $this->container = $container;
    }

    public function handle(Command $command)
    {
        $commandClass = get_class($command);

        if ($this->container->has($commandClass)) {
            $handler = $this->container->get($commandClass);

            return $handler->handle($command);
        }
    }
}