<?php

use DIP\Formation\Controller\DIController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use DIP\Formation\Services\Mailer;
use DIP\Formation\Services\NewsletterManager;
use DIP\Formation\Controller\DIConfigController;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use DIP\Formation\Controller\DIConfigExtensionController;
use DIP\Formation\Controller\DIConfigPassController;
use DIP\Formation\Controller\DIConfigDumperController;
use Symfony\Component\DependencyInjection\Definition;

require_once 'vendor/autoload.php';

$container = new ContainerBuilder();

//$controller = new DIController($container);

//$controller->registerService();

//$controller->registerServiceWithParameter();

//$controller->registerServiceWithReference();

//$controller->registerServiceWithMethodInjection();

/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter_manager');

//$newsletterManager->sendNews();

/** @var Mailer $mailerService */
//$mailerService = $container->get('mailer');

//print $mailerService->getTransport();

/**Working with loaders and configuration files**/
$path             = __DIR__.'/src/Resources/Config';
$serviceConfigYML = __DIR__.'/src/Resources/Config/services.yml';
$serviceConfigXML = __DIR__.'/src/Resources/Config/services.xml';

//Create fileLocator instance
$fileLocator = new FileLocator([$path]);

//Create the loader
$ymlLoader  = new YamlFileLoader($container, $fileLocator);

//$xmlLoader = new XmlFileLoader($container, $fileLocator);

//Create the controller
$diConfigController = new DIConfigController($ymlLoader);
//Loads config
$diConfigController->loadServiceConfiguration($serviceConfigYML);

//Output the resources for this configuration
var_dump($container->getResources());

/** alias tag without a loader**/
//$diController = new DIController($container);
//$diController->registerServiceAliasTag();

/** @var Mailer $mailerService */
//$mailerService = $container->get('mailer');

//print $mailerService->getTransport();

/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter.manager.alias');

//$newsletterManager->sendNews();

//require_once 'loadExtension.php';

/**Working with extension and the config tree(TreeBuilder)**/
//$diConfigExtensionController = new DIConfigExtensionController($container);
//$diConfigExtensionController->loadExtension();
//print $container->getParameter('acme_demo_2');

/**Working with compiler passes**/
//$diConfigPassController = new DIConfigPassController();

//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//Register the pass
//$diConfigPassController->executePass($container);
//Compile the container to execute passes
//$container->compile();

/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter_manager');
//print $newsletterManager->getName();

/**Working with dumpers**/
//Create the dumper
//$diConfigDumperController = new DIConfigDumperController();
//$cachePath = $diConfigDumperController->dumpContainer();

//include_once $cachePath;

//$container = new ProjectServiceContainer();
/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter_manager');
//$newsletterManager->sendNews();

/**Working with dumpers and config cache**/
//Create the dumper
//$diConfigDumperController = new DIConfigDumperController();
//$cachePath = $diConfigDumperController->dumpContainerWithConfigCache();

//include_once $cachePath;

//$container = new MyCacheContainer();
/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter_manager');
//$newsletterManager->sendNews();

/**Test autowire option**/
//$serviceConfigYML = __DIR__.'/src/Resources/Config/service_autowire_argument.yml';
//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//Without loading the configuration file
//$diController = new DIController($container);
//$diController->registerServiceAutowiringAlias();

//Compiling the container
//$container->compile();
/** @var \DIP\Formation\Controller\DIAutowireController $controller */
//$controller = $container->get('message.generator');
//$controller->showMessage();

/**Working with autowiring and alias**/
//$serviceConfigYML = __DIR__.'/src/Resources/Config/service_autowire_alias.yml';
//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//compiling the container
//$container->compile();
/** @var DIP\Formation\Services\TwitterClient $twitterClient */
//$twitterClient = $container->get('DIP\Formation\Services\TwitterClient');
//$twitterClient->tweet('Amine', 'mykey', 'Hello');

/******Working with service configurator******/
//$serviceConfigYML = __DIR__.'/src/Resources/Config/service_configurator.yml';
//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//compiling the container
//$container->compile();
/** @var DIP\Formation\Services\Configurator\NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('DIP\Formation\Services\Configurator\NewsletterManager');
//$newsletterManager->send();

/*********Working with Expressions**********/
//$serviceConfigYML = __DIR__.'/src/Resources/Config/service_expression.yml';
//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//compiling the container
//$container->compile();
/** @var DIP\Formation\Services\Expression\Mailer $mailer */
//$mailer = $container->get('DIP\Formation\Services\Expression\Mailer');
//$mailer->sendMail();

//Working with Expression => php code
//$diController = new DIController($container);
//$diController->registerServiceUsingExpression();
/** @var DIP\Formation\Services\Expression\Mailer $mailer */
//$mailer = $container->get('DIP\Formation\Services\Expression\Mailer');
//$mailer->sendMail();

/*********Working with the Factory**********/
//$serviceConfigYML = __DIR__.'/src/Resources/Config/service_factory.yml';
//Create the controller
//$diConfigController = new DIConfigController($ymlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigYML);

//compiling the container
//$container->compile();
/** @var DIP\Formation\Services\Factory\NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('DIP\Formation\Services\Factory\NewsletterManager');
//print $newsletterManager->getMailer();

//Working with Factory Method => php code
//$diController = new DIController($container);
//$diController->registerServiceUsingFactory();

/** @var DIP\Formation\Services\Factory\NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('DIP\Formation\Services\Factory\NewsletterManager');
//print $newsletterManager->getMailer();

/************Working with parent services(ChildDefinition)*************/
//$diController = new DIController($container);
//$diController->registerServicesUsingParentService();

/** @var  DIP\Formation\Services\ParentServices\DoctrinePostService $doctrinePostService */
//$doctrinePostService = $container->get('DIP\Formation\Services\ParentServices\DoctrinePostService');
//$doctrinePostService->log('Doctrine Post Service log');

/************Working with service decorator*************/
//$diController = new DIController($container);
//$diController->registerServicesUsingDecorator();

//$mailer = $container->get('app.mailer');
//$mailer->send();

/******Working with service locator********/
//$diController = new DIController($container);
//$diController->registerServicesUsingServiceLocator();

//$commandBus = $container->get('DIP\Formation\Services\ServiceLocators\CommandBus');
//$commandBus->handle(new \DIP\Formation\Services\ServiceLocators\DeleteUserCommand());









