<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;


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

    private function thumbnailName($request){

        $name = $request->file('thumbnail')
                        ->getClientOriginalName();

        $name = str_replace(' ', '_', $name);

        return 'th_'. time() . '_' . $name;

    }

    private function getUserID(){
        $user = Auth::user()->id;

        return $user;
    }

    private function getIMGPath(){
        $IMGPath = $this->getUserID() . '/th';

        return $IMGPath;
    }

    private function thumbnail($request){

        $file = $request->file('thumbnail');

        //store



        $thumbnail = 'th' . '_' . time() . '.' . $file->guessClientExtension();



        return $thumbnail;
    }

    private function getFileName($request){

        $file = $request->file('file');

        return $file->name;
    }

    public function storeFile($request){

        $this->validate($request, [
            'thumbnail' => 'required|image'
        ]);

        $img = $request->file('thumbnail')
            ->store($this->getIMGPath());

        return $img;

        //Storage::disk('file')->put($this->thumbnailName(), file_get_contents($img->getRealPath() ) );



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

        $file->thumbnailName = $this->thumbnailName($request);

        $file->thumbnailURL = $this->thumbnailName($request);

        $this->storeFile($request);

        $file->save();

        


    }


}
