<?php

namespace App\Blog\Repositories;

use App\Blog\Models\Post;

class PostRepository
{
    public function getAll(string $params = '', int $paginate = 15): object
    {
        $posts = new Post;
        $posts = $posts->paginate($paginate);
        return $posts;
    }

    public function getSpecific(int $id): object
    {
        return Post::find($id);
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
