<?php

namespace DIP\Formation\Services;

/**
 * Class NewsletterManager
 *
 * @package DIP\Formation\Services
 */
class NewsletterManager
{
    /** @var  Mailer */
    private $mailer;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send newsletter
     */
    public function sendNews()
    {
        print 'Newsletter is sent';
    }
}