<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillDetail>
 */
class BillDetailFactory extends Factory
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
            'bill_id' => $this->faker->numberBetween(1, 5),
            'admin_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
