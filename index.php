<?php

use DIP\Formation\Controller\DIController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use DIP\Formation\Services\Mailer;
use DIP\Formation\Services\NewsletterManager;
use DIP\Formation\Controller\DIConfigController;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

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

$path             = __DIR__.'/src/Resources/Config';
$serviceConfigYML = __DIR__.'/src/Resources/Config/services.yml';
$serviceConfigXML = __DIR__.'/src/Resources/Config/services.xml';

//Create fileLocator instance
$fileLocator = new FileLocator([$path]);

//Create the loader
//$yamlLoader  = new YamlFileLoader($container, $fileLocator);

$xmlLoader = new XmlFileLoader($container, $fileLocator);

//Create the controller
//$diConfigController = new DIConfigController($xmlLoader);
//Loads config
//$diConfigController->loadServiceConfiguration($serviceConfigXML);

/** @var Mailer $mailerService */
//$mailerService = $container->get('mailer');

//print $mailerService->getTransport();

/** @var NewsletterManager $newsletterManager */
//$newsletterManager = $container->get('newsletter_manager');

//$newsletterManager->sendNews();

require_once 'loadExtension.php';