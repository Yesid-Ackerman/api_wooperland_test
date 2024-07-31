<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    public function Achievement(){
        return $this->hasMany('App\Models\Achievement');
    }
}
