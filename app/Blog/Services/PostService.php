<?php

namespace App\Blog\Services;

use App\Blog\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function getPostById()
    {

    }

    public function createPost()
    {

    }

    public function updatePost()
    {

    }

    public function deletePost()
    {

    }
}