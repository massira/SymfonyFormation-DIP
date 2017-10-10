<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Interface MyCustomInterface
 */
interface MyCustomInterface
{
    public function sayHi();
}

/**
 * Class MyCustomClass
 */
class MyCustomClass implements MyCustomInterface
{
    public function sayHi()
    {
        print 'Hi Bro';
    }
}

$container = new ContainerBuilder();
$container->addObjectResource(new MyCustomClass());

$className = $container->getReflectionClass('MyCustomClass')->name;
$obj = new $className;

//Output "Hi Bro"
$obj->sayHi();