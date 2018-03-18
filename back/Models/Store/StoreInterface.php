<?php
namespace Models\Store;

interface StoreInterface {
    public function setData($key, $value);

    public function getData($key);
}
