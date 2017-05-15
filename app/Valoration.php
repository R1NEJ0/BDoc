<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoration extends Model
{
    //

    protected $fillable=[
        'like',
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }

}
