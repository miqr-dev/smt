<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    public function getHeaderActions(): array
    {
      return [
      Actions\EditAction::make()
      ->slideOver()
      ->form(User::getForm())
      ];
    }
}

