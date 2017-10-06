<?php

namespace DIP\Formation\Services\ParentServices;

/**
 * Class Logger
 *
 * @package DIP\Formation\Services\ParentServices
 */
class Logger implements LoggerInterface
{
    /**
     * @inheritdoc
     */
    public function log($message)
    {
        print 'Logging the message: '.$message;
    }
}
