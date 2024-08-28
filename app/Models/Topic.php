<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public function Fathers (){
        return $this->belongsToMany(Father::class);
    }

    public function levels (){
        return $this->hasMany(Level::class);
    }
}
