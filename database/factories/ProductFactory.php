<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // Generate a random product name
            'price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? null, // Assign random category
        ];
    }
}
