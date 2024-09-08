<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'about_us' => '',
            'counter1_name' => fake()->name(),
            'counter1_count' => fake()->numberBetween(20, 100),
            'counter2_name' => fake()->name(),
            'counter2_count' => fake()->numberBetween(300, 400),
            'counter3_name' => fake()->name(),
            'counter3_count' => fake()->numberBetween(300, 400),
            'counter4_name' => fake()->name(),
            'counter4_count' => fake()->numberBetween(100, 400)
        ];
    }
}
