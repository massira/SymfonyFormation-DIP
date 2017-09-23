<?php

namespace DIP\Formation\Services\Expression;

/**
 * Class MailerConfiguration
 *
 * @package DIP\Formation\Services\Expression
 */
class MailerConfiguration
{
    /**
     * Returns the used protocol based on some configuration(an example)
     *
     * @return string
     */
    public function getProtocol()
    {
        return 'sendMail';
    }
}