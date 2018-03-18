<?php
use Models\Store\StoreProvider;
use \Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$container['store'] = function (Container $c) {
    $settings = $c->get('settings')['store'];
    return StoreProvider::getInstance($settings['class'], $settings['config']);
};

$container->register(new \Models\Repository\TagRepositoryProvider());
$container->register(new \Models\Repository\PostRepositoryProvider());
