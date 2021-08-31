<?php

namespace App\Query;

use App\Models\Media;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class PostQueries
{
    public static function all()
    {
        return Post::cursor();
    }

    public static function find($id)
    {
        return Post::find($id);
    }

    public static function countAll()
    {
        return DB::table('posts')->count();
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
