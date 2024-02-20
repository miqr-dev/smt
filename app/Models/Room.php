<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'alt_name',
    'floor',
    'location_id',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'location_id' => 'integer',
  ];

  public static function getForm($locationId = null): array
  {
    return [
      TextInput::make('name')
        ->required()
        ->maxLength(255),
      TextInput::make('alt_name')
        ->required()
        ->maxLength(255),
      TextInput::make('floor')
        ->required()
        ->maxLength(255),
      Select::make('location_id')
        ->hidden(function () use ($locationId) {
          return $locationId !== null;
        })
        ->relationship('location', 'name')
        ->required(),
    ];
  }

  public function location(): BelongsTo
  {
    return $this->belongsTo(Location::class);
  }

  public function getRoomNameAttribute()
  {
    return "{$this->name} ({$this->alt_name})";
  }
}
