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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function testStore(CreatePostRequest $request)
    {
        //dd($request->file('image')->store('posts'));
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('posts', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'posts',
            's3'
        );
        //dd(Storage::disk('s3')->url($image));
        //set Image Visibility private
        //Storage::disk('s3')->setVisibility($image,'private');
        //set Image Visibility public
        //Storage::disk('s3')->setVisibility($image,'public');
        // create the post
        $post = Post::Create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'github_url' => $request->github_url,
            'playstore_url' => $request->playstore_url,
            'appstore_url' => $request->appstore_url,
            'web_url' => $request->web_url,
            'featured_image' => Storage::disk('s3')->url($image)
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // flash the message
        session()->flash('success', 'Post created successfully');

        // redirect the user
        return redirect(route('posts.index'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts,title',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'content' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', $validator->messages()->first());
            return redirect()->back();
            // return response()->json(['message' => $validator->messages()->first()], 422);
        }
        try {
            //code...
            $image = $request->file('image');
            // PostAction::create($request, $image);
            //create post;
            $post = new Post;
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->category_id = $request->category;
            $post->content = "no content yet";
            $post->github_url = $request->github_url ?? null;
            $post->playstore_url = $request->playstore_url ?? null;
            $post->appstore_url = $request->appstore_url ?? null;
            $post->web_url = $request->web_url ?? null;
            $post->published_at = $request->published_at;
            $post->user_id = auth()->user()->id;
            $post->save();
            //save post featured image;
            // $media = MediaAction::post($image, $post->id, "New pOST iMAGE");
            $media = MediaAction::post($image, $post->id, $image->getClientOriginalName() . ' Image for' . $post->title . ' Post');
            $post->featured_image = $media->url;
            $post->update();

            // get post content images and save
            $detail = $request->content;
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            //save post content media;
            foreach ($images as $count => $image) {
                $src = $image->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimeType = $groups['mime'];
                    $path = '/yenum/uploads/post-content/'.time() .'/' . uniqid('', true) . '.' . $mimeType;
                    $pathExists = Media::where('path', '=' ,$path)->exists();

                    if (!$pathExists) {
                        $contentMedia = MediaAction::postContent($path, $src, $mimeType, $post->id,' Image for' . $post->title . ' Content Post');
                        $image->removeAttribute('src');
                        $image->setAttribute('src', $contentMedia->url);
                    }
                }
            }
            // save post content
            $post->content = $dom->savehtml();
            $post->update();
            // add tags to post
            if ($request->tags) {
                $post->tags()->attach($request->tags);
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
        return view('posts.create')->with('post', $post)
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
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            //code...
            $post = PostAction::update($request, $post->id);
            session()->flash('success', 'Post Updated Successfully');
            //redirect user
            return redirect(route('admin.posts.index'));
        } catch (Exception $e) {
            //Exception $e;
            session()->flash('error', $e->getMessage());
            session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        //flash message
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
