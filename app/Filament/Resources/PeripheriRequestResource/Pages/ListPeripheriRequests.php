<?php

namespace App\Filament\Resources\PeripheriRequestResource\Pages;

use App\Filament\Resources\PeripheriRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeripheriRequests extends ListRecords
{
    protected static string $resource = PeripheriRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
