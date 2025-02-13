<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Post;
use App\Storage\GenericStorage;

class PostMapper
{
    public function __construct(public GenericStorage $storage)
    {
    }

    public function findById(int $id): ?Post
    {
        $data = $this->storage->retrieve($id);
        if ($data === null) {
            return null;
        }

        if (isset($data['type']) && $data['type'] === Post::getClassName() ) {
            return $this->mapToPost($data);
        }

        return null;
    }

    private function mapToPost(array $data): Post
    {
        $post = new Post();
        $post->setName($data['name']);
        $post->setContents($data['contents'] ?? null);

        return $post;
    }
}