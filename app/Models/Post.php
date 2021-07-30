<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'published_at' => 'date:Y-m-d'
    ];
    protected $fillable = ['title','slug','description','category_id','content','image','image_url','published_at','github_url','playstore_url','appstore_url','web_url'];

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

    public function userPost()
    {
        $userID = Auth::user();
        return $this->post->where('user_id','Like', "%{$userID}%");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderby('id','DESC');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
