<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		// Lấy ngẫu nhiên một user và admin từ database để sử dụng user_id và admin_id
		$userId = User::inRandomOrder()->first()->id;
		$adminId = Admin::inRandomOrder()->first()->id;
		$time = Time::inRandomOrder()->first()->time;

		// Tạo tên giả mạo giống tên Việt Nam
		$name = $this->faker->firstName('Male') . ' ' . $this->faker->lastName();

		// Tạo ngày ngẫu nhiên từ 1/1/2023 đến 1/11/2023
		$startDate = $this->faker->dateTimeBetween('2023-01-01', '2023-11-01');
		$totalPrice = $this->faker->numberBetween(10, 50) * 10000;
		$phoneNumber = '0' . $this->faker->randomElement(['20', '21', '22', '23', '24', '25', '26', '27', '28', '29'])
			. $this->faker->numberBetween(1000000, 9999999);
		return [
			'name' => $name,
			'user_id' => $userId,
			'admin_id' => $adminId,
			'phone' => $phoneNumber,
			'promo_id' => '',
			'status' => 'success',
			'total_price' => $totalPrice,
			'amount_paid' => 0,
			'email' => $this->faker->email(),
			'day' => $startDate->format('Y-m-d'),
			'time' =>  $time,
			'payment' => 'offline',
		];
	}
}
