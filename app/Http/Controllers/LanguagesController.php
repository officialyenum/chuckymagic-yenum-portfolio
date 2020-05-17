<?php

namespace App\Http\Controllers;

use App\Http\Requests\Languages\CreateLanguageRequest;
use App\Http\Requests\Languages\UpdateLanguageRequest;
use App\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('languages.index')->with('languages', Language::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLanguageRequest $request)
    {
        dd($request->content);
        // upload the image
        //$extension = $request->image->extension();
        //$image = Storage::putFileAs('projects', $request->image, time().'.'.$extension);
        $image = $request->file('image')->store(
            'projects',
            's3'
        );
        Language::create([
            'image' => $image,
            'name' => $request->name
        ]);

        session()->flash('success', 'Language Created Successfully');

        return redirect(route('languages.index'));
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
    public function edit(Language $language)
    {
        return view('languages.create')->with('language', $language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        //method 1
        //$category->name = $request->name;
        //$category->save();

        //method 2
        $language->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Language Updated Successfully');

        return redirect(route('languages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if ($language->projects->count() > 0) {
            session()->flash('error', 'Language cannot be deleted because it has some projects');

            return redirect()->back();
        }
        $language->delete();

        session()->flash('success', 'Language deleted sucessfully');

        return redirect(route('languages.index'));
    }
}
