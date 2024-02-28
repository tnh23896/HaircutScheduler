<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->call([
			BookingSeeder::class,
			BookingDetailSeeder::class,
			BillSeeder::class,
			BillDetailSeeder::class,
			ReviewSeeder::class,
		]);
	}
}
