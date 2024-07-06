<?php

namespace Database\Factories;

use App\Blog\Models\Category;
use App\Blog\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'content'=>$this->faker->text('200'),
            'resume'=>$this->faker->sentence('60'),
            'title'=>$this->faker->sentence('120'),
            'slug'=>$this->faker->slug,
            'thumb'=>$this->faker->imageUrl(),
            'user_id'=>User::factory(),
            'schedule_at'=>$this->faker->dateTime
        ];
    }

    public function withCategories($count = 1): object
    {
        return $this->hasAttached(
            Category::factory()->count($count),
            [],
            'categories'
        );
    }
}
