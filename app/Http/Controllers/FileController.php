<?php

namespace App\Http\Controllers;

use App\File;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Storage;
use DB;





class FileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

        $usuario = $this->usuarioEliminado($id);

        $file = File::findOrFail($id);

        $sumaLikes = $this->sumaLikes($id);
        $sumaDislikes = $this->sumaDislike($id);
        //$uploader = $this->uploader($id);
        $comentarios = File::find($id)->comments;


       // $file = File::where('id', $id)->first();

        return view('file', compact('file', 'sumaLikes', 'sumaDislikes', 'uploader', 'comentarios', 'usuario'));
    }

    protected function sumaLikes($id)
    {
        $sumaLikes = File::find($id)->valorations->where('like', 1)->count();

        return $sumaLikes;
    }

    protected function sumaDislike($id)
    {
        $sumaDislikes = File::find($id)->valorations->where('like', 0)->count();

        return $sumaDislikes;
    }

    protected function uploader($id){
        $uploader = File::find($id)->user->username;

        return $uploader;
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

    public function destroy($id)
    {


        $file = File::findOrFail($id);


        $file->delete();

        return redirect()->route('home')->with('message', 'El fichero ha sido eliminado');
    }


    public function usuarioEliminado($id)
    {
        $user = File::find($id)->user;

        if ($user == null){
            $eliminado = true;
            return $eliminado;
        }else{
            $eliminado = false;
            return $eliminado;
        }
    }

    public function edit($id){

        $file = File::findOrFail($id);
        return view('partials.file.edit', compact('file'));

    }

    public function update($id){

        $file = File::findOrFail($id);
        $file->fill(Request::all());
        $file->save();
        Session::flash('message', 'Los datos del fichero se han editado correctamente');
        return redirect()->route('file.info', ['id' => $file->id]);

    }


    

}
