<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;
    public function Achievements(){
        return $this->hasMany(Achievement::class);
    }

    protected $fillable =['name','description_level','prize_level','voice_option','level','help_level','score_level','topic_id'];

}
