<?php

namespace App\Filament\Resources\TerminationResource\Pages;

use App\Filament\Resources\TerminationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTerminations extends ListRecords
{
    protected static string $resource = TerminationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
