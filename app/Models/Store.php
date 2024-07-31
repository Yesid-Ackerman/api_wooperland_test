<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'stores';

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
