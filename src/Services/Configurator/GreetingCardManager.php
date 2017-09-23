<?php

namespace DIP\Formation\Services\Configurator;

/**
 * Class GreetingCardManagerConfigurator
 *
 * @package DIP\Formation\Services
 */
class GreetingCardManager implements EmailFormatterAwareInterface
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
        print_r($this->enabledFormatters);
    }
}
