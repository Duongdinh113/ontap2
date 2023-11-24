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
        $status = collect([
            Product::is_active,
            Product::isactive,
        ])->random(1)[0];
        return [
            //
            'name' => fake()->text(50),
            'price' => fake()->randomNumber(),
            'price_sale' => fake()->randomNumber(),
            'img' => fake()->imageUrl(),
            'is_active' => $status,
            'describe' => fake()->text,
        ];
    }
}
