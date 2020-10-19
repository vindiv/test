<?php

namespace Database\Factories;

use App\Models\Articles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'user_id' => factory(\App\Models\User::class),
            'user_id' => User::factory()->create(),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];
    }
}
