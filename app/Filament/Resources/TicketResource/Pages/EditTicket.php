<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\User;
use Parallax\FilamentComments\Actions\CommentsAction;

class EditTicket extends EditRecord
{
  protected static string $resource = TicketResource::class;




  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make()
        ->label('Done'),
      CommentsAction::make(),
    ];
  }
}
