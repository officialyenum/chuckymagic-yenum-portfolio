<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'published_at' => 'date:Y-m-d'
    ];
    protected $fillable = ['title','slug','description','category_id','content','featured_image','published_at','github_url','playstore_url','appstore_url','web_url'];

    public function deleteImage()
    {
        //for local storage
        // Storage::delete($this->image);
        //for amazon s3 storage
        Storage::disk('s3')->delete($this->featured_image);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public function contentMedia()
    {
        # code...
        return $this->hasMany(Media::class,'post_content_id')->orderby('id','DESC');
    }

    public function myPosts()
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
