<?php

namespace Models\Repository;

use Models\Entity\Tag;
use Models\Store\StoreInterface;

class TagRepository extends BaseRepository
{
    const STORE_KEY = 'tags';

    protected $store;

    function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }

    public function addTagByText(string $text) {
        $tags = $this->getList();
        $word_list = explode(' ', $text);
        foreach ($word_list as $word) {
            if(mb_strlen($word) >= 4) {
                $tags[$word] = ($tags[$word] ?? 0) + 1;
            }
        }
        $this->setList($tags);
    }

    public function getTop() {
        $tags = $this->getList();

        //Could be additional repository for top
        //Also sort method have to be replaced
        uasort($tags, function ($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        });
        return array_keys(array_splice($tags, 0, 5));
    }
}

