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

    /** @var  string */
    private $name;

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

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}