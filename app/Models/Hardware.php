<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hardware extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'isPublic',
    ];
    protected $casts = [
        'id' => 'integer',
        'isPublic' => 'boolean',
    ];

    public function hardwareRequestItems(): HasMany
    {
        return $this->hasMany(HardwareRequestItem::class);
    }
}
