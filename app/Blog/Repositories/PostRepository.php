<?php

namespace App\Blog\Repositories;

use App\Blog\Models\Post;

class PostRepository
{
    public function getAll(array $params = [], int $paginate = 15): object
    {
        $posts = new Post;
        if(!empty($params['category']))
        {
            $posts = $posts->whereHas('categories', function($query) use ($params) {
                $query->where('categories.id', $params['category']);
            });
        }
        $posts = $posts->paginate($paginate);
        return $posts;
    }

    public function getSpecific(int $id): object
    {
        return Post::with(['categories'])->find($id);
    }

    public function getSpecificBySlug(string $slug): object
    {
        return Post::with(['categories'])->where('slug',$slug)->first();
    }

    public function getSpecificByCategory(int $id): object
    {
        return Post::whereHas('categories', function($query) use ($id) {
            $query->where('id', $id);
        })->get();
    }

    public function destroy(int $id)
    {
        return Post::destroy($id);
    }

    public function create(array $data): object
    {
        return Post::create($data);
    }

    public function update(int $id, array $data): object
    {
        $post = Post::find($id);
        $post->update($data);
        return $post;
    }

    public function attachCategories(Post $post, array $categories_id = []): array
    {
        return $post->categories()->sync($categories_id);
    }
}
