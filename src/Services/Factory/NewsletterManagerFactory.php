<?php

namespace DIP\Formation\Services\Factory;

/**
 * Class NewsletterManagerFactory
 *
 * @package DIP\Formation\Services\Factory
 */
class NewsletterManagerFactory
{
    /**
     * Gets an instance of NewsletterManager
     *
     * @return NewsletterManager
     */
    public static function getNewsletterManager()
    {
        $newsletterManager = new NewsletterManager();

        //...

        return $newsletterManager;
    }

    /**
     * Gets an instance of newsletterManager
     *
     * @param string $mailer
     *
     * @return NewsletterManager
     */
    public function getNewsletterManagerArgument($mailer)
    {
        $newsletterManager = new NewsletterManager($mailer);

        //...

        return $newsletterManager;
    }
}