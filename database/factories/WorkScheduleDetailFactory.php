<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work_schedule_detail>
 */
class WorkScheduleDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time_id' => $this->faker->numberBetween(1, 5),
            'work_schedules_id' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
