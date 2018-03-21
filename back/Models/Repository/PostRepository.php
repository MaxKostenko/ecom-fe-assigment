<?php

namespace Models\Repository;

use Models\Entity\Post;
use Models\FileStorage\ImageStorage;
use Models\Store\StoreInterface;
use Models\Validation\EntityValidator;
use Slim\Http\UploadedFile;

class PostRepository extends BaseRepository
{
    const STORE_KEY = 'posts';
    protected $store;
    protected $tagRepository;
    protected $imageStorage;

    public function __construct(
        StoreInterface $store,
        TagRepository $tagRepository,
        ImageStorage $imageStorage
    )
    {
        $this->store         = $store;
        $this->tagRepository = $tagRepository;
        $this->imageStorage  = $imageStorage;
    }

    public function addPost($data, UploadedFile $image = null)
    {
        $post = new Post();
        $post->setAttributes($data);

        if($image)
        {
            $imageFilename = $this->imageStorage->addFile($image);
            if($imageFilename)
            {
                $post->setImage($imageFilename);
            }
        }

        $validator = new EntityValidator();
        $schema    = require __DIR__ . '/../Entity/PostValidationSchema.php';

        if($validator->checkEntity($post, $schema))
        {
            $this->tagRepository->addTagByText($post->getText());
            $postList = $this->getList();
            $postData = $post->getAttributes();
            array_unshift($postList, $postData);
            $this->setList($postList);

            return [
                'success' => true,
                'post'    => $postData,
                'tags'    => $this->tagRepository->getTop()
            ];
        }

        return [
            'success' => false,
            'errors'  => $validator->getErrorList()
        ];
    }
}

