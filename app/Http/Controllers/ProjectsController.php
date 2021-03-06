<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Projects\CreateProjectRequest;
use App\Http\Requests\Projects\UpdateProjectRequest;
use App\Language;
use App\Project;
use App\SubCategory;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::orderBy('id', 'DESC')->paginate(10))
            ->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create')
            ->with('categories', Category::all())
            ->with('subcategories', SubCategory::all())
            ->with('tags', Tag::all())
            ->with('languages', Language::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        //dd($request->file('image')->store('projects'));
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('projects', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'projects',
            's3'
        );
        //dd(Storage::disk('s3')->url($image));
        //set Image Visibility private
        //Storage::disk('s3')->setVisibility($image,'private');
        //set Image Visibility public
        //Storage::disk('s3')->setVisibility($image,'public');
        // create the project
        $project = Project::Create([
            'title' => $request->title,
            'description'=> $request->description,
            'project-trixFields' => $request['project-trixFields'],
            'attachment-project-trixFields' => $request['attachment-project-trixFields'],
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'github_url'=> $request->github_url,
            'playstore_url'=> $request->playstore_url,
            'appstore_url'=> $request->appstore_url,
            'web_url'=> $request->web_url,
            'image' => $image,
            'image_url' => Storage::disk('s3')->url($image)
        ]);

        if ($request->sub_categories) {
            $project->subcategories()->attach($request->sub_categories);
        }
        if ($request->tags) {
            $project->tags()->attach($request->tags);
        }
        if ($request->languages) {
            $project->languages()->attach($request->languages);
        }

        // flash the message
        session()->flash('success', 'Project created successfully');

        // redirect the user
        return redirect(route('projects.index'));
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
    public function edit(Project $project)
    {
        return view('projects.create')->with('project',$project)
            ->with('categories', Category::all())
            ->with('subcategories', SubCategory::all())
            ->with('tags', Tag::all())
            ->with('languages', Language::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->only([
            'title',
            'description',
            'published_at',
            'project-trixFields',
            'attachment-project-trixFields',
            'github_url',
            'appstore_url',
            'playstore_url',
            'web_url'
        ]);
        //check if new image
        if ($request->hasFile('image')) {
            //if new image upload it
            $image = $request->image->store(
                'projects',
                's3'
            );
            //delete old image
            $project->deleteImage();
            //update image data to be submitted
            $data['image'] = basename($image);
            $data['imageUrl'] = Storage::disk('s3')->url($image);
        }

        if ($request->tags) {
            $project->tags()->sync($request->tags);
        }
        if ($request->sub_categories) {
            $project->subcategories()->sync($request->sub_categories);
        }
        if ($request->languages) {
            $project->languages()->sync($request->languages);
        }

        //update data attributes
        $project->update($data);

        //flash message
        session()->flash('success', 'Post Updated Successfully');

        //redirect user
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::withTrashed()->where('id',$id)->firstOrFail();

        if ($project->trashed())
        {
            $project->deleteImage();
            $project->forceDelete();
        }
        else
        {
            $project->delete();
        }

        session()->flash('success', 'Project deleted successfully');
        return redirect(route('projects.index'));
    }

    /**
     * Display a list of all trashed projects
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Project::onlyTrashed()->get();

        return view('projects.index')->with('projects',$trashed);
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->where('id',$id)->firstOrFail();

        $project->restore();

        session()->flash('success', 'Project restored successfully');
        return redirect(route('projects.index'));
    }
}
