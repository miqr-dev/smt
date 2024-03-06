<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HardwareRequestItem extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'hardware_id',
        'hardware_request_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hardware_id' => 'integer',
        'hardware_request_id' => 'integer',
    ];

    public function hardware(): BelongsTo
    {
        return $this->belongsTo(Hardware::class);
    }

    public function hardwareRequest(): BelongsTo
    {
        return $this->belongsTo(HardwareRequest::class);
    }
}
