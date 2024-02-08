<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
      return [
        'all' => Tab::make('All Cities'),
        'erfurt' => Tab::make('Erfurt')
        ->modifyQueryUsing(function($query) {
          return $query->where('Location','Erfurt');
        }),
        'suhl' => Tab::make('Suhl')
        ->modifyQueryUsing(function($query) {
          return $query->where('Location','Suhl');
        })
      ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
