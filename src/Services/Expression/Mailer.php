<?php

namespace DIP\Formation\Services\Expression;

/**
 * Class Mailer
 *
 * @package DIP\Formation\Services\Expression
 */
class Mailer
{
    private $protocol;

    /**
     * @param $protocol
     */
    public function __construct($protocol)
    {
        $this->protocol = $protocol;
    }

    /**
     * Sends an email
     *
     * @return string
     */
    public function sendMail()
    {
        print 'The mail is sent using the transport: '.$this->protocol;
    }
}
