<?php

namespace DIP\Controller\Controller;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class DIController
 */
class DIController
{
    private $container;

    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
    }

    /**
     * Register service
     */
    public function registerService()
    {
        //Register the Mailer class as service
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
            ->addArgument('sendMail');

    }
}