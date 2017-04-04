<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function files()
    {

        return $this->hasMany('App\File');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getLastAttribute()
    {
        $lastFile = $this->files()->orderBy('created_at', 'desc')->first();

        if (is_null($lastFile)) {

            $lastFile = [
                'created_at' => 'Sin fichero aún'
            ];

            return $lastFile['created_at'];
        } else {

            $createdAt = Carbon::parse($lastFile['created_at']);

            return $createdAt->format('d M Y');
        }
    }

}
