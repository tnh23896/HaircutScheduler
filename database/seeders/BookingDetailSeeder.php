<?php

namespace Database\Seeders;

use App\Models\Booking_detail;
use Database\Factories\BookingDetailFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
			// BookingDetailFactory::factory(400)->create();
        BookingDetailFactory::new()->count(500)->create();
    }
}
