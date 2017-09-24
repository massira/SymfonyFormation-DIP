<?php

namespace DIP\Formation\Services\Factory;

/**
 * Class NewsletterManager
 *
 * @package DIP\Formation\Services\Factory
 */
class NewsletterManager
{
    private $mailer;

    public function __construct($mailer = 'myMailer')
    {
        $this->mailer = $mailer;
    }

    public function sendNewsletter()
    {
        print 'Newsletter is sent';
    }

    /**
     * @return string
     */
    public function getMailer()
    {
        return $this->mailer;
    }
}