<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Termination extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'note',
    'exit',
    'user_id',
  ];

  protected $casts = [
    'id' => 'integer',
    'exit' => 'date',
    'user_id' => 'integer',
    'note' => 'string',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public static function getForm(): array
  {
    return [
      Section::make('Details')
      ->columns(2)
        ->schema([
          Select::make('user_id')
            ->label('User')
            ->options(
              User::query()
                ->select(['id', 'firstname', 'name'])
                ->get()
                ->mapWithKeys(function ($user) {
                  $displayName = trim("{$user->firstname} {$user->name}");
                  return [$user->id => $displayName ?: 'N/A'];
                })
                ->toArray()
            )
            ->searchable()
            ->preload()
            ->required(),
          DatePicker::make('exit')
            ->required(),
        ]),

      RichEditor::make('note')
        ->maxLength(65535)
        ->columnSpanFull(),
    ];
  }
}
