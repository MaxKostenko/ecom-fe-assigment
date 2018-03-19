<?php

namespace Models\Repository;

use Models\Entity\Tag;
use Models\Store\StoreInterface;

class TagTopRepository extends BaseRepository
{
    const STORE_KEY = 'tagTop';

    protected $store;
    protected $top;

    public function __construct(StoreInterface $store)
    {
        $this->store = $store;
        $this->top = $this->getList();
    }

    public function update($tag, $count)
    {
        if (isset($this->top[$tag])||count($this->top) < 5) {
            $this->top[$tag] = $count;
            arsort($this->top);
        } else {
            if (end($this->top) < $count) {
                array_pop($this->top);
                $this->top[$tag] = $count;
                arsort($this->top);
            }
        }
    }

    public function save()
    {
        $this->setList($this->top);
    }


}

