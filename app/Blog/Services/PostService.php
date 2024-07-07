<?php

namespace App\Blog\Services;

use App\Blog\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;

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

    public function getPostById(int $id) : object
    {
        return $this->postRepository->getSpecific($id);
    }

    public function createPost(array $data) 
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->create($data);
            $categories = $this->postRepository->attachCategories($post,$data['categories_id']);
            return $post;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function updatePost(int $id, object $data)
    {
        DB::beginTransaction();
        try {
            $data = $data->toArray();
            return $this->postRepository->update($id,$data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function deletePost(int $id)
    {
        try {
            return $this->postRepository->destroy($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}