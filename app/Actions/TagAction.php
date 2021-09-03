<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class TagAction
{
    public static function create($request)
    {
        return DB::transaction(function () use ($request) {
            //create tag;
            $tag = new Tag();

            $tag->title = $request->title;
            $tag->slug = Str::slug($request->title);
            $tag->description = $request->description;
            $tag->save();

            return $tag;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $tag = Tag::find($id);

            $tag->title = $request->title ?? $tag->title;
            $tag->slug = Str::slug($request->title) ?? $tag->slug;
            $tag->description = $request->description ?? $tag->description;
            $tag->update();

            return $tag;
        });
    }

    public static function updateMedia($url, $tag)
    {
        return DB::transaction(function () use ($url, $tag) {
            $tag->image = $url;
            $tag->update();
            return $tag;
        });
    }
}
