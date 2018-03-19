<?php

namespace Models\Repository;

use Models\Entity\Post;
use Models\Store\StoreInterface;

class PostRepository extends BaseRepository
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
        $postData = $post->getAttributes();
        array_unshift($postList, $postData);
        $this->setList($postList);
        return $postData;
    }

}

