<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','image_url','published_at','category_id','user_id','github_url','playstore_url','appstore_url','web_url'];

    public function deleteImage()
    {
        //for local storage
        Storage::delete($this->image);
        //for amazon s3 storage
        //Storage::disk('s3')->delete($this->image);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * check if post has tag
     *
     * @return bool
     *
     */

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    /**
     * check if post has sub category
     *
     * @return bool
     *
     */

    public function hasSubcategory($subCategoryId)
    {
        return in_array($subCategoryId, $this->subcategories->pluck('id')->toArray());
    }

    /**
     * check if post has language
     *
     * @return bool
     *
     */

    public function hasLanguage($languageId)
    {
        return in_array($languageId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query;
        }

        return $query->where('title', 'LIKE', "%{$search}%");
    }

    public function userProject()
    {
        $userID = Auth::user();
        return $this->project->where('user_id','Like', "%{$userID}%");
    }
}
