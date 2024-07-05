<?php

namespace App\Blog\Repositories;

use App\Blog\Models\Post;

class PostRepository
{
    public function getAll() : object
    {
        return Post::all();
    }

    public function getSpecific(object $request) : object
    {
        return Post::where('title','like','%'.$request['title'].'%')
        ->orWhere('id',$request['id'])
        ->first();
    }

    public function destroy(int $id)
    {
        return Post::destroy($id);
    }

    public function create(object $data) : object
    {
        return Post::create($data);
    }

    public function update(object $data,int $id) : object
    {
        $post = Post::find($id);
        $post->update($data);
        return $post;
    }
}