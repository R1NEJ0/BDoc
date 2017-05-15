<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = [
      'user_id', 'comment', 'file_id',
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function getUsernameAttribute()
    {
        $nombreUsuario = $this->user->username;

        return $nombreUsuario;
    }
}
