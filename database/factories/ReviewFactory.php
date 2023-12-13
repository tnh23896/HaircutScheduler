<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
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

        // Tạo booking_id duy nhất
        $uniqueBookingId = Booking::inRandomOrder()
            ->whereNotIn('id', Review::pluck('booking_id')->toArray())
            ->first()->id;

        // Tạo comment tiếng Việt có nghĩa và độ dài dưới 200 kí tự
        $comment = $this->faker->realText(200, 2);

        return [
            'star' => $this->faker->numberBetween(4, 5),
            'comment' => $comment,
            'user_id' => $userId,
            'admin_id' => $adminId,
            'booking_id' => $uniqueBookingId,
        ];
    }
}
