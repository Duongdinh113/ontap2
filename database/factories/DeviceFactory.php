<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = collect([
            Device::is_active,
            Device::isactive,
        ])->random(1)[0];
        return [
            //
            'name' => fake()->text(50),
            'serial' => fake()->text,
            'model' => fake()->text,
            'img' => fake()->imageUrl(),
            'is_active' => $status,
            'describe' => fake()->text,
        ];
    }
}
