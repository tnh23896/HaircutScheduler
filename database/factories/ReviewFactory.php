<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'star' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 5),
            'admin_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
