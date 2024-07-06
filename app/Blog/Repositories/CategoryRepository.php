<?php

namespace App\Blog\Repositories;

use App\Blog\Models\Category;

class CategoryRepository
{
    public function getAll(string $params = '',int $paginate = 15) : object
    {
        $Categorys = new Category;
        $Categorys = $Categorys->paginate($paginate);
        return $Categorys;
    }

    public function getSpecific(int $id) : object
    {
        return Category::find($id);
    }

    public function destroy(int $id)
    {
        return Category::destroy($id);
    }

    public function create(array $data) : object
    {
        return Category::create($data);
    }

    public function update(int $id,array $data) : object
    {
        $Category = Category::find($id);
        $Category->update($data);
        return $Category;
    }
}