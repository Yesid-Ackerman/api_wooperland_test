<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable =['name','description_level','prize_level','voice_option','level','help_level','score_level','topic_id'];
    protected $table = 'levels';

    public function Achievements (){
        return $this->hasMany('App\Models\Achievement');
    }
}
