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

    public function scopeTag($query, $tag){

    $query->where('keywords', "LIKE", '%'.$tag.'%');

    }

    public function scopeDescription($query, $description){

    $query->where('description',"LIKE", '%'.$description.'%');

    }

    /*
     *  Esto busca cosas por el select de la vista search.
     */

    public function scopeName($query, $name, $type){


        switch ($type){
            case "name":
                $query->where('name', "LIKE", '%'.$name.'%');
                break;
            case "description":
                $query->where('description', "LIKE", '%'.$name.'%');
                break;
            case "tag":
                $query->where('keywords', "LIKE", '%'.$name.'%');
                break;
        }

    }

    public function getLikesAttribute(){

        $id = $this->id;

        $sumaLikes = File::find($id)->valorations->where('like', 1)->count();

        return $sumaLikes;
    }

    public function getDislikesAttribute(){

        $id = $this->id;

        $sumadisLikes = File::find($id)->valorations->where('like', 0)->count();

        return $sumadisLikes;

    }

}
