<?php

namespace App\Query;

use App\Models\AnonymousMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class AnonymousMessageQueries
{
    public static function all()
    {
        return AnonymousMessage::cursor();
    }

    public static function find($id)
    {
        return AnonymousMessage::find($id);
    }

    public static function unpublished()
    {
        return AnonymousMessage::where('published', AnonymousMessage::NOT_PUBLISHED)->get();
    }

    public static function published()
    {
        return AnonymousMessage::where('published', AnonymousMessage::PUBLISHED)->get();
    }
}
