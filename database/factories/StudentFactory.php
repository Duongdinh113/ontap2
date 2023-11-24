<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = collect([
            Student::is_active,
            Student::is_not_active,
        ])->random(1)[0];
        
        return [
            //
            'name' => fake()->text('50'),
            'code' => fake()->unique()->countryCode(),
            'date_of_birth' => fake()->date(),
            'img'=> fake()->imageUrl(),
            'is_active' => $status,
        ];
    }
}
