<?php

namespace Database\Seeders;

use App\Blog\Models\Category;
use App\Blog\Models\Post;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $categories = Category::all();

        foreach($posts as $post)
        {
            $post->categories()->attach($categories->random(1,4)->pluck('id')->toArray());
        }
    }
}
