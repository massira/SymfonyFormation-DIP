<?php

namespace DIP\Formation\Services\DecoratorServices;

/**
 * Class Mailer
 *
 * @package DIP\Formation\Services\DecoratorServices
 */
class Mailer
{
    protected $transport;

    public function __construct($transport)
    {
        $this->transport = $transport;
    }

    /**
     * Sends mail
     */
    public function send()
    {
        print 'The mail was sent using the protocol: '.$this->transport;
    }

    /**
     * Returns the used transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }
}