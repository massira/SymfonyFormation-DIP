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
     * @param ContainerInterface $handlerLocator
     */
    public function __construct(ContainerInterface $handlerLocator)
    {
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