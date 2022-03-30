<?php

namespace App\Query;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class ContactQueries
{
    public static function all()
    {
        return Contact::all();
    }

    public static function find($id)
    {
        return Contact::find($id);
    }
}
