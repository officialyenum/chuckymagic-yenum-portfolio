<?php

namespace App\Action;

use App\Actions\MediaAction;
use App\Models\Media;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class PostAction
{
    public static function create($request, $image)
    {
        //get image;
        return DB::transaction(function ($request, $image) {

            //create post;
            $post = new Post;
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->category_id = $request->category;
            $post->content = "no content yet";
            $post->github_url = $request->github_url ?? null;
            $post->playstore_url = $request->playstore_url ?? null;
            $post->appstore_url = $request->appstore_url ?? null;
            $post->web_url = $request->web_url ?? null;
            $post->published_at = $request->published_at;
            $post->user_id = auth()->user()->id;
            $post->save();
            //save post featured image;
            $media = MediaAction::post($image, $post->id, $image->getClientOriginalName().' Image for'.$post->title.' Post');
            $post->featured_image = $media->url;
            $post->update();

            // get post content images and save
            $detail = $request->content;
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            //save post content media;
            foreach ($images as $count => $image) {
                $src = $image->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $imageFileName = $image->getClientOriginalName();
                    $path = '/yenum/uploads/post-content/'.$imageFileName;
                    $pathExists = Media::where('path', '=' ,$path)->exists();

                    if(!$pathExists){
                        $contentMedia = MediaAction::postContent($src, $post->id, $imageFileName.' Image for'.$post->title.' Post');
                        $image->removeAttribute('src');
                        $image->setAttribute('src', $contentMedia->url);
                    }
                }
            }
            // save post content
            $post->content = $dom->savehtml();
            $post->update();
            // add tags to post
            if ($request->tags) {
                $post->tags()->attach($request->tags);
            }
            return $post;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function ($request, $id) {

            $post = POST::find($id);
            //get image;
            $image = $request->file('image');
            //update post;
            $post->title = $request->title ?? $post->title;
            $post->slug = str_slug($request->title) ?? $post->slug;
            $post->description = $request->description ?? $post->description;
            $post->category_id = $request->category ?? $post->category_id;
            $post->github_url = $request->github_url ?? $post->github_url;
            $post->playstore_url = $request->playstore_url ?? $post->playstore_url;
            $post->appstore_url = $request->appstore_url ?? $post->appstore_url;
            $post->web_url = $request->web_url ?? $post->web_url;
            $post->published_at = Carbon::parse($request->published_at) ?? $post->published_at;
            $post->update();

            //save post featured image;
            $imageFileName = $image->getClientOriginalName();
            $path = '/yenum/uploads/post/'.$imageFileName;
            $pathExists = Media::where('path', '=' ,$path)->exists();
            // update if image exists
            if(!$pathExists){
                $media = MediaAction::post($image, $post->id, $image->getClientOriginalName().' Image for'.$post->title.' Post');
                $post->featured_image = $media->url;
                $post->update();
            }

            // get updated post content images and save
            $detail = $request->content;
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            //save post content media;
            foreach ($images as $count => $image) {
                $src = $image->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $imageFileName = $image->getClientOriginalName();
                    $path = '/yenum/uploads/post-content/'.$imageFileName;
                    $pathExists = Media::where('path', '=' ,$path)->exists();

                    if(!$pathExists){
                        $contentMedia = MediaAction::postContent($src, $post->id, $imageFileName.' Image for'.$post->title.' Post');
                        $image->removeAttribute('src');
                        $image->setAttribute('src', $contentMedia->url);
                    }
                }
            }
            // save post content
            $post->content = $dom->savehtml();
            $post->update();
            // add tags to post
            if ($request->tags) {
                $post->tags()->attach($request->tags);
            }
            return $post;
        });
    }
}
