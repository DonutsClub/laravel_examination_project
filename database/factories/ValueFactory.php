<?php

namespace Database\Factories;

use App\Models\Value;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Value>
 */
class ValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => fake()->numberBetween(1000, 10000),
            'country_id' => fake()->numberBetween(1, 10)
        ];
    }
}
