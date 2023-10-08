<?php

namespace Database\Seeders;

use App\Models\Work_schedule_detail;
use App\Models\WorkScheduleDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkScheduleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkScheduleDetail::factory(40)->create();
    }
}
