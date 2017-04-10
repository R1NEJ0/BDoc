<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class File extends Model
{
    //

    use SoftDeletes;

    protected  $date = ['deleted_at'];

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

    public function getDayUploadedAttribute()
    {
        $dayuploaded = Carbon::parse($this->created_at);

        return $dayuploaded->format('d M Y');
    }

   // public function getUploaderAttribute(){
/*
        $id = $this->id;

        $uploader = DB::table('users')
            ->join('files', 'valorations.file_id', 'files.id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->where('users.id',->get();

    }
*/

}
