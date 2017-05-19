<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Storage;
use DB;
use App\User;





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

    // Suma de likes de todos los ficheros del usuario

    protected function sumaLikes($id)
    {
        $sumaLikes = File::find($id)->valorations->where('like', 1)->count();

        return $sumaLikes;
    }

    // Suma de dislikes de todos los ficheros del usuario

    protected function sumaDislike($id)
    {
        $sumaDislikes = File::find($id)->valorations->where('like', 0)->count();

        return $sumaDislikes;
    }

    // devuelve el uploader

    protected function uploader($id){
        $uploader = File::find($id)->user->username;

        return $uploader;
    }

    // devuelve la vista de upload

    public function upload()
    {
        return view('upload');
    }

    // devuelve el tamaño del fichero

    private function sizeFile($request){

        $file = $request->file('file');

        $size = round($file->getClientSize()/1048576,2);

        return $size;
    }

    // devuelve el nombre real del fichero

    private function fileName($request){

        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        return $fileName;
    }

    // devuelve la extensión real del fichero

    private function extensionFile($request){

        $file = $request->file('file');

        $extension = $file->guessClientExtension();

        return $extension;
    }

    // le da nombre al thumbnail, no se usa solo para la integridad de la bd.

    private function thumbnailName($request){

        $name = $request->file('thumbnail')
                        ->getClientOriginalName();

        $name = str_replace(' ', '_', $name);

        return 'th_'. time() . '_' . $name;

    }

    // devuelve el id del usuario que ha subido x fichero

    private function getUserID(){
        $user = Auth::user()->id;

        return $user;
    }

    // devuelve la ruta donde se guardará el thumbnail

    private function getIMGPath(){
        $IMGPath = $this->getUserID() . '/th';

        return $IMGPath;
    }

    // devuelve la ruta donde se guardará el fichero

    private function getFilePath(){
        $FilePath = $this->getUserID() . '/files';

        return $FilePath;
    }

    // no se usa

    private function thumbnail($request){

        $file = $request->file('thumbnail');

        //store

        $thumbnail = 'th' . '_' . time() . '.' . $file->guessClientExtension();



        return $thumbnail;
    }

    // no se usa

    private function getFileName($request){

        $file = $request->file('file');

        return $file->name;
    }

    // guarda el thumbnail

    public function storeThumbnail($request){

        $this->validate($request, [
            'thumbnail' => 'required|image'
        ]);

        $img = $request->file('thumbnail')
            ->store($this->getIMGPath());

        return $img;

        //Storage::disk('file')->put($this->thumbnailName(), file_get_contents($img->getRealPath() ) );


    }

    // guarda el fichero

    public function storeFile($request){

        $this->validate($request, [
            'file' => 'required'
        ]);

        $file = $request->file('file')
            ->store($this->getFilePath());

        return $file;
    }

    // acción del post en la vista upload

    public function uploadFile(Request $request)
    {

        $file = new File();

        $file->name = $request->name;

        $file->size = $this->sizeFile($request);

        $file->fileName = $this->fileName($request);

        $file->fileExtension = $this->extensionFile($request);

        $file->description = $request->input('description');

        $file->keywords = $request->input('keywords');

        $file->url = $this->storeFile($request);

        $file->user_id = Auth::user()->id;

        $file->thumbnailName = $this->thumbnailName($request);

        $file->thumbnailURL = $this->storeThumbnail($request);


        $file->save();

        Session::flash('message', 'El fichero se ha subido correctamente');
        return redirect()->route('home');



        


    }

    // elimina el fichero

    public function destroy($id)
    {


        $file = File::findOrFail($id);


        $file->delete();

        return redirect()->route('home')->with('message', 'El fichero ha sido eliminado');
    }

    // devuelve true si el usuario se ha eliminado y false si sigue activo

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

    // devuelve la vista para editar fichero

    public function edit($id){

        $file = File::findOrFail($id);
        return view('partials.file.edit', compact('file'));

    }

    // obtiene el ID del usuario que ha subido el fichero

    public function getUserFileID($fileID){

        $owner = File::find($fileID)->user->id;
        return $owner;

    }

    // obtiene el path de actualización del thumbnail

    private function getThumbnailPath($fileID){

        $path = $this->getUserFileID($fileID) . '/th';

        return $path;
    }

    // actualiza el thumbnail del fichero

    private function updateThumb($request, $fileID)
    {

        if ($request->thumbnail != null) {

            $this->validate($request, [
                'avatar' => 'image'
            ]);

            $img = $request->file('thumbnail')->store($this->getThumbnailPath($fileID));

            return $img;

        } else {
            $oldThumbnail = File::find($fileID)->thumbnailURL;
            return $oldThumbnail;
        }
    }

    // actualiza el fichero -> trabajando

    public function update(Request $request, $id){





            $file = File::findOrFail($id);

            $file->thumbnailURL      =   $this->updateThumb($request, $id);
            $file->name              =   $request->name;
            $file->keywords          =   $request->keywords;
            $file->description       =   $request->description;





        // thumbnail
        // nombre
        // Tags
        // Descripción


        $file->save();
        Session::flash('message', 'Los datos del fichero se han editado correctamente');
        return redirect()->route('file.info', ['id' => $file->id]);

    }

    // devuelve la vista de búsqueda y manda a scope una búsqueda

    public function search(Request $request){

       $files = File::name($request->get('name'), $request->get('type'))->orderBy('created_at', 'DESC')->paginate();

      // dd($files);

        return view('search', compact('files', 'request'));

    }


}
