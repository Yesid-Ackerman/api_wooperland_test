<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenImage extends Model
{
    use HasFactory;
    //CAMPO QUE ENTRAN EN 'ASIGNACION MASIVA'
    protected $fillable =['Imagen', 'exchange_id'];
    protected $allowIncluded=['Exchange'];//Posibles Querys que se pueden realizar

    protected $allowFilter = ['Imagen','id']; 
    protected $allSort = ['Imagen','id'];

    public function Exchange (){
        return $this->belongsTo('App\Models\Exchange');
    }

////////////////////////////////////////////
//ESCOPE CHILDRENIMAGE/NIÑOSIMAGEN (HAIVER)
////////////////////////////////////////////

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
