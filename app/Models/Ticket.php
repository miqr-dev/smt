<?php

namespace App\Models;

use App\Enums\TicketStatus;
use App\Enums\TicketPriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

  protected $casts = [
    'id' => 'integer',
    'onLocation' => 'boolean',
    'status' => TicketStatus::class,
    'priority' => TicketPriority::class,
    'type' => 'string',
  ];

  public function peripheriRequests(): MorphMany
  {
    return $this->morphMany(PeripheriRequest::class, 'ticketable');
  }

  public function ticketables(): MorphMany
  {
    return $this->morphMany(Ticketable::class, 'ticketableable');
  }

  public function ticketSubmitter()
  {
    return $this->belongsTo('App\Models\User', 'submitter', 'id')->withTrashed();
  }

  public function getPeripheriRequestItemsAttribute()
  {
    return $this->peripheriRequests->flatMap(function ($peripheriRequest) {
      return $peripheriRequest->peripheriRequestItems;
    });
  }
}
