<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Language;
use App\Project;
use App\SubCategory;
use App\Tag;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        $search = request()->query('search');
        return view('dashboard.index')
            ->with('search', $search)
            ->with('categories', Category::all())
            ->with('subcategories',SubCategory::all())
            ->with('languages',Language::all())
            ->with('tags',Tag::all())
            ->with('projects', Project::searched()->simplePaginate(4));
    }

    public function show(Project $project)
    {
        return view('dashboard.show')->with('project',$project);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');
        return view('dashboard.categories')
        ->with('category', $category)
        ->with('search', $search)
        ->with('categories', Category::all())
        ->with('subcategories',SubCategory::all())
        ->with('languages',Language::all())
        ->with('tags',Tag::all())
        ->with('projects', $category->projects()->searched()->simplePaginate(4));
    }

    public function subcategory(SubCategory $subcategory)
    {
        $search = request()->query('search');
        return view('dashboard.categories')
        ->with('subcategory', $subcategory)
        ->with('search', $search)
        ->with('categories', Category::all())
        ->with('subcategories',SubCategory::all())
        ->with('languages',Language::all())
        ->with('tags',Tag::all())
        ->with('projects', $subcategory->projects()->orderBy('id', 'DESC')->searched()->simplePaginate(4));
    }

    public function language(Language $language)
    {
        $search = request()->query('search');
        return view('dashboard.categories')
        ->with('language', $language)
        ->with('search', $search)
        ->with('categories', Category::all())
        ->with('subcategories',SubCategory::all())
        ->with('languages',Language::all())
        ->with('tags',Tag::all())
        ->with('projects', $language->projects()->orderBy('id', 'DESC')->searched()->simplePaginate(4));
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
            ->with('projects', $tag->projects()->searched()->simplePaginate(4));
    }
}
