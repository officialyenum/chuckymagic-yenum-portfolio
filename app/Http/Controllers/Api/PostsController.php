<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Query\PostQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Actions\PostAction;
use App\Actions\MediaAction;
use Illuminate\Support\Facades\Validator;

class PostsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostQueries::all();
        return $this->showAll(PostResource::collection($posts), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!$post) {
            # code...
            return $this->errorResponse('This Post is not available', 404);
        }
        return $this->showOne(new PostResource($post), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Post $post)
    // {
    //     //
    // }

    public function update(Request $request, Post $post, PostAction $postAction, MediaAction $mediaAction)
    {
        try {
            //validate input
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255|unique:posts,title',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
                'content' => 'required',
                'category' => 'required',
            ]);
            //check if validation fails
            if ($validator->fails()) {
                return $this->errorResponse($validator->messages()->first(), 422);
            }
            //get Featured image
            $image = $request->file('image');
            //create post;
            $post = $postAction->update($request, $post->id);
            //store featured image media;
            $media = $mediaAction->post($image, $post->id, $image->getClientOriginalName() . ' Image for ' . $post->title . ' Post Content ');
            //update featured image media
            $postAction->updateMedia($media->url, $post);
            // update post content and Media
            $post = $postAction->updateContent($request->content, $post);
            // add tags to post
            if ($request->tags) {
                $postAction->updateTag($request->tags,$post);
                // $post->tags()->attach($request->tags);
            }
            // flash the message
            // session()->flash('success', 'Post created successfully');
            // redirect the user
            return $this->showMessage('Post created successfully', 201);
        } catch (Exception $e) {
            //Exception $th;
            return $this->errorResponse($e->getMessage(),$e->getStatusCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
