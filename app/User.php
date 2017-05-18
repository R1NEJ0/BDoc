<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $date = ['deleted_at'];

    protected $fillable = [
        'username', 'email', 'password', 'role', 'urlAvatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relaciones //

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

    // Atributos propios //

    public function getLastAttribute()
    {
        $lastFile = $this->files()->orderBy('created_at', 'desc')->first();

        if (is_null($lastFile)) {

            $lastFile = [
                'created_at' => 'Sin ficheros aún'
            ];

            return $lastFile['created_at'];
        } else {

            $createdAt = Carbon::parse($lastFile['created_at']);

            return $createdAt->format('d M Y');
        }
    }

    public function getLastFileNameAttribute()
    {
        $lastFileName = $this->files()->orderBy('created_at', 'desc')->first();

        if (is_null($lastFileName)){

            $lastFileName = [
                'name' => 'El usuario aún no ha subido ningún fichero'
            ];

            return $lastFileName['name'];
        }else{
            return $lastFileName['name'];

        }
    }

    public function getCreatedDateAttribute(){

        $userCreated = Carbon::parse($this->created_at);

        return $userCreated->format('d M Y');
    }

    public function getCharismaAttribute(){

        $id = $this->id;

        $fileValoration = DB::table('valorations')
            ->join('files', 'valorations.file_id', '=', 'files.id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->where('users.id', $id)->get();

        $likesum = $fileValoration->sum('like');

        $dislikesum = $fileValoration->count() - $likesum;

        $dislikeratio = $dislikesum * 0.2;

        $charisma = $likesum - $dislikeratio;

        return $charisma;

    }





}
