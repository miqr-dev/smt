<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
  protected static ?string $model = User::class;

  // protected static ?string $navigationIcon = 'heroicon-o-user-group';

  protected static ?string $navigationGroup = 'Settings';
  public static function getNavigationBadge(): ?string
  {
    return static::getModel()::count();
  }

  public static function form(Form $form): Form
  {
    return $form
      ->schema(User::getForm());
  }

  public static function table(Table $table): Table
  {
    return $table
      ->persistFiltersInSession()
      ->filtersTriggerAction(function ($action) {
        return $action->button()->label('Filters');
      })
      ->columns([
        Tables\Columns\TextColumn::make('fullname')
          ->searchable(),
        Tables\Columns\TextColumn::make('username')
          ->searchable(),
        Tables\Columns\TextColumn::make('department')
          ->searchable(),
        Tables\Columns\TextColumn::make('location')
          ->searchable(),
        Tables\Columns\TextColumn::make('tel')
          ->searchable(),
        Tables\Columns\TextColumn::make('email')
          ->searchable(),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\ViewAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
        Tables\Actions\RestoreBulkAction::make(),
        Tables\Actions\BulkActionGroup::make([]),
      ])
      ->headerActions([
        Tables\Actions\Action::make('export')
          ->tooltip('export the full table')
          ->action(function ($livewire) {
            dd($livewire->getFilteredTableQuery()->count());
          })
      ]);
  }

  public static function infolist(Infolist $infolist): Infolist
  {
    return $infolist
      ->schema([
        Section::make('Info')
          ->columns(3)
          ->schema([
            ImageEntry::make('avatar')
            ->circular()
            ->defaultImageUrl(function ($record){
              return 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . urlencode($record->fullname);
            }),
            TextEntry::make('fullname'),
            TextEntry::make('email'),
            TextEntry::make('location'),
          ])
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      // 'edit' => Pages\EditUser::route('/{record}/edit'),
      'view' => Pages\ViewUser::route('/{record}'),
    ];
  }
}
