<?php

namespace App\Filament\Resources\TerminationResource\Pages;

use App\Filament\Resources\TerminationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTermination extends EditRecord
{
    protected static string $resource = TerminationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
