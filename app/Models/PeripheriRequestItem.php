<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeripheriRequestItem extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'peripheri_id',
        'peripheri_request_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'peripheri_id' => 'integer',
        'peripheri_request_id' => 'integer',
    ];

    public function peripheri(): BelongsTo
    {
        return $this->belongsTo(Peripheri::class);
    }

    public function peripheriRequest(): BelongsTo
    {
        return $this->belongsTo(PeripheriRequest::class);
    }
}
