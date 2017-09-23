<?php

namespace DIP\Formation\Services\Configurator;

/**
 * Interface EmailFormatterAwareInterface
 *
 * @package DIP\Formation\Services
 */
interface EmailFormatterAwareInterface
{
    /**
     * @param array $enabledFormatters Formatters are set it at runtime using the configurator
     */
    public function setEnabledFormatters(array $enabledFormatters);
}
