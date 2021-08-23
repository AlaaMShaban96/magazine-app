<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // use HasFactory;
    protected $fillable = ['name'];
    /**
     * Get all of the Magazine for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function magazine()
    {
        return $this->hasMany(Magazine::class);
    }

}
