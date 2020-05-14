<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['image','name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
