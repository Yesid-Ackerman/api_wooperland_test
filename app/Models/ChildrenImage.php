<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenImage extends Model
{
    use HasFactory;
    //CAMPO QUE ENTRAN EN 'ASIGNACION MASIVA'
    protected $fillable =['Imagen', 'exchange_id'];



    public function Exchange (){
        return $this->hasMany('App\Models\Exchange');
    }
}
