<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Location;
use Filament\Forms\Form;
use App\Models\Peripheri;
use Filament\Tables\Table;
use App\Models\PeripheriRequest;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeripheriRequestResource\Pages;
use App\Filament\Resources\PeripheriRequestResource\RelationManagers;

class PeripheriRequestResource extends Resource
{
  protected static ?string $model = PeripheriRequest::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Grid::make()
          ->schema([
            Forms\Components\Grid::make(1)
              ->schema([
                Forms\Components\Select::make('location_id')
                  ->label('Location')
                  ->options(function () {
                    return \App\Models\Location::with('city')
                      ->get()
                      ->mapWithKeys(function ($location) {
                        // Attempt to style the city name with HTML
                        $label = "{$location->name} <span style='color: gray;'>- {$location->city->name}</span>";
                        return [$location->id => $label];
                      });
                  })
                  ->searchable()
                  ->required()
                  ->live()
                  ->afterStateUpdated(fn (callable $set) => $set('room_id', null))
                  ->allowHtml(),
                Forms\Components\Select::make('room_id')
                  ->label('Room')
                  ->options(function (callable $get) {
                    $locationId = $get('location_id');
                    if (!is_null($locationId)) {
                      return \App\Models\Room::query()
                        ->where('location_id', $locationId)
                        ->get()
                        ->pluck('room_name', 'id');
                    }
                    return [];
                  })
                  ->searchable()
                  ->preload()
                  ->required(),
              ])->columnSpan([
                'sm' => 2, // Adjust column span for small screens and up
              ]),
            Forms\Components\Grid::make(1) // This creates another single column for the repeater on the right
              ->schema([
                Forms\Components\Repeater::make('peripheriRequestItems')
                  ->relationship('peripheriRequestItems')
                  ->schema([
                    Forms\Components\Select::make('peripheri_id')
                      ->label('Peripheri')
                      ->options(\App\Models\Peripheri::query()->pluck('name', 'id'))
                      ->searchable()
                      ->required(),
                    Forms\Components\TextInput::make('quantity')
                      ->numeric()
                      ->required()
                      ->label('Quantity'),
                  ])
                  ->minItems(1)
                  ->maxItems(10),
              ])->columnSpan([
                'sm' => 2, // Adjust for small screens and up
              ]),
          ])
          ->columns(4) // Adjust the number of columns in the grid to your preference
      ]);
  }



  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('ticketable_type')
          ->searchable(),
        Tables\Columns\TextColumn::make('ticketable_id')
          ->numeric()
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
        Tables\Actions\EditAction::make(),
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
      'index' => Pages\ListPeripheriRequests::route('/'),
      'create' => Pages\CreatePeripheriRequest::route('/create'),
      'edit' => Pages\EditPeripheriRequest::route('/{record}/edit'),
    ];
  }
}
