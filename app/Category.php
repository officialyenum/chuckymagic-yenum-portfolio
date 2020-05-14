<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image','name'];

    public function projects()
    {
        return $this->hasMany(Post::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }
}
