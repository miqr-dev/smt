<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;



class Phonebook extends Page implements Forms\Contracts\HasForms
{
  use Forms\Concerns\InteractsWithForms;
  use HasPageShield;

  public $selectedUserId;

  protected static ?string $navigationIcon = 'heroicon-o-document-text';
  protected static string $view = 'filament.pages.phonebook';

  protected function getFormSchema(): array
  {
    return [
Select::make('selectedUserId')
    ->label('Select a User')
    ->options(function () {
        // Return an array of options with 'id' => 'Full Name'
        return User::all()->mapWithKeys(function ($user) {
            return [$user->id => $user->firstname . ' ' . $user->name];
        })->toArray();
    })
    ->searchable()
    ->preload()
    ->live()
    ->afterStateUpdated(fn ($state) => $this->selectedUserId = $state),
    ];
  }

  // Add a computed property for user details
  public function getUserDetailsProperty()
  {
    return User::find($this->selectedUserId);
  }
}
