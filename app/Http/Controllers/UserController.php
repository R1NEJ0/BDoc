<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
Use Carbon\Carbon;
Use App\File;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function userIndex($id)
    {


        $user = User::findOrFail($id);

        $tiempo = $this->calculoDias($id);

        $files = $this->files($id);

        return view('home', compact('user', 'tiempo', 'files'));
    }

    protected function calculoDias($id)
    {


        $raw= File::select('created_at')->where('user_id', $id)->orderBy('created_at', 'desc')->get()->take(1);

        $array = $raw->toArray();

        $cDate = Carbon::parse($array[0]['created_at']);

        $cToday = Carbon::now();

        $lastFileinDays = $cDate->diffInDays($cToday);

        $difference = 28 - $lastFileinDays;

        return $difference;





    }


    public function edit($id){
        $user = User::findOrFail(Auth::user()->id);

        return view('partials.user.userconfig', compact('user'));



    }


    public function search(){
        return view('search');
    }


    public function config(){

        return view('config');

    }

    public function files($id){

        $files = File::all()->where('user_id', $id);

        return $files;



    }



}
