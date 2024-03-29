<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peripheri extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public function peripheriRequestItems(): HasMany
    {
        return $this->hasMany(PeripheriRequestItem::class);
    }
}
