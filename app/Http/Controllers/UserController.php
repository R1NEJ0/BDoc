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

    public function upload(){
        return view('upload');
    }

    public function search(){
        return view('search');
    }

    public function dashboard(){

        if (Auth::user()->role == 'admin'){
            return view('dashboard');
        }else{
            return view('home');
        }


    }

}
