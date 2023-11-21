<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CategoryServiceSeeder::class,
            CategoryBlogSeeder::class,
            BlogSeeder::class,
            ServiceSeeder::class,
            ReviewSeeder::class,
            PromotionSeeder::class,
            TimeSeeder::class,
            LikeSeeder::class,
            UserSeeder::class,
            NotificationSeeder::class,
            BookingSeeder::class,
            BookingDetailSeeder::class,
            WorkScheduleDetailSeeder::class,
            BannerSeeder::class,
            WorkScheduleSeeder::class,
            BillSeeder::class,
            BillDetailSeeder::class,
            ShiftSeeder::class
        ]);
    }
}
