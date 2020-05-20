<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::orderBy('id', 'DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        dd($request->content);
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('projects', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'projects',
            's3'
        );
        Tag::create([
            'image' => $image,
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag Created Successfully');

        return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //method 1
        //$category->name = $request->name;
        //$category->save();

        //method 2
        $tag->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag Updated Successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->projects->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted because it has some projects');

            return redirect()->back();
        }
        $tag->delete();

        session()->flash('success', 'Tag deleted sucessfully');

        return redirect(route('tags.index'));
    }
}
