<?php

namespace App\Models;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Number extends Model
{
    use HasFactory;
    protected $fillable = ['pdf','folder_id','number','edition'];
    /**
     * Get the Folder that owns the Number
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
     /**
     * Get the reading that owns the Number
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function reading()
    {
        return $this->belongsToMany(User::class,'reading')->withPivot('page_number');
    }
}
