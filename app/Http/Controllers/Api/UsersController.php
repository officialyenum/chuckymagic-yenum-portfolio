<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Mail\UserCreated;
use App\Models\User;
use App\Query\UserQueries;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserQueries::all();
        $users = UserResource::collection($users);
        return $this->showAll($users, 200);
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
    public function show(User $user)
    {
        return $this->showOne(new UserResource($user), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
    public function update(Request $request, User $user)
    {
        $user->fill($request->only(
            [
                'username',
                'firstname',
                'lastname',
                'email',
            ]
            ));
        if ($user->isClean()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }
        $user->verified = 0;
        $user->remember_token = Str::random(10);
        $user->verification_token = User::generateVerificationCode();
        $user->update();

        return $this->showOne(new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->firstOrFail();

        $user->verified = 1;
        $user->verification_token = null;

        $user->email_verified_at = now();
        $user->remember_token = null;
        $user->save();

        return $this->showMessage( $user->firstname . ' has been verified sucessfully at '. Carbon::parse($user->email_verified_at));
    }

    public function resend(User $user)
    {
        if ($user->isVerified) {
            return $this->errorResponse('This user is already verified', 409);
        }
        retry(5, function() use ($user) {
            Mail::to($user)->send(new UserCreated($user));
        }, 100);

        return $this->showMessage( 'Verification email has been sucessfully resent');
    }
}
