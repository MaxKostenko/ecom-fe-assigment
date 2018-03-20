<?php

namespace Models\Repository;

use Models\Entity\Tag;
use Models\Store\StoreInterface;
use Models\Validation\EntityValidator;

class TagRepository extends BaseRepository
{
    const STORE_KEY = 'tags';
    protected $store;
    protected $tagTop;

    function __construct(StoreInterface $store)
    {
        $this->store  = $store;
        $this->tagTop = new TagTopRepository($store);
    }

    public function addTagByText(string $text)
    {
        $tags      = $this->getList();
        $word_list = explode(' ', $text);

        $tag       = new Tag();
        $validator = new EntityValidator();
        $schema    = require __DIR__ . '/../Entity/TagValidationSchema.php';

        foreach($word_list as $word)
        {
            $tag->setName($word);
            if($validator->checkEntity($tag, $schema))
            {
                $tags[$word] = ($tags[$word] ?? 0) + 1;
                $this->tagTop->update($word, $tags[$word]);
            }
        }
        $this->tagTop->save();
        $this->setList($tags);
    }

    public function getTop()
    {
        return array_keys($this->tagTop->getList());
    }
}

