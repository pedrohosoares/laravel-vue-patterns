<?php

namespace App\Blog\Repositories;

use App\Blog\Models\Category;

class CategoryRepository
{
    public function getAll() : object
    {
        return Category::all();
    }

    public function getSpecific(object $request) : object
    {
        return Category::where('name','like','%'.$request['name'].'%')
            ->first();
    }

    public function destroy(int $id)
    {
        return Category::destroy($id);
    }

    public function create(object $data) : object
    {
        return Category::create($data);
    }

    public function update(object $data,int $id) : object
    {
        $Category = Category::find($id);
        $Category->update($data);
        return $Category;
    }
}