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
    // protected $model = Product::class;

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'price' => fake()->numberBetween(5000, 100000),
            'stock' => fake()->numberBetween(1, 10000),
            'description' => fake()->sentence(10),
        ];
    }
}
