<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valoration;
use App\File as File;
use Illuminate\Support\Facades\Auth;


class ValorationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    // añade like

    public function like(File $file){

        $valoracion = new Valoration([
            'like' => true,
            'user_id' => Auth::id(),
            'file_id' => $file->id,
        ]);

        $valoracion->save();

        return redirect()->back()->with('message', 'El Like ha sido añadido');

    }

    // añade dislike

    public function dislike(File $file){

        $valoracion = new Valoration([
            'like' => false,
            'user_id' => Auth::id(),
            'file_id' => $file->id,
        ]);

        $valoracion->save();

        return redirect()->back()->with('message', 'El Dislike ha sido añadido');

    }



}
