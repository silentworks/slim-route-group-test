<?php

require "vendor/autoload.php";

use RouteGroupTest\MyEntitiesFactory;
use RouteGroupTest\Processor;
use RouteGroupTest\UserEntity;
use Slim\App;

$container['Processor'] = function() {
    return new Processor(new MyEntitiesFactory);
};

$app = new App($container);

$app->get('/', 'Processor:search')
    ->setArgument('entity', UserEntity::class);

$app->get('/{id}', 'Processor:getById')
    ->setArgument('entity', UserEntity::class);

$app->run();