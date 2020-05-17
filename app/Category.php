<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Category extends Model
{
    protected $fillable = ['image','name'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }

    public function hasSubcategory($subCategoryId)
    {
        return in_array($subCategoryId, $this->subcategories->pluck('id')->toArray());
    }
}
