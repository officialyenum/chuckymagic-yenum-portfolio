<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;

    const ROLE_SUPERADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_WRITER = 3;
    const ROLE_USER = 4;
    const VERFICATION = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'lastname',
        'firstname',
        'status',
        'verified',
        'verification_token',
        'email',
        'dob',
        'phone',
        'avatar',
        'last_seen',
        'password',
        'bio',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'dob' => 'datetime'
    ];

    protected $table = 'users';
    protected $date = ['deleted_at'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        return $this->role_id == User::ROLE_ADMIN;
    }

    public function isSuperAdmin()
    {
        return $this->role_id == User::ROLE_SUPERADMIN;
    }

    public function isWriter()
    {
        return $this->role_id == User::ROLE_WRITER;
    }

    public function isGuest()
    {
        return $this->role_id == User::ROLE_USER;
    }

    public function isVerified()
    {
        return $this->verified === User::VERFICATION;
    }

    public function isSubscribed()
    {
        return $this->subscribed === User::VERFICATION;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isOnline()
    {
        if (Cache::has('user-is-online' . $this->id)) {
            return true;
        }
        return false;
    }

    public function views()
    {
        return $this->hasMany(View::class, 'user_id');
    }

    public static function generateVerificationCode()
    {
        return Str::random(40);
    }
}
