<?php

namespace DIP\Formation\Controller;

use DIP\Formation\Services\MessageGenerator;

/**
 * Class DIAutowireController
 *
 * @package DIP\Formation\Controller
 */
class DIAutowireController
{
    private $generator;
    private $name;

    /**
     * DIAutowireController constructor.
     *
     * @param MessageGenerator $generator
     * @param string           $name
     */
    public function __construct(MessageGenerator $generator, $name)
    {
        //Both classes(DIAutowireController|MessageGenerator) are automatically registered as services
        // and configured to be autowired.

        $this->generator = $generator;
        $this->name      = $name;
    }

    /**
     * Shows a random happy message
     */
    public function showMessage()
    {
        print $this->generator->getHappyMessage() . $this->name;
    }
}