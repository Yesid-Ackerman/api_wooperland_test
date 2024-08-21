<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    //CAMPOS QUE ENTRAN EN 'ASIGNACION MASIVA' 
    protected $fillable=['Nombre', 'Descripcion', 'Dificultad'];
}
