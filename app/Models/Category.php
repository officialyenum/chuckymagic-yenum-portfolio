<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Category extends Model
{
    protected $fillable = ['image','title', 'description'];

    public function deleteImage()
    {
        //for local storage
        // Storage::delete($this->image);
        //for amazon s3 storage
        Storage::disk('s3')->delete($this->image);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
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
