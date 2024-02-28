<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'promocode' =>  $this->faker->name(10),
            'description' => $this->faker->text(),
            'discount' => $this->faker->numberBetween(100, 200),
            'expire_date' => now()->addDays(20),
        ];
    }
}
