<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['image','name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
