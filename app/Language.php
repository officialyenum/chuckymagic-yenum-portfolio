<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['image','name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
