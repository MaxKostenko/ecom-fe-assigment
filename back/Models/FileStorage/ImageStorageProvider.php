<?php

namespace Models\FileStorage;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ImageStorageProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['imageStorage'] = function (ContainerInterface $c) {
            $settings = $c->get('settings')['imageStorage'];
            return new ImageStorage($settings);
        };
    }
}
