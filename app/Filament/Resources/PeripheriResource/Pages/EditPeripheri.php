<?php

namespace App\Filament\Resources\PeripheriResource\Pages;

use App\Filament\Resources\PeripheriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeripheri extends EditRecord
{
    protected static string $resource = PeripheriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
