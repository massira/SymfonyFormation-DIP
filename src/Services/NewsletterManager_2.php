<?php

namespace DIP\Formation\Services;


class NewsletterManager_2
{
    /** @var  Mailer */
    private $mailer;

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer)
    {
       $this->mailer = $mailer;
    }

    /**
     * Send newsletter
     */
    public function sendNews()
    {
        print 'Newsletter_2 is sent';
    }
}