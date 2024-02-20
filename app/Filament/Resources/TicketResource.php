<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
  protected static ?string $model = Ticket::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('submitter')
          ->required()
          ->numeric(),
        Forms\Components\TextInput::make('status')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('priority')
          ->required()
          ->maxLength(255),
        Forms\Components\Toggle::make('onLocation')
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('ticketSubmitter.full_name')
          ->numeric()
          ->sortable(),
        Tables\Columns\TextColumn::make('status')
          ->badge()
          ->sortable()
          ->color(function ($state) {
            return $state->getColor();
          }),
        Tables\Columns\TextColumn::make('priority')
          ->badge()
          ->sortable()
          ->color(function ($state) {
            return $state->getColor();
          }),
        Tables\Columns\ToggleColumn::make('onLocation')
          ->label('On Location')
          ->sortable(),
        Tables\Columns\TextColumn::make('created_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('updated_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('deleted_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        //
      ])
      ->actions([
        // Tables\Actions\EditAction::make()
        // ->slideover(),
        Tables\Actions\ViewAction::make()
          ->slideover(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTickets::route('/'),
      'create' => Pages\CreateTicket::route('/create'),
      // 'edit' => Pages\EditTicket::route('/{record}/edit'),
      'view' => Pages\ViewTicket::route('/{record}'),
    ];
  }
}
