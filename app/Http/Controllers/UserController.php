<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id){
        $user = User::findOrFail(Auth::user()->id);

        dd($user);

        return view('admin.users.edit', compact('user'));



    }




    public function search(){
        return view('search');
    }


    public function config(){

        return view('config');

    }


}
