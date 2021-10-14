<?php

namespace App\Http\Controllers\Api;

use App\Actions\AnonymousMessageAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnonymousMessageResource;
use App\Query\AnonymousMessageQueries;
use Exception;
use Illuminate\Http\Request;

class AnonymousMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnonymousMessageQueries $anonymousMessageQueries)
    {
        $data = $anonymousMessageQueries->unpublished();
        return response()->json([
            'status' => 'success',
            'message' => 'Successful',
            'data' => AnonymousMessageResource::collection($data)
        ], 200);
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
    public function store(Request $request, AnonymousMessageAction $anonymousAction)
    {
        try {
            $data = $anonymousAction->create($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Successful',
                'data' => new AnonymousMessageResource($data)
            ], 200);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 400);
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
    public function update(Request $request, $id, AnonymousMessageAction $anonymousAction)
    {
        try {
            $data = $anonymousAction->update($request, $id);
            return response()->json([
                'status' => 'success',
                'message' => 'Successful',
                'data' => new AnonymousMessageResource($data)
            ], 200);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 400);
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
        //
    }

    public function publish($id, AnonymousMessageAction $anonymousAction)
    {
        try {
            $data = $anonymousAction->publish($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully Published',
                'data' => new AnonymousMessageResource($data)
            ], 200);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 400);
        }
    }
}
