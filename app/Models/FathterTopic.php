<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FathterTopic extends Model
{
    use HasFactory;    

    protected $fillable = ['father_id','topic_id'];
}
