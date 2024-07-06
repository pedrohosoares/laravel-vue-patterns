<?php

namespace App\Blog\Services;

use App\Blog\Repositories\CategoryRepository;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllPosts()
    {
        return $this->categoryRepository->getAll();
    }

    public function getPostById(int $id) : object
    {
        return $this->categoryRepository->getSpecific($id);
    }

    public function createPost(array $data) 
    {
        DB::beginTransaction();
        try {
            return $this->categoryRepository->create($data);
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
            return $this->categoryRepository->update($id,$data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function deletePost(int $id)
    {
        try {
            return $this->categoryRepository->destroy($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
