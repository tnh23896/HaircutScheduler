<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Lấy ngẫu nhiên một booking và service từ database để sử dụng booking_id và service_id
        $bookingId = Booking::inRandomOrder()->first()->id;
        $serviceId = Service::inRandomOrder()->first()->id;

        // Lấy name từ booking_id
        $bookingName = Booking::find($bookingId)->name;

        // Lấy price từ service_id
        $servicePrice = Service::find($serviceId)->price;

        return [
            'service_id' => $serviceId,
            'name' => $bookingName,
            'price' => $servicePrice,
            'booking_id' => $bookingId,
            'status' => 'success',
        ];
    }
}
