<?php

namespace App\Filament\Resources\PeripheriRequestResource\Pages;

use App\Filament\Resources\PeripheriRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeripheriRequest extends EditRecord
{
    protected static string $resource = PeripheriRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
