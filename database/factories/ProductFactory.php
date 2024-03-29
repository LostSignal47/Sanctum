<?php

namespace Database\Factories;

use App\Models\Product;
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
            'product_code' => fake()->unique()->regexify('[0-9]{5}'),
            'product_name' => fake()->unique()->word(),
            'description' => fake()->sentence(),
            'product_price' => fake()->numberBetween(100, 1000),
            'product_quantity' => fake()->numberBetween(1,100),
        ];
    }
}
