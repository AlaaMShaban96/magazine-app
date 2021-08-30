<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $table='saved';
    protected $fillable = ['user_id','magazine_id'];

}
