<?php

namespace App\Actions;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class ContactAction
{
    public static function create($request)
    {
        return DB::transaction(function () use ($request) {
            //create Contact;
            $contact = new Contact();

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->project = $request->project;
            $contact->message = $request->message;
            $contact->save();

            return $contact;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $contact = Contact::find($id);

            $contact->name = $request->name ?? $contact->name;
            $contact->email = $request->email ?? $contact->email;
            $contact->project = $request->project ?? $contact->project;
            $contact->message = $request->message ?? $contact->message;
            $contact->save();

            return $contact;
        });
    }

    public static function delete($id)
    {
        return DB::transaction(function () use ($id) {

            $contact = Contact::find($id);
            $contact->delete();
            return $contact;
        });
    }

}
