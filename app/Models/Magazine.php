<?php

namespace App\Models;

use App\Models\Save;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Corporation;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Magazine extends Model
{
    use HasFactory ,Filterable;

    protected $fillable = ['name','call_by','image','available','status','corporation_id','rating_id','country_id','chosen'];

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }
    public function saveMagazine()
    {
        return $this->belongsToMany(Save::class);
    }
    public function numbers()
    {
        return $this->hasManyThrough(Number::class,Folder::class);
    }
}
