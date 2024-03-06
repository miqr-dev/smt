<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HardwareRequest extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  protected $casts = [
    'id' => 'integer',
  ];

  public function ticketable(): MorphTo
  {
    return $this->morphTo();
  }

  public function hardwareRequestItems(): HasMany
  {
    return $this->hasMany(HardwareRequestItem::class);
  }

  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }
  public function location(): BelongsTo
  {
    return $this->belongsTo(Location::class);
  }
  public function room(): BelongsTo
  {
    return $this->belongsTo(Room::class);
  }
  protected $appends = ['itemsCount'];

  public function getItemsCountAttribute()
  {
    return $this->hardwareRequestItems->count();
  }
  public function getItemsDetailsAttribute()
  {
    return $this->hardwareRequestItems->load('hardware')->map(function ($item) {
      $hardwareName = $item->hardware ? $item->hardware->name : 'N/A';
      return "{$hardwareName} -> {$item->quantity}";
    })->join(' || ');
  }
}
