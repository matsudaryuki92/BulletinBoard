<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Post::class;

    public function definition()
    {
        return [
            'category_id' =>  Category::inRandomOrder()->first()->id,
            'name' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(0,2),
            'content' => $this->faker->sentence(),
        ];
    }
}
