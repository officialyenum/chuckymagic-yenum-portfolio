<?php

namespace App\Action;

use App\Models\Media;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class UserAction
{
    public static function create($request)
    {

        DB::transaction(function ($request) {
            $user = new User;
            $user->username = $request->username;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->role_id = 4;
            $user->password = Hash::make($request->password);
            $user->save();
            return $user;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function ($request, $id) {
            $user = User::find($id);
            $user->username = $request->username ?? $user->username;
            $user->lastname = $request->lastname ?? $user->lastname;
            $user->firstname = $request->firstname ?? $user->firstname;
            $user->status = $request->status ?? $user->status;
            $user->verified = $request->verified ?? $user->verified;
            $user->subscribed = $request->subscribed ?? $user->subscribed;
            $user->dob = $request->dob ?? $user->dob;
            $user->phone = $request->phone ?? $user->phone;
            $user->email = $request->email ?? $user->avatar;
            $user->role_id = 4 ?? $user->role_id;
            $user->password = Hash::make($request->password) ?? $user->password;
            $user->update();
            return $user;
        });
    }

    public static function verify($request, $id)
    {
        return DB::transaction(function ($request, $id) {
            $user = User::find($id);
            $user->verified = $request->verified ?? $user->verified;
            $user->update();
            return $user;
        });
    }

    public static function subscribe($request, $id)
    {
        return DB::transaction(function ($request, $id) {
            $user = User::find($id);
            $user->subscribed = $request->subscribed ?? $user->subscribed;
            $user->update();
            return $user;
        });
    }

    public static function makeUser($id)
    {
        return DB::transaction(function ($id) {
            $user = User::find($id);
            $user->role_id = 3;
            $user->update();
            return $user;
        });
    }

    public static function makeWriter($id)
    {
        return DB::transaction(function ($id) {
            $user = User::find($id);
            $user->role_id = 3;
            $user->update();
            return $user;
        });
    }

    public static function makeAdmin($id)
    {
        return DB::transaction(function ($id) {
            $user = User::find($id);
            $user->role_id = 2;
            $user->update();
            return $user;
        });
    }
}
