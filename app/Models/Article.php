<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = ['name', 'type', 'cost', 'avatar', 'description', 'id_store'];
    protected $table = 'articles';

    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }

    public function exchanges()
    {
        return $this->hasMany(Exchange::class, 'id_article');
    }
}
