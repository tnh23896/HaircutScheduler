<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'price' => $this->faker->numberBetween(100, 200),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'category_services_id' => $this->faker->numberBetween(1, 5),
            'percentage_discount' => $this->faker->numberBetween(0, 20),
        ];
    }
}
