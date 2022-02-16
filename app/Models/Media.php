<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['mimeType','path','url','post_id','category_id','tag_id', 'post_content_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function postContent()
    {
        return $this->belongsTo(Post::class);
    }

    public function deleteImage()
    {
        Storage::disk('s3')->delete($this->image);
    }
}
