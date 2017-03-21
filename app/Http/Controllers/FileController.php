<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class FileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload()
    {
        return view('upload');
    }


    public function uploadFile(Request $request)
    {
        $file = $request->file('file');


        dd($file);




    }
}
