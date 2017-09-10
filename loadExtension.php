<?php

use DIP\Formation\Extension\AcmeDemoExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use DIP\Formation\Services\Mailer;
use DIP\Formation\Services\NewsletterManager;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use DIP\Formation\Controller\DIConfigController;

/** @var ContainerBuilder $container */
$container = new ContainerBuilder();
$extension = new AcmeDemoExtension();

$path             = __DIR__.'/src/Resources/Config';
$serviceConfigYML = __DIR__.'/src/Resources/Config/extension_config.yml';

//Create fileLocator instance
$fileLocator = new FileLocator([$path]);

//Create the loader
$yamlLoader  = new YamlFileLoader($container, $fileLocator);

//Create the controller
$diConfigController = new DIConfigController($yamlLoader);

$container->registerExtension($extension);

//Loads config
//When loading the extension configs, the extension should be registered first
//otherwise "There is no extension able to load the configuration for "acme_demo" "
$diConfigController->loadServiceConfiguration($serviceConfigYML);

//Loads the configuration for an extension
$container->loadFromExtension($extension->getAlias());

//Compile the container
$container->compile();

/** @var Mailer $mailerService */
$mailerService = $container->get('mailer');

print $mailerService->getTransport();

/** @var NewsletterManager $newsletterManager */
$newsletterManager = $container->get('newsletter_manager');

$newsletterManager->sendNews();