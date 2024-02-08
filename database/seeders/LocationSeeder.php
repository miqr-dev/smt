<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Location::insert([
      ["id" => 1, "city_id" => 1, "name" => "Heinrichstrasse 89"],
      ["id" => 2, "city_id" => 1, "name" => "Heinrichstrasse 92"],
      ["id" => 3, "city_id" => 1, "name" => "Ottostrasse 35"],
      ["id" => 4, "city_id" => 1, "name" => "Barbarossahof 4/5"],
      ["id" => 5, "city_id" => 1, "name" => "Barbarossahof 2"],
      ["id" => 6, "city_id" => 1, "name" => "Barbarossahof 18"],
      ["id" => 7, "city_id" => 1, "name" => "Barbarossahof 1"],
      ["id" => 8, "city_id" => 2, "name" => "Puschkinstrasse 1"],
      ["id" => 9, "city_id" => 2, "name" => "Blücherstrasse 6"],
      ["id" => 10, "city_id" => 3, "name" => "Landsberger Strasse 23"],
      ["id" => 11, "city_id" => 3, "name" => "Landsberger Strasse 4"],
      ["id" => 12, "city_id" => 3, "name" => "Franz-Mehring-Strasse 3"],
      ["id" => 13, "city_id" => 4, "name" => "Löscherstrasse 16"],
      ["id" => 14, "city_id" => 4, "name" => "Mendelssohnallee 8"],
      ["id" => 15, "city_id" => 4, "name" => "Glashütter Strasse 101"],
      ["id" => 16, "city_id" => 4, "name" => "Glashütter Strasse 101A"],
      ["id" => 17, "city_id" => 5, "name" => "Parkstrasse 28"],
      ["id" => 18, "city_id" => 5, "name" => "Barbarossastrasse 2"],
      ["id" => 19, "city_id" => 6, "name" => "Trachenbergring 93"],
      ["id" => 20, "city_id" => 7, "name" => "Prenlauer Promenade 28"]
    ]);
  }
}
