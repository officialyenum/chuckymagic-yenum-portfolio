<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $onlineCount = 0;
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $onlineCount = $onlineCount + 1;
            }
        }
        return view('admin.users.index', compact('users','onlineCount'));
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
        $user = User::withTrashed()->where('id',$id)->firstOrFail();

        if ($user->trashed())
        {
            // $user->deleteImage();
            $user->forceDelete();
        }
        else
        {
            $user->delete();
        }

        session()->flash('success', 'User deleted successfully');
        return redirect()->route('users.index');
    }



    /**
     * Show user online status.
     */
    public function status()
    {
        $users = User::all();

        foreach ($users as $user) {

            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
            else {
                if ($user->last_seen != null) {
                    echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
                } else {
                    echo $user->name . " is offline. Last seen: No data ";
                }
            }
        }
    }

    /**
     * Live status page.
     */
    public function liveStatusPage()
    {
        $users = \App\Models\User::all();
        return view('live', compact('users'));
    }

    /**
     * Live status.
     */
    public function liveStatus($user_id)
    {
        // get user data
        $user = User::find($user_id);

        // check online status
        if (Cache::has('user-is-online-' . $user->id))
            $status = 'Online';
        else
            $status = 'Offline';

        // check last seen
        if ($user->last_seen != null)
            $last_seen = "Active " . Carbon::parse($user->last_seen)->diffForHumans();
        else
            $last_seen = "No data";

        // response
        return response()->json([
            'status' => $status,
            'last_seen' => $last_seen,
        ]);
    }

    public function makeWriter(User $user)
    {
        $user->role_id = 3;
        $user->save();
        session()->flash('success','User made Admin Successfully');
        return redirect()->route('users.index');
    }

    public function makeAdmin(User $user)
    {
        $user->role_id = 2;
        $user->save();
        session()->flash('success','User made Admin Successfully');
        return redirect()->route('users.index');
    }

    public function makeSuperAdmin(User $user)
    {
        $user->role_id = 1;
        $user->save();
        session()->flash('success','User made Admin Successfully');
        return redirect()->route('users.index');

    }

    public function removeWriter(User $user)
    {
        $user->role_id = 4;
        $user->save();
        session()->flash('success','User made Admin Successfully');
        return redirect()->route('users.index');
    }

    public function removeAdmin(User $user)
    {
        $user->role_id = 3;
        $user->save();
        session()->flash('success','User Admin priviledge Successfully removed');
        return redirect()->route('users.index');
    }

    public function removeSuperAdmin(User $user)
    {
        if ($user->id == 1) {
            session()->flash('success',"You don\'t remove God, Yenum is supreme here");
            return redirect()->route('users.index');
        }
        $user->role_id = 2;
        $user->save();
        session()->flash('success','User Super Admin priviledge Successfully removed');
        return redirect()->route('users.index');

    }
}
