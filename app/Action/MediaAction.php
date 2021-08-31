<?php

namespace App\Actions;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaAction
{
    public static function post($image, $id, $description)
    {
        DB::transaction(function () use ($image, $id, $description) {

            $filename = $image->getClientOriginalName();
            $s3 = Storage::disk('s3');
            $path = '/yenum/uploads/post/'.$filename;

            $media = new Media();
            $media->title = $filename;
            $media->slug = Str::slug($filename);
            $media->url = $s3->url($path);
            $media->path = $path;
            $media->description = $description;
            $media->size = $image->getSize();
            $media->mimeType = $image->getMimeType();
            $media->post_id = $id;
            $media->user_id = Auth::id();
            $media->save();
            return $media;
        });
    }

    public static function category($image, $id, $description)
    {
        DB::transaction(function () use ($image, $id, $description) {
            $filename = $image->getClientOriginalName();
            $s3 = Storage::disk('s3');
            $path = '/yenum/uploads/category/'.$filename;

            $media = new Media();
            $media->title = $filename;
            $media->slug = Str::slug($filename);
            $media->url = $s3->url($path);
            $media->path = $path;
            $media->description = $description;
            $media->size = $image->getSize();
            $media->mimeType = $image->getMimeType();
            $media->category_id = $id;
            $media->user_id = Auth::id();
            $media->save();
            return $media;
        });
    }

    public static function tag($image, $id, $description)
    {
        DB::transaction(function () use ($image, $id, $description) {
            $filename = $image->getClientOriginalName();
            $s3 = Storage::disk('s3');
            $path = '/yenum/uploads/tag/'.$filename;

            $media = new Media();
            $media->title = $filename;
            $media->slug = Str::slug($filename);
            $media->url = $s3->url($path);
            $media->path = $path;
            $media->description = $description;
            $media->size = $image->getSize();
            $media->mimeType = $image->getMimeType();
            $media->tag_id = $id;
            $media->user_id = Auth::id();
            $media->save();
            return $media;
        });
    }

    public static function postContent($image, $id, $description)
    {
        DB::transaction(function () use ($image, $id, $description) {
            $filename = $image->getClientOriginalName();
            $s3 = Storage::disk('s3');
            $path = '/yenum/uploads/post-content/'.$filename;

            $media = new Media();
            $media->title = $filename;
            $media->slug = Str::slug($filename);
            $media->url = $s3->url($path);
            $media->path = $path;
            $media->description = $description;
            $media->size = $image->getSize();
            $media->mimeType = $image->getMimeType();
            $media->post_content_id = $id;
            $media->user_id = Auth::id();
            $media->save();
            return $media;
        });
    }
}
