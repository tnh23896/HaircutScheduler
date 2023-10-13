<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'username' => $this->faker->name(),
            'avatar' => $this->faker->imageUrl(),
            'phone' => $this->faker->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('12345678'),
            'description' => $this->faker->text(),
            'remember_token' => Str::random(10),
        ];
    }
}
