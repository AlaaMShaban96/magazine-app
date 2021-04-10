<?php

namespace App\Models;

use App\Models\Rating;
use App\Models\Country;
use App\Models\Corporation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Magazine extends Model
{
    use HasFactory;
    protected $fillable = ['name','corporation_id','rating_id','country_id'];

    public function corporation(): BelongsTo
    {
        return $this->belongsTo(Corporation::class);
    }
    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
