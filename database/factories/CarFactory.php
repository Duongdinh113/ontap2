<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isactive = collect([
            Car::one,
            Car::two,
        ])->random(1)[0];
        return [
            //
            'name'=>fake()->text(30),
            'brand'=>fake()->text(50),
            'img'=>fake()->imageUrl(),
            'is_active'=> $isactive,
            'describe'=>fake()->text(),
        ];
    }
}
