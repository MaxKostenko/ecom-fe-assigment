<?php
namespace Models\Store;

class StoreProvider
{
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