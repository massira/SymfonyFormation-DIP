<?php

namespace DIP\Formation\Services\DecoratorServices;

/**
 * Class MailerDecorator
 *
 * @package DIP\Formation\Services\DecoratorServices\Mailer
 */
class MailerDecorator
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @inheritdoc
     */
    public function send()
    {
        print '(Decorator Mailer) The mail was sent using the protocol: '.$this->mailer->getTransport();
    }
}