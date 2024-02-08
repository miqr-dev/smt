<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    City::insert([
      ["id" => 1, "region_id" => 1, "name" => "Erfurt"],
      ["id" => 2, "region_id" => 1, "name" => "Suhl"],
      ["id" => 3, "region_id" => 2, "name" => "Leipzig"],
      ["id" => 4, "region_id" => 2, "name" => "Dresden"],
      ["id" => 5, "region_id" => 2, "name" => "Chemnitz"],
      ["id" => 6, "region_id" => 3, "name" => "Berlin"],
      ["id" => 7, "region_id" => 3, "name" => "Berlin2"],
      ["id" => 8, "region_id" => 2, "name" => "Döbeln"],
      ["id" => 9, "region_id" => 2, "name" => "Riesa"]
    ]);
  }
}
