<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $fillable = [
      'name', 'description', 'keywords',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function valorations()
    {
        return $this->hasMany('App\Valoration');
    }
}
