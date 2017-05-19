<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::paginate(10);



        return view('admin.dashboard', compact(
            'users'
        ));

    }

    // calcula el carisma y lo devuelve

    protected function calculoCarisma($id)
    {

        $fileValoration = DB::table('valorations')
            ->join('files', 'valorations.file_id', '=', 'files.id')
            ->join('users', 'files.user_id', '=', 'users.id')
            ->where('users.id', $id)->get();

        // Editar y poner en constructor, mejor ya que vamos a usar esto varias veces.

        $likesum = $fileValoration->sum('like');

        $dislikesum = $fileValoration->count() - $likesum;

        $dislikeratio = $dislikesum * 0.2;

        $charisma = $likesum - $dislikeratio;

        return $charisma;


    }

    // ordena por usuario

    public function sortByUsername(){
        $users = User::orderBy('username')->paginate(10);
        return view('admin.dashboard', [
            'users' => $users
        ]);
    }

    // ordena por carisma

    public function sortByCharisma(){

    }

    // ordena por ultima actualizacion

    public function sortByLastUpdate(){

    }

    // ordena por email

    public function sortByEmail(){
        $users = User::orderBy('email')->paginate(10);
        return view('admin.dashboard', [
            'users' => $users
        ]);
    }

    // devuelve vista edit

    public function edit($id){

        $user = User::find($id);

        return view('admin.partials.useredit')->with('user', $user);

    }

    // destruye user

    public function destroy($id){

        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('message', 'El usuario ha sido eliminado');
        return redirect()->route('admin.panel')->with('message', 'El Usuario ha sido eliminado');

    }

    // obtiene user

    public function getUserID($id){

        $user = User::findOrFail($id);
        return $user;

    }

    // valida campo email

    private function updateEmail($request, $id){

        if ($request->email != null){

            $this->validate($request,[
                'email' => 'email',
            ]);

            $email = $request->email;
            return $email;
        }else{

            $email = User::find($this->getUserID($id))->email;
            return $email;
        }

    }

    // valida campo rol

    private function updateRol($request, $id){

        if ($request->role != null){
            $rol = $request->role;
            return $rol;
        }else{
            $rol = User::find($this->getUserID($id))->role;
            return $rol;

        }
    }

    // valida campo pass

    private function updatePass($request, $id){

         if ($request->password != null && $request->password == $request->password_confirmation){
            $this->validate($request, [
                'password' => 'min:6'
            ]);
            $newPass = bcrypt($request->password);
            return $newPass;
        }else{
            $oldPass = $id->password;

            return $oldPass;
        }

    }

    // actualiza usuario

    public function update(Request $request, $id){

        $usuario = $this->getUserID($id);

        $usuario->email     =   $this->updateEmail($request,$usuario );
        $usuario->role         =   $this->updateRol($request, $usuario);
        $usuario->password     =   $this->updatePass($request, $usuario);

        $usuario->save();
        return redirect()->route('admin.panel')->with('message', 'Usuario actualizado');








    }




}
