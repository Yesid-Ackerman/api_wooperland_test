<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Children extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App/Models/User');
    }

    public function achievements(){
        return $this->hasMany('App/Models/Achievement');
    }
  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'age',
        'nickname',
        'user_id',
    ];

    protected $allowIncluded = ['user', 'users.reports']; //las posibles Querys que se pueden realizar

     
    /////////////////////////////////////////////////////////////////////////////
    public function scopeIncluded(Builder $query)
    {
       
        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        }

        
        $relations = explode(',', request('included')); 
        $allowIncluded = collect($this->allowIncluded); 

        foreach ($relations as $key => $relationship) { 

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }
        $query->with($relations); 



    }

    //return $relations;
    // return $this->allowIncluded;

    ///////////////////////////////////////////////////////////////////////////////////////////

}
