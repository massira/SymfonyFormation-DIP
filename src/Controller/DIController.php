<?php

namespace DIP\Formation\Controller;

use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\ExpressionLanguage\Expression;

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

    /**
     * Registers a service in the container using expression
     */
    public function registerServiceUsingExpression()
    {
        $definition = new Definition();
        $definition->setClass('DIP\Formation\Services\Expression\MailerConfiguration')
                   ->setAutowired(true)
                   ->setPublic(true);

        $this->container->setDefinition('mailer.configuration', $definition);

        //shortcut
        //$this->container->autowire('DIP\Formation\Services\Expression\MailerConfiguration');

        $this->container->register('DIP\Formation\Services\Expression\Mailer')
                        ->setPublic(true)
                        ->setAutowired(true)
                        ->addArgument(new Expression('service("mailer.configuration").getProtocol()'));

        //shortcut
        //$this->container->autowire('DIP\Formation\Services\Expression\Mailer')
        // ->addArgument(new Expression('service("DIP\Formation\Services\Expression\MailerConfiguration").getProtocol()'));

        $this->container->compile();
    }

    /**
     * Lets the factory create the service instead of the container
     */
    public function registerServiceUsingFactory()
    {
        $this->container->setParameter('newsletter_mailer', 'mailer_configured');
        $this->container->autowire('DIP\Formation\Services\Factory\NewsletterManagerFactory');

        //->If the factory method is static
        //$this->container->register('DIP\Formation\Services\Factory\NewsletterManager')
        //     ->setFactory('DIP\Formation\Services\Factory\NewsletterManagerFactory::getNewsletterManager');
        //     ->setFactory(['DIP\Formation\Services\Factory\NewsletterManagerFactory', 'getNewsletterManager']);

        //->if the factory method is not static
        $this->container->register('DIP\Formation\Services\Factory\NewsletterManager')
            ->addArgument('%newsletter_mailer%')
            ->setFactory([new Reference('DIP\Formation\Services\Factory\NewsletterManagerFactory'), 'getNewsletterManagerArgument']);

        $this->container->compile();
    }

    /**
     * Register services using parent Services
     */
    public function registerServicesUsingParentService()
    {
        //Example of autowiring using interface alias
        $this->container->autowire('DIP\Formation\Services\ParentServices\Logger');
        $this->container->setAlias('DIP\Formation\Services\ParentServices\LoggerInterface', 'DIP\Formation\Services\ParentServices\Logger');

        $this->container->autowire('DIP\Formation\Services\ParentServices\EntityManager');
        $this->container->setAlias('DIP\Formation\Services\ParentServices\EntityManagerInterface', 'DIP\Formation\Services\ParentServices\EntityManager');

        /*
         * ->All attributes on the parent service are shared with the child except for shared, abstract and tags.
         * ->These are not inherited from the parent.
         */

        /*
         * ->In the examples shown, the classes sharing the same configuration also extend from the same parent class in PHP.
         * ->This isn't necessary at all. You can just extract common parts of similar service definitions into a parent service
         * without also extending a parent class in PHP.
         */

        $baseDefinition = new Definition();
        $baseDefinition->setClass('DIP\Formation\Services\ParentServices\BaseDoctrineRepository')
                   ->setAbstract(true)
                   ->addArgument(new Reference('DIP\Formation\Services\ParentServices\EntityManager'))
                   ->addMethodCall('setLogger', [new Reference('DIP\Formation\Services\ParentServices\Logger')]);
        $this->container->setDefinition('DIP\Formation\Services\ParentServices\BaseDoctrineRepository', $baseDefinition);

        $doctrinePostServiceDefinition           = new ChildDefinition('DIP\Formation\Services\ParentServices\BaseDoctrineRepository');
        $doctrinePostServiceDefinition->setClass('DIP\Formation\Services\ParentServices\DoctrinePostService');

        //Override parent service
        // overrides the public setting of the parent service
        //$doctrinePostServiceDefinition->setPublic(false);
        // appends the '@app.username_checker' argument to the parent argument list
        //$doctrinePostServiceDefinition->addArgument(new Reference('app.username_checker'));

        $this->container->setDefinition('DIP\Formation\Services\ParentServices\DoctrinePostService', $doctrinePostServiceDefinition);

        $doctrineUserRepositoryDefinition        = new ChildDefinition('DIP\Formation\Services\ParentServices\BaseDoctrineRepository');
        $doctrineUserRepositoryDefinition->setClass('DIP\Formation\Services\ParentServices\DoctrineUserRepository');

        //Override parent service
        // overrides the first argument
        //$doctrineUserRepositoryDefinition->replaceArgument(0, new Reference('doctrine.custom_entity_manager'));

        $this->container->setDefinition('DIP\Formation\Services\ParentServices\DoctrineUserRepository', $doctrineUserRepositoryDefinition);

        $this->container->compile();
    }
}
