<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeripheriRequest extends Model
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
  public function peripheriRequestItems(): HasMany
  {
    return $this->hasMany(PeripheriRequestItem::class);
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
    return $this->peripheriRequestItems->count();
  }
  public function getItemsDetailsAttribute()
  {
    return $this->peripheriRequestItems->load('peripheri')->map(function ($item) {
      $peripheriName = $item->peripheri ? $item->peripheri->name : 'N/A';
      return "{$peripheriName} -> {$item->quantity}";
    })->join(' || ');
  }
}
