<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking_detail>
 */
class BookingDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 200),
            'booking_id' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['cancel', 'success']),
            'admin_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
