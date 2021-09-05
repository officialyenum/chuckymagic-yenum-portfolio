<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
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
        return $this->belongsToMany(Post::class);
    }
}
