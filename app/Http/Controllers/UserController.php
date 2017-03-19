<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
