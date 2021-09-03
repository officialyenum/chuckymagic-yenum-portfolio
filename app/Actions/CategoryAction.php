<?php

namespace App\Actions;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class CategoryAction
{
    public static function create($request)
    {
        // dd($request);
        return DB::transaction(function () use ($request) {
            //create post;
            $category = new Category();

            $category->title = $request->title;
            $category->slug = Str::slug($request->title);
            $category->description = $request->description;
            $category->save();

            return $category;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $category = Category::find($id);

            $category->title = $request->title ?? $category->title;
            $category->slug = Str::slug($request->title) ?? $category->slug;
            $category->description = $request->description ?? $category->description;
            $category->save();

            return $category;
        });
    }

    public static function updateMedia($url, $category)
    {
        return DB::transaction(function () use ($url, $category) {
            $category->image = $url;
            $category->update();
            return $category;
        });
    }
}
