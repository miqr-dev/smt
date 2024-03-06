<?php

namespace App\Models;

use App\Enums\TicketStatus;
use App\Enums\TicketPriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Parallax\FilamentComments\Models\Traits\HasFilamentComments;

class Ticket extends Model
{
  use HasFactory, SoftDeletes, HasFilamentComments;

  protected $guarded = [];

  protected $casts = [
    'id' => 'integer',
    'submitter_id' => 'integer',
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

  public function ticketSubmitter(): BelongsTo
  {
    return $this->belongsTo(User::class, 'submitter_id')->withTrashed();
  }

  public function hardwareRequests(): MorphMany
  {
    return $this->morphMany(HardwareRequest::class, 'ticketable');
  }
}
