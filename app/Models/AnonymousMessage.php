<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnonymousMessage extends Model
{
    const PUBLISHED = 1;
    const NOT_PUBLISHED = 0;

    protected $guarded = [];
    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];
    protected $fillable = ['published', 'content'];
}
