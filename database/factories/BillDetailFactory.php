<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Booking;
use App\Models\Service;
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
         // Lấy ngẫu nhiên một booking và service từ database để sử dụng booking_id và service_id
				 $billId = Bill::inRandomOrder()->first()->id;
				 $serviceId = Service::inRandomOrder()->first()->id;
 
				 // Lấy name từ booking_id
				 $billName = Bill::find($billId)->name;
 
				 // Lấy price từ service_id
				 $servicePrice = Service::find($serviceId)->price;
 
				 return [
						 'service_id' => $serviceId,
						 'name' => $billName,
						 'price' => $servicePrice,
						 'bill_id' => $billId,
				 ];
    }
}
