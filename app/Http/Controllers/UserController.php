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

    public function edit($id){
        $user = User::findOrFail(Auth::user()->id);

        return view('partials.user.userconfig', compact('user'));



    }

    public function dateCreated()
    {

    }



    public function search(){
        return view('search');
    }


    public function config(){

        return view('config');

    }

    public function lists(){

        $user = Auth::user()->id;

        $files = File::all()->where('user_id', $user);

        return view('partials.file.fileinfo');



    }


}
