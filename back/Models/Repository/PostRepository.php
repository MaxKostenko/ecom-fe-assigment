<?php

namespace Models\Repository;

use Models\Entity\Post;
use Models\Store\StoreInterface;

class PostRepository
{
    const STORE_KEY = 'posts';
    protected $store;
    protected $tagRepository;

    public function __construct(StoreInterface $store, TagRepository $tagRepository)
    {
        $this->store = $store;
        $this->tagRepository = $tagRepository;
    }

    public function addPost($data) {
        $post = new Post();
        $post->setAttributes($data);
        $this->tagRepository->addTagByText($post->getText());

        $postList = $this->getList();
        array_push($postList, $post->getAttributes());
        $this->store->setData(static::STORE_KEY, $postList);
    }

    public function getList() {
        return $this->store->getData(static::STORE_KEY) ?: [];
    }


}

