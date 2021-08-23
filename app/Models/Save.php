<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $table='seved';

    use HasFactory;
    protected $fillable = ['user_id','magazine_id'];

}
