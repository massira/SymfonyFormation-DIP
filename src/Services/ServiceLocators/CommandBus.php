<?php

namespace DIP\Formation\Services\ServiceLocators;

use Psr\Container\ContainerInterface;

/**
 * Class CommandBus
 *
 * ->Command Bus Consist of(hexagonal architecture):
 * -The command     = the message
 * -The handler     = which execute the command(process the message)
 * -The command bus = sends the command to the correct handler
 *
 * @package DIP\Formation\Services\ServiceLocators
 */
class CommandBus
{
    /**
     * @var ContainerInterface
     */
    private $handlerLocator;

    /**
     * @param ContainerInterface $handlerLocator Service locators
     */
    public function __construct(ContainerInterface $handlerLocator)
    {
        /*
         * ->Service Locators are intended to solve this problem by giving access to a set of predefined
         * services while instantiating them only when actually needed.
         *
         * ->The service locator implement the interface: PSR-11 ContainerInterface
         *
         * ->The service locator is a callable: $this->handlerLocator($command)
         */

        $this->handlerLocator = $handlerLocator;
    }

    /**
     * Handles the command
     *
     * @param $command
     */
    public function handle($command)
    {
        $commandClass = get_class($command);

        if (!$this->handlerLocator->has($commandClass)) {
            return;
        }

        $handler = $this->handlerLocator->get($commandClass);
        $handler->handle($command);
    }
}