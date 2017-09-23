<?php

namespace DIP\Formation\Services\Configurator;

/**
 * Class EmailFormatterManager
 * Class responsible for loading and validating formatters enabled in the application
 *
 * @package DIP\Formation\Services\Configurator
 */
class EmailFormatterManager
{
    // ...

    public function getEnabledFormatters()
    {
        // code to configure which formatters to use
        $enabledFormatters = ['formatter1', 'formatter2', 'formatter3'];

        // ...

        return $enabledFormatters;
    }
}
