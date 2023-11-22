<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => $this->faker->numberBetween(1, 5),
            'admin_id' => $this->faker->numberBetween(1, 5),
            'phone' => $this->faker->phoneNumber(),
            'promo_id' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->numberBetween(100, 200),
            'email' => $this->faker->email(),
            'day' => $this->faker->date(),
            'time' => $this->faker->time(),
            'payment' => $this->faker->randomElement(['offline', 'vnpay']),
        ];
    }
}
