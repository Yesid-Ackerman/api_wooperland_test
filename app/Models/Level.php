<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Http\Resources\LevelResourse;

class Level extends Model
{
    use HasFactory;
    protected $fillable =['name','description_level','prize_level','voice_option','level','help_level','score_level','topic_id'];

    protected $allowIncluded = ['topics']; //las posibles Querys que se pueden realizar

    protected $table = 'levels';


    public function topics (){

        return $this->belongsTo(Topic::class);
    }

    /////////////////////////////////////////////
    public function scopeIncluded(Builder $query)
    {

        if(empty($this->allowIncluded)||empty(request('included'))){// validamos que la lista blanca y la variable included enviada a travez de HTTP no este en vacia.
            return;
        }


        $relations = explode(',', request('included')); //['posts','relation2']//recuperamos el valor de la variable included y separa sus valores por una coma

        // return $relations;

        $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']

        foreach ($relations as $key => $relationship) { //recorremos el array de relaciones

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }
        $query->with($relations); //se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included

        //http://api_wooperland_test/api/levels?included=topics


    }

}
