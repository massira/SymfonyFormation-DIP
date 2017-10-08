<?php

namespace DIP\Formation\Services\ServiceLocators;

/**
 * Class CommandBusBase
 *
 * @package DIP\Formation\Services\ServiceLocators
 */
class CommandBusBase
{
    /**
     * @var CommandHandler[]
     */
    private $handlerMap;

    public function __construct(array $handlerMap)
    {
        $this->handlerMap = $handlerMap;
    }

    public function handle(Command $command)
    {
        $commandClass = get_class($command);

        if (!isset($this->handlerMap[$commandClass])) {
            return;
        }

        return $this->handlerMap[$commandClass]->handle($command);
    }
}

//$commandBus->handle(new FooCommand());