<?php

use Symfony\Component\Console\Application;
use Console\Infrastructure\DependencyInjection\DependencyInjectionFactory;

set_time_limit(0);

require __DIR__.'/../../../../vendor/autoload.php';


$container = (new DependencyInjectionFactory())->build();

$application = new Application();

foreach ($container->findTaggedServiceIds('console.command') as $id => $tags) {
    $application->add($container->get($id));
}

$application->run();
