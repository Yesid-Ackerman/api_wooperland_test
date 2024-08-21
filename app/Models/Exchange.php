<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exchange extends Model
{
    protected $fillable = ['description', 'id_children', 'id_article'];
    protected $table = 'exchanges';

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }

    public function children()
    {
        return $this->belongsTo(Children::class, 'id_children');
    }
}
