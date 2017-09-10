<?php

namespace DIP\Formation\Services;

/**
 * Class Mailer
 *
 * @package DIP\Formation\Services
 */
class Mailer
{
    private $transport;

    /**
     * Mailer constructor.
     *
     * @param string $transport
     */
    public function __construct($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }
}