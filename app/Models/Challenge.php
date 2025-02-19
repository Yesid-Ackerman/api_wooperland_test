<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function children(){
        return $this->belongsTo(Children::class);
    }

    protected $fillable  = ['name','description','activity','prize','nivel','children_id'];

}
