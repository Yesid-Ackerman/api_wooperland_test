<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App/Models/User');
    }

    public function level(){
        return $this->belongsTo('App/Models/Levels');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level_id',
        'user_id',
    ];
}
