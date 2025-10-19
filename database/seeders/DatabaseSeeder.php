<?php

namespace Database\Seeders;

use App\Models\Guide;
use App\Models\HuntingBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Guide::factory(15)->create();
        HuntingBooking::factory(15)->create();
    }
}
