<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function Children(){
        return $this->belongsTo(Children::class);
    }

    protected $fillable  = ['name','decription','activity','prize','nivel','children_id'];

}
