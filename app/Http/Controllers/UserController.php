<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\File;
use App\Valoration;
use DB;

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

        $carisma = $this->calculoCarisma($id);

        $user = User::findOrFail($id);

        $tiempo = $this->calculoDias($id);

        $files = $this->files($id);

        return view('home', compact('user', 'tiempo', 'files', 'carisma',
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

        return $difference;

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

        return view('config');

    }

    public function files($id){

        $files = File::all()->where('user_id', $id);

        return $files;

    }







}
