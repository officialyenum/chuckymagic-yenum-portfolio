<?php

namespace App\Action;

use App\Models\Media;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class UserQueries
{
    public static function all()
    {
        return User::latest()->paginate(50);
        // return DB::table('users')->get();
    }

    public static function administrators()
    {
        return User::latest()
            ->where('role_id', User::ROLE_SUPERADMIN)
            ->orWhere('role_id', User::ROLE_ADMIN)
            ->get();
    }

    public static function writers()
    {
        return User::latest()
            ->where('role_id', User::ROLE_WRITER)
            ->paginate(50);
    }

    public static function guests()
    {
        return User::latest()
            ->where('role_id', User::ROLE_USER)
            ->paginate(50);
    }

    public static function trashed()
    {
        return User::onlyTrashed()->get();
    }

    public static function getOne($id)
    {
        return User::find($id);
    }

    public static function roles()
    {
        return Role::cursor();
    }

    public static function countAll()
    {
        return DB::table('users')->count();
    }

    public static function todayViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereDay('created_at',Carbon::today());
                    })
                    ->sum('count');
    }

    public static function weekViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereBetween('created_at',[ Carbon::now()->subWeek(1), Carbon::now()]);
                    })
                    ->sum('count');
    }

    public static function monthViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereMonth('created_at',Carbon::now()->month());
                    })
                    ->sum('count');
    }

    public static function create($request)
    {
        //Save Featured Image
        $image = $request->file('image');
        $imageFileName = $image->getClientOriginalName();
        $s3 = Storage::disk('s3');
        $filePath = '/yenum/uploads/'.$imageFileName;

        $s3->put($filePath, file_get_contents($image), 'public');

        $media = new Media;
        $media->mimeType = $request->file('image')->getMimeType();
        $media->image = $request->file('image')->getClientOriginalName();
        $media->url = $s3->url($filePath);
        $slug = Str::slug($request->title);

        $post = Post::Create([
            'title' => $request->title,
            'slug' => $slug,
            'description'=> $request->description,
            'content' => 'no content',
            'image' => basename($image),
            'image_url' => $s3->url($filePath),
            'category_id' => $request->category,
            'user_id' => Auth::id(),
            'github_url' => $request->github_url,
            'playstore_url' => $request->playstore_url,
            'appstore_url' => $request->appstore_url,
            'web_url' => $request->web_url,
            'published_at' => Carbon::parse($request->published_at),
        ]);
        $post->save();
        $media->post_id = $post->id;
        $media->user_id = Auth::id();
        $media->save();

        // get post content images and save
        $detail = $request->content;
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $imageFileName = $image->getClientOriginalName();
                $path = '/yenum/uploads/'.$imageFileName;
                $pathExists = Media::where('url', '=' ,$s3->url($path))->exists();
                if(!$pathExists){
                    $s3->put($path, file_get_contents($src), 'public');
                    $image->removeAttribute('src');
                    $image->setAttribute('src', Storage::disk('s3')->url($path));
                    $contentMedia = new Media;
                    $contentMedia->mimeType = $mimeType;
                    $contentMedia->image = $path;
                    $contentMedia->url = $s3->url($path);
                    $contentMedia->post_content_id = $post->id;
                    $contentMedia->user_id = Auth::id();
                    $contentMedia->save();
                }
            }
        }
        // save post content
        $detail = $dom->savehtml();
        $post->content = $detail;
        $post->save();
        // add tags to post
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return $post;
    }
}
