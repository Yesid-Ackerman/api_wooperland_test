<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    public function Levels (){
        return $this->belongsTo('App\Models\Levels');
    }

    public function Childrens (){
        return $this->belongsTo('App\Models\Children');
    }
}
