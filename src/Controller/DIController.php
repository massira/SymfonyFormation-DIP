<?php

namespace DIP\Formation\Controller;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

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
        //We should pass the full name of the class(including namespace) otherwise reflection class exception
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
            ->addArgument('sendMail'); //Param Constructor
    }

    /**
     * Register service using parameters
     */
    public function registerServiceWithParameter()
    {
        //We use container parameter to avoid changing the mailer transport in multiple places
        $this->container->setParameter('mailer.transport', 'sendMail_2');
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
             ->addArgument('%mailer.transport%'); //Param Constructor
    }

    /**
     * Register service using reference
     */
    public function registerServiceWithReference()
    {
        $this->container->setParameter('mailer.transport', 'sendMail_3');
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
            ->addArgument('%mailer.transport%'); //Param Constructor

        //We use class Reference if the class need a reference to another class(service)
        $this->container->register('newsletter_manager', 'DIP\Formation\Services\NewsletterManager')
             ->addArgument(new Reference('mailer')); //Param Constructor
    }

    /**
     * Register a service using method injection
     */
    public function registerServiceWithMethodInjection()
    {
        $this->container->setParameter('mailer.transport', 'sendMail_4');
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
            ->addArgument('%mailer.transport%'); //Param Constructor

        $this->container->register('newsletter_manager', 'DIP\Formation\Services\NewsletterManager_2')
             ->addMethodCall('setMailer', [new Reference('mailer')]);
    }
}