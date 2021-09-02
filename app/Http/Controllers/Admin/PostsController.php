<?php

namespace App\Http\Controllers\Admin;

use App\Actions\PostAction;
use App\Actions\MediaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreatePostRequest;
use App\Http\Requests\Projects\UpdatePostRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\Tag;
use App\Query\PostQueries;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostQueries::all();
        return view('admin.posts.index')
            ->with('posts', PostQueries::all())
            ->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function store(Request $request, PostAction $postAction, MediaAction $mediaAction)
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
                session()->flash('error', $validator->messages()->first());
                return redirect()->back();
            }
            //get Featured image
            $image = $request->file('image');
            //create post;
            $post = $postAction->create($request);
            //store featured image media;
            $media = $mediaAction->post($image, $post->id, $image->getClientOriginalName() . ' Image for ' . $post->title . ' Post Content');
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
            session()->flash('success', 'Post created successfully');
            // redirect the user
            return redirect()->back();
        } catch (Exception $e) {
            //Exception $th;
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
    public function edit(Post $post)
    {
        return view('admin.posts.create')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                session()->flash('error', $validator->messages()->first());
                return redirect()->back();
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
            session()->flash('success', 'Post created successfully');
            // redirect the user
            return redirect()->back();
        } catch (Exception $e) {
            //Exception $th;
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
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully');
        return redirect(route('admin.post.index'));
    }

    /**
     * Display a list of all trashed posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('admin.posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->deleteImage();
        $post->restore();

        session()->flash('success', 'Post restored successfully');
        return redirect(route('admin.posts.index'));
    }
}
