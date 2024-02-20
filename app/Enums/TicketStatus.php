<?php

namespace App\Enums;

use PhpParser\Node\Expr\Cast\String_;

enum Ticketstatus: String
{
  case Nicht_begonnen = 'Nicht begonnen';
  case In_bearbeitung = 'In bearbeitung';
  case Erledigt = 'Erledigt';
  case Duplikat = 'Duplikat';
  case Wartet_ouf_jemand_anderen = 'Wartet auf jemand anderen';



  public function getColor(): string
  {
    return match ($this) {
      self::Nicht_begonnen => 'gray',
      self::In_bearbeitung => 'primary',
      self::Erledigt => 'success',
      self::Duplikat => 'danger',
      self::Wartet_ouf_jemand_anderen => 'warning',
    };
  }
}
