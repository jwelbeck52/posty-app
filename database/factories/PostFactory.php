<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   //App\Models\Post::factory()->times(5)->create(['user_id' => 8]); using artisan tinker
        return [
            'body' => $this->faker->sentence(15),
        ];
    }
}
