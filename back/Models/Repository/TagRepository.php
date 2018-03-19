<?php

namespace Models\Repository;

use Models\Entity\Tag;
use Models\Store\StoreInterface;

class TagRepository extends BaseRepository
{
    const STORE_KEY = 'tags';

    protected $store;
    protected $tagTop;

    function __construct(StoreInterface $store)
    {
        $this->store = $store;
        $this->tagTop = new TagTopRepository($store);
    }

    public function addTagByText(string $text) {
        $tags = $this->getList();
        $word_list = explode(' ', $text);
        foreach ($word_list as $word) {
            if(mb_strlen($word) >= 4) {
                $tags[$word] = ($tags[$word] ?? 0) + 1;
                $this->tagTop->update($word, $tags[$word]);
            }
        }
        $this->tagTop->save();
        $this->setList($tags);
    }

    public function getTop() {
        return array_keys($this->tagTop->getList());
    }
}

