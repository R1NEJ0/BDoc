<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        dd($request);
        $file = $request->file('file');

        echo  Auth::user()->id . '_' .  $file->getClientOriginalName();
        echo '<br>';
        echo $file->getClientOriginalExtension();
        echo '<br>';
        echo $file->guessClientExtension();
        echo '<br>';
        echo $size = round($file->getClientSize()/1048576,2) . ' MB';





    }
}
