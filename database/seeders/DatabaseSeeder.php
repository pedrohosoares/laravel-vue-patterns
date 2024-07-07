<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Blog\Models\Category::factory(10)->create();
        \App\Blog\Models\Post::factory(10)->create();
    }
}
