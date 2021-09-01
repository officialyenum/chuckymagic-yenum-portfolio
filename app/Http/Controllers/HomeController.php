<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    // public function index()
    // {
    //     $search = request()->query('search');
    //     return view('dashboard.index')
    //         ->with('search', $search)
    //         ->with('categories', Category::all())
    //         ->with('tags',Tag::all())
    //         ->with('posts', Post::searched()->simplePaginate(4));
    // }

    public function index()
    {
        // $search = request()->query('search');
        return view('auth.login');
    }

    public function show(Post $post)
    {
        return view('dashboard.show')->with('post',$post);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');
        return view('dashboard.categories')
        ->with('category', $category)
        ->with('search', $search)
        ->with('categories', Category::all())
        ->with('tags',Tag::all())
        ->with('posts', $category->posts()->searched()->simplePaginate(4));
    }

    public function tag(Tag $tag)
    {

        $search = request()->query('search');
            return view('dashboard.tags')
            ->with('tag', $tag)
            ->with('search', $search)
            ->with('categories', Category::all())
            ->with('subcategories',SubCategory::all())
            ->with('languages',Language::all())
            ->with('tags',Tag::all())
            ->with('posts', $tag->posts()->searched()->simplePaginate(4));
    }
}
