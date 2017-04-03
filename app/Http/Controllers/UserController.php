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


    public function userIndex($id)
    {
       $likes = $this->filesValorations($id)->sum('like');

        $cantidadFicheros = $this->cantidadFicheros($id);

        $mensajes = $this->cantidadMensajes($id);

        $ultimofichero = $this->ultimoFichero($id);

        $carisma = $this->calculoCarisma($id);

        $user = User::findOrFail($id);

        $tiempo = $this->calculoDias($id);

        $files = $this->files($id);

        return view('home', compact('user', 'tiempo', 'files', 'carisma', 'ultimofichero', 'mensajes', 'cantidadFicheros', 'likes'));
    }

    protected function calculoDias($id)
    {



        $raw= File::select('created_at')->where('user_id', $id)->orderBy('created_at', 'desc')->get()->take(1);

        $array = $raw->toArray();

        $cDate = Carbon::parse($array[0]['created_at']);

        $cToday = Carbon::now();

        $lastFileinDays = $cDate->diffInDays($cToday);

        $difference = 28 - $lastFileinDays;

        return $difference;

    }


    public function edit($id){
        $user = User::findOrFail(Auth::user()->id);

        return view('partials.user.userconfig', compact('user'));



    }


    // CalculoCarisma esta mál, la BD el user es quien valora no el valorado.

    protected function calculoCarisma($id)
    {

        $ValorationPerUser = Valoration::where('user_id', $id);

        $totalLikes = $ValorationPerUser->count();

        $sumaLikes = $ValorationPerUser->sum('like');

        $sumaDislikes = $totalLikes - $sumaLikes;

        $DislikesRatio = $sumaDislikes * 0.2;

        $resultado = $sumaLikes - $DislikesRatio;

        return $resultado;

    }

    protected function ultimoFichero($id)
    {
        $ultimoFichero = User::find($id)->files->sortByDesc('created_at')->first()->toArray();

        return $ultimoFichero['name'];
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

    public function filesValorations($id){

        $fileValoration = DB::table('valorations')
                            ->join('files', 'valorations.file_id', '=', 'files.id')
                            ->join('users', 'files.user_id', '=', 'users.id')
                            ->where('users.id', $id)->get();

        // Editar y poner en constructor, mejor ya que vamos a usar esto varias veces.

        $likesum = $fileValoration->sum('like');

        $dislikesum = $fileValoration->count() - $likesum;

        $dislikeratio = $dislikesum * 0.1;

        $charisma = $likesum/10 - $dislikeratio;



        return $fileValoration;



    }



}
