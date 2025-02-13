<?php
declare(strict_types=1);

namespace App\Repository;

use App\Model\Mapper\PostMapper;
use App\Model\Post;

class PostRepository
{
    public function __construct(
        public PostMapper $postMapper
    )
    {
    }

    public function find(int $id): ?Post
    {
        $object = $this->postMapper->findById($id);
        return $object instanceof Post ? $object : null;
    }
}