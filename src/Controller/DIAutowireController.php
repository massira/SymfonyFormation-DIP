<?php

namespace DIP\Formation\Controller;


use DIP\Formation\Services\MessageGenerator;

class DIAutowireController
{
    private $generator;

    /**
     * DIAutowireController constructor.
     *
     * @param MessageGenerator $generator
     */
    public function __construct(MessageGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Shows a random happy message
     */
    public function showMessage()
    {
        print $this->generator->getHappyMessage();
    }
}