<?php

namespace App\Enums;

enum TicketPriority: String
{
  case Niedrig = 'Niedrig';
  case Normal = 'Normal';
  case Hoch = 'Hoch';


  
  public function getColor(): string
  {
    return match ($this) {
      self::Niedrig => 'gray',
      self::Normal => 'primary',
      self::Hoch => 'danger'
    };
  }
}