<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategories\CreateSubCategoryRequest;
use App\Http\Requests\SubCategories\UpdateSubCategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subcategories.index')->with('subcategories', SubCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubCategoryRequest $request)
    {
        dd($request->content);
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('projects', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'projects',
            's3'
        );
        SubCategory::create([
            'image' => $image,
            'name' => $request->name
        ]);

        session()->flash('success', 'Sub Category Created Successfully');

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
    public function edit(SubCategory $subcategory)
    {
        return view('subcategories.create')->with('subcategory', $subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory)
    {
        //method 1
        //$category->name = $request->name;
        //$category->save();

        //method 2
        $subcategory->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'SubCategory Updated Successfully');

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->projects->count() > 0) {
            session()->flash('error', 'Sub category cannot be deleted because it has some projects');

            return redirect()->back();
        }
        $subcategory->delete();

        session()->flash('success', 'Sub Category deleted sucessfully');

        return redirect(route('subcategories.index'));
    }
}
