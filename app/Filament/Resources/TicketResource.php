<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ticket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\TicketStatus;
use App\Enums\TicketPriority;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\TicketResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketResource\RelationManagers;
use Filament\Forms\Components\Group;
use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;

class TicketResource extends Resource
{
  protected static ?string $model = Ticket::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Fieldset::make('Status')
          ->schema([
            Forms\Components\Grid::make()
              ->schema([
                Forms\Components\Select::make('status')
                  ->enum(TicketStatus::class)
                  ->options(TicketStatus::class)
                  ->columnSpan(3),
                Forms\Components\Select::make('priority')
                  ->enum(TicketPriority::class)
                  ->options(TicketPriority::class)
                  ->columnSpan(2),
                Forms\Components\Select::make('assignedTo_id')
                  ->label('Zugewiesen an')
                  ->options(function () {
                    return \App\Models\User::role('super_admin')->pluck('name', 'id');
                  })
                  ->columnSpan(2),
                Forms\Components\Toggle::make('onLocation')
                  ->required()
                  ->columnSpan(2),
                Forms\Components\DateTimePicker::make('created_at')
                  ->format('d.m.Y H:i') // Set your desired format here
                  ->label('Created At')
                  ->readOnly()
                  ->columnSpan(3),
              ])
              ->columns(12),
          ]),

        Fieldset::make('Contact')
          ->hiddenOn('create')
          ->disabledOn('edit')
          ->dehydrated()
          ->relationship('ticketSubmitter')
          ->schema([
            Forms\Components\Grid::make()
              ->schema([
                Forms\Components\TextInput::make('fullname')->columnSpan(6),
                Forms\Components\TextInput::make('street')->columnSpan(6),
                Forms\Components\TextInput::make('email')->email()->columnSpan(12),
                Forms\Components\TextInput::make('tel')->tel()->columnSpan(6),
                Forms\Components\TextInput::make('customPhone')->tel()->columnSpan(6),
              ])
              ->columns(12),
          ])
          ->columnSpan(6), 

        Fieldset::make('Interne Notizen')
          ->schema([
            Forms\Components\Textarea::make('it_notes')
              ->hiddenLabel()
              ->columnSpan(12)
              ->rows(10),
          ])
          ->columnSpan(6), // Takes up the other half of the width of the form
      ])
      ->columns(12); // Establishes a 12-column layout for the form
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('ticketSubmitter.full_name')
          ->sortable(),
        Tables\Columns\TextColumn::make('type')
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
        Tables\Actions\EditAction::make()
          ->slideover(),
        // Tables\Actions\ViewAction::make()
        //   ->slideover(),
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
      RelationManagers\PeripheriRequestsRelationManager::class,
      RelationManagers\HardwareRequestsRelationManager::class,
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTickets::route('/'),
      'create' => Pages\CreateTicket::route('/create'),
      'edit' => Pages\EditTicket::route('/{record}/edit'),
      // 'view' => Pages\ViewTicket::route('/{record}'),
    ];
  }
}
