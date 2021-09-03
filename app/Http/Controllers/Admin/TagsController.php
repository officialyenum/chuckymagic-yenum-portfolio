<?php

namespace App\Http\Controllers\Admin;

use App\Actions\MediaAction;
use App\Actions\TagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Models\Tag;
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
    public function store(Request $request, TagAction $tagAction, MediaAction $mediaAction)
    {
        try {
            //validate input
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|unique:tags,title',
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
            $tag = $tagAction->create($request);
            //store category image
            $media = $mediaAction->tag($image, $tag->id, $image->getClientOriginalName() . ' Image for ' . $tag->title . ' Tag');
            //update featured image
            $tagAction->updateMedia($media->url, $tag);
            // flash the message
            session()->flash('success', 'Tag created successfully');
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
    public function update(Request $request, Tag $tag, TagAction $tagAction, MediaAction $mediaAction)
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
            //update tag
            $tag = $tagAction->update($request, $tag->id);
            //store tag image
            $media = $mediaAction->tag($image, $tag->id, $image->getClientOriginalName() . ' Image for ' . $tag->title . ' Tag');
            //update featured image
            $tagAction->updateMedia($media->url, $tag);
            //flash the message
            session()->flash('success', 'Tag Updated successfully');
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
    public function destroy(Tag $tag)
    {
        if ($tag->projects->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted because it has some projects');

            return redirect()->back();
        }
        $tag->deleteImage();
        $tag->delete();

        session()->flash('success', 'Tag deleted sucessfully');

        return redirect(route('tags.index'));
    }
}
