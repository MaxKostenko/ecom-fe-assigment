<?php

namespace Models\Repository;

use Models\Entity\Tag;
use Models\Store\StoreInterface;

class TagRepository
{
    protected $store;

    function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }

    public function addTagByText($data) {

    }
}

