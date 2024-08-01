<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Children extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App/Models/User');
    }

  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'age',
        'avatar',
        'time_use',
        'father_id',
    ];

}
