<?php

namespace App\Models;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['magazine_id','folder_number'];

    /**
     * Get the Magazine that owns the Folder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
    public function numbers()
    {
        return $this->hasMany(Number::class);
    }
}
