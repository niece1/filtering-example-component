<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->sentence,
            'slug' => Str::slug($name),
            'free' => rand(0, 1),
            'difficulty' => ['beginner', 'intermediate', 'advanced'][rand(0, 2)],
            'type' => ['theory', 'project', 'snippet'][rand(0, 2)],
            'views' => $this->faker->numberBetween(1, 20),
        ];
    }
}
