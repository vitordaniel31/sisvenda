<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pix>
 */
class PixFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'key' => Str::random(2) . $this->faker->unique()->randomNumber(4),
            'type_id' => fake()->randomElement([0, 1, 2, 3]),
        ];
    }
}
