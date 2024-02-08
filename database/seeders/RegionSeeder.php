<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
      $regions = [
            ["id" => 1, "name" => "Thüringen"],
            ["id" => 2, "name" => "Sachsen"],
            ["id" => 3, "name" => "Berlin"],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}