<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HardwareRequest;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class HardwareRequestsRelationManager extends RelationManager
{
  protected static string $relationship = 'hardwareRequests';

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('ticketable_id')
          ->required()
          ->maxLength(255),
      ]);
  }

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('id'),
        TextColumn::make('location.city.name')->label('City'),
        TextColumn::make('location.name')->label('Location'),
        TextColumn::make('room.room_name')->label('Room'),
        // Display a count of items or a custom attribute summarizing the items
        TextColumn::make('itemsDetails')->label('Request')->wrap(),

        // Optionally, add a column to view details. Adjust according to your needs.
      ])
        ->actions([
            Tables\Actions\DeleteAction::make()
                ->action(fn (HardwareRequest $record) => $record->delete())
                ->requiresConfirmation()
                ->color('danger')
                ->icon('heroicon-o-trash'),
        ])
        ->paginated(false);
  }


  public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
  {
    return $ownerRecord->type === "Hardware Anfrage";
  }
}
