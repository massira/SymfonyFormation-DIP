<?php

namespace DIP\Formation\Services\Configurator;

/**
 * Class EmailConfigurator
 *
 * @package DIP\Formation\Services\Configurator
 */
class EmailConfigurator
{
   private $formatterManager;

    /**
     * @param EmailFormatterManager $formatterManager
     */
   public function __construct(EmailFormatterManager $formatterManager)
   {
       $this->formatterManager = $formatterManager;
   }

    /**
     * Sets the formatters at runtime
     *
     * @param EmailFormatterAwareInterface $emailFormatter
     */
   public function configure(EmailFormatterAwareInterface $emailFormatter)
   {
       /*
        * ->Now we avoid to couple "NewsletterManager" and "GreetingCardManager" with "EmailFormatterManager"
        */
        $emailFormatter->setEnabledFormatters($this->formatterManager->getEnabledFormatters());
   }
}
