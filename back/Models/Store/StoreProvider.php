<?php
namespace Models\Store;

use Interop\Container\ContainerInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class StoreProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['store'] = function (ContainerInterface $c) {
            $settings = $c->get('settings')['store'];
            return StoreProvider::getInstance($settings['class'], $settings['config']);
        };
    }

    public static function getInstance($className, $config = null)
    {
        try {
            if(class_exists($className)) {
                return new $className($config);
            } else {
                throw new \Exception("Store `{$className}` doesn't exists.");
            }
        } catch (\Exception $e) {
            //Log something
        }
        return null;
    }
}