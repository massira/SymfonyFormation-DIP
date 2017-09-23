<?php

namespace DIP\Formation\Services\Factory;

/**
 * Class NewsletterManagerFactory
 *
 * @package DIP\Formation\Services\Factory
 */
class NewsletterManagerFactory
{
    public static function getNewsletterManager()
    {
        $newsletterManager = new NewsletterManager();

        //...

        return $newsletterManager;
    }
}