<?php

namespace Models\Repository;

use Models\Store\StoreInterface;

abstract class BaseRepository implements RepositoryInterface
{
    const STORE_KEY = self::class;
    /**
     * @var StoreInterface
     */
    protected $store;

    public function getList() {
        return $this->store->getData(static::STORE_KEY) ?: [];
    }

    public function setList($data) {
        $this->store->setData(static::STORE_KEY, $data);;
    }
}