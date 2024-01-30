<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Termination;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TerminationResource\Pages;
use App\Filament\Resources\TerminationResource\RelationManagers;

class TerminationResource extends Resource
{
  protected static ?string $model = Termination::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema(Termination::getForm());
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('user.name')
          ->label('Full Name')
          ->formatStateUsing(function ($state, $record) {
            return $record->user->firstname . ' ' . $record->user->name;
          })
          ->searchable(),
        Tables\Columns\TextColumn::make('user.location')
          ->label('Standort')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('user.position')
          ->label('position')
          ->searchable(),
        Tables\Columns\TextColumn::make('user.department')
          ->label('department')
          ->searchable(),
        Tables\Columns\TextColumn::make('exit')
          ->sortable()
          ->formatStateUsing(function ($state) {
            $exitDate = Carbon::parse($state);
            $formattedDate = $exitDate->format('d-m-Y');

            $today = Carbon::today();
            $oneWeekAway = $today->copy()->addWeek();
            $oneMonthAway = $today->copy()->addMonth();

            if ($exitDate->lessThanOrEqualTo($oneWeekAway)) {
              return "<span style='color: red;'>$formattedDate</span>";
            } elseif ($exitDate->lessThanOrEqualTo($oneMonthAway)) {
              return "<span style='color: orange;'>$formattedDate</span>";
            } else {
              return "<span style='color: blue;'>$formattedDate</span>";
            }
          })
          ->html(),
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
        Tables\Filters\TrashedFilter::make(),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
          Tables\Actions\ForceDeleteBulkAction::make(),
          Tables\Actions\RestoreBulkAction::make(),
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
      'index' => Pages\ListTerminations::route('/'),
      'create' => Pages\CreateTermination::route('/create'),
      'edit' => Pages\EditTermination::route('/{record}/edit'),
    ];
  }

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()
      ->withoutGlobalScopes([
        SoftDeletingScope::class,
      ]);
  }
}
