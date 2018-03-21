<?php

namespace Models\Repository;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PostRepositoryProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['post'] = function (ContainerInterface $c) {
            return new PostRepository(
                $c->get('store'),
                $c->get('tag'),
                $c->get('imageStorage')
            );
        };
    }
}
