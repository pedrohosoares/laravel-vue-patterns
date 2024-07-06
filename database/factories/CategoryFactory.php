<?php

namespace Database\Factories;

use App\Blog\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence('10'),
            'user_id'=>User::factory()
        ];
    }
}
