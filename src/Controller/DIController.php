<?php

namespace DIP\Formation\Controller;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class DIController
 */
class DIController
{
    private $container;

    /**
     * DIController constructor.
     *
     * @param ContainerBuilder $container
     */
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

    /**
     * Register a service using autowiring and alias
     */
    public function registerServiceAutowiringAlias()
    {
        $definition = new Definition();
        $definition->setClass('DIP\Formation\Controller\DIAutowireController')
            ->setAutowired(true)
            ->setPublic(true);

        $this->container->setDefinition('DIP\Formation\Controller\DIAutowireController', $definition);
        $this->container->setAlias('message.generator', 'DIP\Formation\Controller\DIAutowireController');
        $this->container->compile();
    }

    //@todo autowire interface code

    //@todo service configurator
    
    /**
     * Registers a service with a tag and an alias
     */
    public function registerServiceAliasTag()
    {
        $this->container->setParameter('mailer.transport', 'send_mail');
        $this->container->register('mailer', 'DIP\Formation\Services\Mailer')
                        ->addArgument('%mailer.transport%');

        /*
         * ->The methods here that change service definitions can only be used before the container is compiled.
         * ->Once the container is compiled you cannot manipulate service definitions further.
         */

        /*
         * ->Don't use "get()" to get a service that you want to inject as constructor argument,
         * the service is not yet available. Instead, use a "Reference" instance as shown above.
         */
        $this->container->register('newsletter_manager', 'DIP\Formation\Services\NewsletterManager')
                        ->addArgument(new Reference('mailer'))
                        ->addTag('newsletter.name');

        $this->container->setAlias('newsletter.manager.alias', 'newsletter_manager');
        $this->container->compile();
    }
}