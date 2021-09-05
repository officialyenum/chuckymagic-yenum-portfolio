<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CategoryAction;
use App\Actions\MediaAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('admin.categories.index')->with('categories', Category::orderBy('id', 'DESC')->cursor());
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
    public function store(Request $request, CategoryAction $categoryAction, MediaAction $mediaAction)
    {
        try {
            //validate input
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|unique:categories,title',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            ]);
            //check if validation fails
            if ($validator->fails()) {
                session()->flash('error', $validator->messages()->first());
                return redirect()->back();
            }
            //get Featured image
            $image = $request->file('image');
            //create category
            $category = $categoryAction->create($request);
            //store category image
            $media = $mediaAction->category($image, $category->id, $image->getClientOriginalName() . ' Image for ' . $category->title . ' Category');
            //update featured image
            $categoryAction->updateMedia($media->url, $category);
            // flash the message
            session()->flash('success', 'Category created successfully');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function update(Request $request, Category $category, CategoryAction $categoryAction, MediaAction $mediaAction)
    {

        try {
            //validate input
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|unique:categories,title',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            ]);
            //check if validation fails
            if ($validator->fails()) {
                session()->flash('error', $validator->messages()->first());
                return redirect()->back();
            }
            //get Featured image
            $image = $request->file('image');
            //update category
            $category = $categoryAction->update($request, $category->id);
            //store category image
            $media = $mediaAction->category($image, $category->id, $image->getClientOriginalName() . ' Image for ' . $category->title . ' Category');
            //update featured image
            $categoryAction->updateMedia($media->url, $category);
            // flash the message
            session()->flash('success', 'Category Updated successfully');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->posts->count() > 0) {
            session()->flash('error', 'category cannot be deleted because it has some posts');

            return redirect()->back();
        }
        $category->deleteImage();
        $category->delete();

        session()->flash('success', 'Category deleted sucessfully');

        return redirect(route('categories.index'));
    }
}
