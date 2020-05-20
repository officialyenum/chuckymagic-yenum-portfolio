<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::orderBy('id', 'DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        dd($request->content);
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('projects', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'projects',
            's3'
        );
        Category::create([
            'image' => $image,
            'name' => $request->name
        ]);

        session()->flash('success', 'Category Created Successfully');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //method 1
        //$category->name = $request->name;
        //$category->save();

        //method 2
        $category->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category Updated Successfully');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->projects->count() > 0) {
            session()->flash('error', 'category cannot be deleted because it has some posts');

            return redirect()->back();
        }
        $category->delete();

        session()->flash('success', 'Category deleted sucessfully');

        return redirect(route('categories.index'));
    }
}
