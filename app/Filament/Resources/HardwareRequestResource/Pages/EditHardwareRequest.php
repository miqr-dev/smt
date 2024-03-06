<?php

namespace App\Filament\Resources\HardwareRequestResource\Pages;

use App\Filament\Resources\HardwareRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHardwareRequest extends EditRecord
{
    protected static string $resource = HardwareRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
