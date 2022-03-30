<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnonymousMessage;
use App\Query\AnonymousMessageQueries;
use Illuminate\Http\Request;

class AnonymousMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.anonymous.index')->with('messages', AnonymousMessage::orderBy('id', 'DESC')->cursor());
    }

    public function published(AnonymousMessageQueries $anonymousMessageQueries)
    {
        $published = $anonymousMessageQueries->published();
        return view('admin.anonymous.index')->with('messages', $published);
    }

    public function unpublished(AnonymousMessageQueries $anonymousMessageQueries)
    {
        $unpublished = $anonymousMessageQueries->unpublished();
        return view('admin.anonymous.index')->with('messages', $unpublished);
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anonymousMessage = AnonymousMessage::find($id);
        $anonymousMessage->delete();
        session()->flash('success', 'Anonymous Message deleted sucessfully');

        return redirect(route('anonymous-yellow.index'));
    }
}
