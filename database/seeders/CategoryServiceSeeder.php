<?php

namespace Database\Seeders;

use App\Models\CategoryService;
use Database\Factories\CategoryServiceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryService::factory(5)->create();
        // CategoryServiceFactory::new()->count(5)->create();
    }
}
