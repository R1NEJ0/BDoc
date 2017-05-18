<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoration extends Model
{
    //

    protected $fillable=[
        'like', 'user_id', 'file_id',
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }

}
