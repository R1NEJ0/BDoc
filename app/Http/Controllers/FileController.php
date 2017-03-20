<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class FileController extends Controller
{
    //

    public function upload(){
        return view('upload');
    }

    public function uploadFile(Request $request){
        
    }
}
