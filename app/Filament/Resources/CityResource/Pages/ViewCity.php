<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Models\City;
use Filament\Actions;
use App\Filament\Resources\CityResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Actions as ComponentsActions;

class ViewCity extends ViewRecord
{
    protected static string $resource = CityResource::class;

    protected function getHeaderActions(): array
    {
      return [
        Actions\EditAction::make()
        ->slideOver()
        ->form(City::getForm())
      ];
    }
}
