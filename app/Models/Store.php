<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    protected $fillable = ['name', 'location'];
    protected $table = 'stores';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
