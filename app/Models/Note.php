<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    // public  $title=['not_working', 'incomplete','wrong_info','other','note'];
    protected $fillable = ['title','body','number_id','user_id'];

    /**
     * Get the user that owns the Note
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function number()
    {
        return $this->belongsTo(Number::class);
    }

       
}
