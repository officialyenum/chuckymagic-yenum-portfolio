<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['mimeType','path','url','post_id','category_id','tag_id', 'post_content_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteImage()
    {
        Storage::disk('s3')->delete($this->image);
    }
}
