<?php

namespace DIP\Formation\Services\Configurator;

/**
 * Class NewsletterManagerConfigurator
 *
 * @package DIP\Formation\Services
 */
class NewsletterManager implements EmailFormatterAwareInterface
{
    private $enabledFormatters;

    /**
     * @param array $enabledFormatters The formatters are set it depending on application settings
     * The use of the configurator
     */
    public function setEnabledFormatters(array $enabledFormatters)
    {
        $this->enabledFormatters = $enabledFormatters;
    }

    /**
     * Sends an email
     */
    public function send()
    {
        //use enabled formatters
        //and send mail
        print_r($this->enabledFormatters);
    }
}
