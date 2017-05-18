<?php

namespace App\Http\Controllers;


use App\User;



use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\File;
use DB;
use Illuminate\Support\Facades\Redirect;
use Storage;



class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function Index()
    {


        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        $tiempo = $this->calculoDias($id);

        $files = $this->files($id);

        return view('home', compact('user', 'tiempo', 'files', 'mensajes'));
    }

    public function getUserIndex($id)
    {

        //$ultimofichero = $this->ultimoFichero($id);



        $user = User::findOrFail($id);

        $tiempo = $this->calculoDias($id);

        $files = $this->files($id);

        return view('home', compact('user', 'tiempo', 'files',
                                     'mensajes'));
    }

    protected function calculoDias($id)
    {

        //$raw= File::select('created_at')->where('user_id', $id)->orderBy('created_at', 'desc')->get()->take(1);

        $raw = File::all()->where('user_id', $id)->sortByDesc('created_at')->first();


        if (is_null($raw)){

            $noFile = User::find($id);

            $raw = $noFile;

        }else{

             $raw;
        }

        $cToday = Carbon::now();

        $lastFileinDays = $raw->created_at->diffInDays($cToday);

        $difference = 28 - $lastFileinDays;

        // cambio esto para que muestre solamente los días desde que se subió el último fichero

        return $lastFileinDays;

    }

    public function edit($id){
        $user = User::findOrFail(Auth::user()->id);

        return view('partials.user.userconfig', compact('user'));



    }

    protected function cantidadMensajes($id)
    {
        $mensajes = User::find($id)->comments->count();

        return $mensajes;
    }

    protected function cantidadFicheros($id)
    {
        $ficheros = User::find($id)->files->count();

        return $ficheros;

    }

    public function search(){
        return view('search');
    }

    public function config(){

        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('config', compact('user'));

    }

    public function files($id){

        $files = File::all()->where('user_id', $id);

        return $files;

    }

    public function destroy(){

        $id = Auth::id();
        $user = User::findOrFail($id);

        $user->delete();
        return Redirect::back();
    }


    private function getUserID()
    {
        $user = Auth::user()->id;

        return $user;
    }

    private function getAvatarPath(){
        $IMGPath = $this->getUserID() . '/avatar';

        return $IMGPath;
    }

    private function extensionFile($request){

        $file = $request->file('avatar');

        $extension = $file->guessClientExtension();

        return $extension;
    }

    private function updateAvatar($request){

        if ($request->avatar != null){

            $this->validate($request, [
                'avatar' => 'image'
            ]);

            $img = $request->file('avatar')
                // Nombre personalizado con id de user
                //->storeAs($this->getAvatarPath(), $this->getUserID() . "." . $this->extensionFile($request));
                ->store($this->getAvatarPath());
            return $img;

        }else{
            $userAvatar = User::find($this->getUserID())->urlAvatar;
            return $userAvatar;
        }

    }

    private function updateEmail($request){

        if ($request->email != null){

            $this->validate($request,[
                'email' => 'email',
            ]);

            $email = $request->email;
            return $email;
        }else{

            $email = User::find($this->getUserID())->email;
            return $email;
        }

    }

    private function updatePass($request){

        if ($request->password == null || $request->password != $request->password_confirmation ){
            $oldPass = User::find($this->getUserID())->password;
            return $oldPass;
        }else{
            $this->validate($request, [
                'password' => 'min:6'
            ]);
            $newPass = bcrypt($request->password);
            return $newPass;
        }
    }


    public function update(Request $request){

        $user = User::find($this->getUserID());

        $user->email        =   $email = $this->updateEmail($request);
        $user->urlAvatar    =   $avatar = $this->updateAvatar($request);
        $user->role         =   $user->role;
        $user->password     =   $pass = $this->updatePass($request);

        $user->save();
        return redirect()->route('config');

    }









}
