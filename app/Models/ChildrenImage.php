<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenImage extends Model
{
    use HasFactory;

    public function Exchange (){
        return $this->hasMany('App\Models\Exchange');
    }
}
