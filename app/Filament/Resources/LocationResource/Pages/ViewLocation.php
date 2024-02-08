<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use App\Models\Location;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLocation extends ViewRecord
{
  protected static string $resource = LocationResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\EditAction::make()
        ->slideOver()
        ->form(Location::getForm())
    ];
  }
}
