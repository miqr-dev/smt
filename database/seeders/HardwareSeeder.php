<?php

namespace Database\Seeders;

use App\Models\Hardware;
use Illuminate\Database\Seeder;

class HardwareSeeder extends Seeder
{
  public function run(): void
  {
    Hardware::insert([
      ["id" => 1, "name" => "Server", "isPublic" => false, "description" => ""],
      ["id" => 2, "name" => "PC", "isPublic" => true, "description" => ""],
      ["id" => 3, "name" => "Notebook", "isPublic" => true, "description" => ""],
      ["id" => 4, "name" => "Tablet", "isPublic" => true, "description" => ""],
      ["id" => 5, "name" => "Drucker / MFC", "isPublic" => true, "description" => ""],
      ["id" => 6, "name" => "Monitor", "isPublic" => true, "description" => ""],
      ["id" => 7, "name" => "Switch", "isPublic" => false, "description" => ""],
      ["id" => 8, "name" => "Switch (KVM)", "isPublic" => false, "description" => ""],
      ["id" => 9, "name" => "Switch (PoE)", "isPublic" => false, "description" => ""],
      ["id" => 10, "name" => "Router", "isPublic" => false, "description" => ""],
      ["id" => 11, "name" => "AccessPoint", "isPublic" => false, "description" => ""],
      ["id" => 12, "name" => "NAS", "isPublic" => false, "description" => ""],
      ["id" => 13, "name" => "Beamer", "isPublic" => true, "description" => ""],
      ["id" => 14, "name" => "TK-Anlage", "isPublic" => false, "description" => ""],
      ["id" => 15, "name" => "Telefon", "isPublic" => true, "description" => ""],
      ["id" => 16, "name" => "DECT-Station", "isPublic" => false, "description" => ""],
      ["id" => 17, "name" => "Scanner", "isPublic" => true, "description" => ""]
    ]);
  }
}

