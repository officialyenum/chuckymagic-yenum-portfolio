<?php

namespace App\Actions;

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
    public static function create($request)
    {
        // dd($request);
        return DB::transaction(function () use ($request) {
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

            return $post;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $post = POST::find($id);

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

            return $post;
        });
    }

    public static function updateMedia($url, $post)
    {
        return DB::transaction(function () use ($url, $post) {
            $post->featured_image = $url;
            $post->update();
            return $post;
        });
    }

    public static function updateContent($content, $post)
    {
        $detail = $content;
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        //save post content media;
        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/yenum/uploads/post-content/'.time() .'/' . uniqid('', true) . '.' . $mimeType;

                $pathExists = Media::where('path', '=' ,$path)->exists();

                if (!$pathExists) {
                    $contentMedia = MediaAction::postContent($path, $src, $mimeType, $post->id,' Image for' . $post->title . ' Content Post');
                    $image->removeAttribute('src');
                    $image->setAttribute('src', $contentMedia->url);
                }
            }
        }

        return DB::transaction(function () use ($detail, $dom, $post) {
            $detail = $dom->savehtml();
            $post->content = $detail;
            $post->update();
        });
    }

    public static function updateTag($tags, $post)
    {
        $post->tags()->attach($tags);
    }
}
