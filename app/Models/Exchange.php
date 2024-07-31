<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    public function Children_Images (){
        return $this->belongsTo('App\Models\ChildrenImage');
    }
}
