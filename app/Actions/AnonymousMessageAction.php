<?php

namespace App\Actions;

use App\Models\AnonymousMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AnonymousMessageAction
{
    public static function create($request)
    {
        return DB::transaction(function () use ($request) {
            $anonymousMessage = new AnonymousMessage();
            $anonymousMessage->published = 0;
            $anonymousMessage->content = $request['text'];
            $anonymousMessage->save();

            return $anonymousMessage;
        });
    }

    public static function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $anonymousMessage = AnonymousMessage::find($id);

            $anonymousMessage->published = $request->published ?? $anonymousMessage->published;
            $anonymousMessage->content = $request->content ?? $anonymousMessage->content;
            $anonymousMessage->update();

            return $anonymousMessage;
        });
    }

    public static function publish($id)
    {
        return DB::transaction(function () use ($id) {

            $anonymousMessage = AnonymousMessage::find($id);

            $anonymousMessage->published = AnonymousMessage::PUBLISHED;
            $anonymousMessage->update();

            return $anonymousMessage;
        });
    }

    public static function delete($id)
    {
        return DB::transaction(function () use ($id) {

            $anonymousMessage = AnonymousMessage::find($id);
            $anonymousMessage->delete();
            return $anonymousMessage;
        });
    }
}
