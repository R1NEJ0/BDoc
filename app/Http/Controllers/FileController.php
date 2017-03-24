<?php

namespace App\Http\Controllers;

use App\File;
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

    private function sizeFile($request){

        $file = $request->file('file');

        $size = round($file->getClientSize()/1048576,2);

        return $size;
    }

    private function fileName($request){

        $file = $request->file('file');



        $fileName = time() . '_' . $file->getClientOriginalName();

        return $fileName;
    }

    private function extensionFile($request){

        $file = $request->file('file');

        $extension = $file->guessClientExtension();

        return $extension;
    }

    private function thumbnail($request){

        $file = $request->file('thumbnail');

        //store

        $thumbnail = 'th' . '_' . time();



        return $thumbnail;
    }



    public function uploadFile(Request $request)
    {

        $file = new File();

        $file->name = $request->name;

        $file->size = $this->sizeFile($request);

        $file->fileName = $this->fileName($request);

        $file->fileExtension = $this->extensionFile($request);

        $file->description = $request->input('description');

        $file->keywords = $request->input('keywords');

        $file->url = ' ';

        $file->user_id = Auth::user()->id;

        $file->avatar = $this->thumbnail($request);

        $file->save();

        


    }
}
