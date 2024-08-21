<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name'];
    protected $table = 'stores';

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_store');
    }

    public function scopeIncluded($query)
    {
        // Aquí defines la lógica para aplicar filtros o relaciones
        return $query;
    }
}