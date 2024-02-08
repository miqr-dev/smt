<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use App\Models\Room;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRoom extends ViewRecord
{
  protected static string $resource = RoomResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\EditAction::make()
        ->slideOver()
        ->form(Room::getForm())
    ];
  }
}
