<?php
use \Slim\Container;

/** @var Container $container */
$container = $app->getContainer();

$container->register(new \Models\Store\StoreProvider());
$container->register(new \Models\FileStorage\ImageStorageProvider());
$container->register(new \Models\Repository\TagRepositoryProvider());
$container->register(new \Models\Repository\PostRepositoryProvider());
