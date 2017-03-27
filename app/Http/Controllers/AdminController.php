<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $users = User::paginate(10);
        return view('admin.dashboard', [
            'users' => $users
        ]);

    }

    public function edit(){

    }


}
