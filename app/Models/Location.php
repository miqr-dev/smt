<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'city_id',
  ];

  protected $casts = [
    'id' => 'integer',
    'city_id' => 'integer',
  ];

  public static function getForm($cityId = null): array
  {
    return [
      TextInput::make('name')
        ->required()
        ->maxLength(255),
      Select::make('city_id')
        ->hidden(function () use ($cityId) {
        
          return $cityId !== null;
        })
        ->relationship('city', 'name')
        ->required(),
    ];
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }

  public function rooms(): HasMany
  {
    return $this->hasMany(Room::class);
  }
}
