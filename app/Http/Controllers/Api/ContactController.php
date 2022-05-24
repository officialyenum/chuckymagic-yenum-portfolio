<?php

namespace App\Http\Controllers\Api;

use App\Actions\ContactAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Mail\MessageMe;
use App\Models\Contact;
use App\Query\ContactQueries;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactQueries $contactqueries)
    {
        try {
            $contacts = $contactqueries->all();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully Retrieved',
                'data' => ContactResource::collection($contacts)
            ], 200);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 400);
        }
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
    public function store(Request $request, ContactAction $contactAction)
    {
        try {
            $data = $contactAction->create($request);
            if ($data) {
                Mail::to("oponechukwuyenum@gmail.com")->send(new MessageMe($data));
                return response()->json([
                    'status' => 'success',
                    'message' => 'Sent Successfully',
                    'data' => new ContactResource($data)
                ], 200);
            }else{
                throw new Exception("Error Processing Request", 1);
            }
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 500);
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
    public function destroy($id, ContactAction $contactAction)
    {
        try {
            $data = $contactAction->delete($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Deleted Successfully',
                'data' => new ContactResource($data)
            ], 200);
        } catch (Exception $err) {
            return response()->json(['status' => 'error', 'message' => $err], 500);
        }
    }
}
