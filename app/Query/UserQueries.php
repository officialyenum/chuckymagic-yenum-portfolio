<?php

namespace App\Query;

use App\Models\Media;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class UserQueries
{
    public static function all()
    {
        return User::latest()->paginate(50);
        // return DB::table('users')->get();
    }

    public static function administrators()
    {
        return User::latest()
            ->where('role_id', User::ROLE_SUPERADMIN)
            ->orWhere('role_id', User::ROLE_ADMIN)
            ->get();
    }

    public static function writers()
    {
        return User::latest()
            ->where('role_id', User::ROLE_WRITER)
            ->paginate(50);
    }

    public static function guests()
    {
        return User::latest()
            ->where('role_id', User::ROLE_USER)
            ->paginate(50);
    }

    public static function trashed()
    {
        return User::onlyTrashed()->get();
    }

    public static function getOne($id)
    {
        return User::find($id);
    }

    public static function roles()
    {
        return Role::cursor();
    }

    public static function countAll()
    {
        return DB::table('users')->count();
    }

    public static function todayViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereDay('created_at',Carbon::today());
                    })
                    ->sum('count');
    }

    public static function weekViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereBetween('created_at',[ Carbon::now()->subWeek(1), Carbon::now()]);
                    })
                    ->sum('count');
    }

    public static function monthViews($id)
    {
        return DB::table('views')
                    ->where('post_id',$id)
                    ->where(function ($query) {
                        $query->whereMonth('created_at',Carbon::now()->month());
                    })
                    ->sum('count');
    }
}
