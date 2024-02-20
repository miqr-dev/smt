<?php

namespace Database\Seeders;

use App\Models\Peripheri;
use Illuminate\Database\Seeder;

class PeripheriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peripheri::factory()->count(5)->create();
    }
}
