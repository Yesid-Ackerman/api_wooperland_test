<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    //CAMPOS QUE ENTRAN EN 'ASIGNACION MASIVA' 
    protected $fillable=['Nombre','Descripcion','Premio', 'level_id', 'children_id'];

    protected $allowIncluded=['Level','Children']; //Posibles Querys que se pueden realizar

    protected $allowFilter = ['id','Nombre','premio','Descripcion']; 
    protected $allSort = ['id','Nombre','premio','Descripcion'];

    public function Level (){
        return $this->belongsTo('App\Models\Level');
    }

    public function Children (){
        return $this->belongsTo('App\Models\Children');
    }
//////////////////////////////////////
//ESCOPE ACHIEVEMENT/LOGROS (HAIVER)
//////////////////////////////////////

    public function scopeIncluded(Builder $query){
        
        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        } 

        $relations = explode(',',request('included'));  

        $allowIncluded = collect ($this->allowIncluded);

        foreach ($relations as $key =>$relationship){

            if(!$allowIncluded->contains($relationship)){
                unset($relations[$key]);
            }
        }
        
        $query->with($relations);

    }



}
