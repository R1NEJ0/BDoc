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


    public function sortByUsername(){
        $users = User::orderBy('username')->paginate(10);
        return view('admin.dashboard', [
            'users' => $users
        ]);
    }

    public function sortByCharisma(){

    }

    public function sortByLastUpdate(){

    }

    public function sortByEmail(){
        $users = User::orderBy('email')->paginate(10);
        return view('admin.dashboard', [
            'users' => $users
        ]);
    }

    public function edit($id){

        $user = User::find($id);

        return view('admin.partials.useredit')->with('user', $user);

    }




}
