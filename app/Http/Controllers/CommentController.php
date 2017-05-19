<?php

namespace App\Http\Controllers;

use App\Comment;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CommentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    // destruye comentario

    public function destroy($id){

        $comment = Comment::findOrFail($id);

        $comment->delete();
        Session::flash('message', 'El comentario ha sido eliminado');
        return redirect()->route('file.info', ['id' => $comment->file_id]);
    }

    // edita comentario

    public function edit($id){

        $comment = Comment::find($id);
        return view('partials.file.editcomment', compact('comment'));
    }

    // devuelve vista crear comentario

    public function create($id){

        $file = File::findOrFail($id);
        return view('partials.file.newcomment', compact('file'));

    }

    // guarda el comentario

    public function store(Request $request, File $file){


        $comment = new Comment([
            'user_id'=> Auth::id(),
            'comment'=> $request->get('comment'),
            'file_id'=> $file->id,
            'updated_at' => null,
        ]);


        $comment->save();

        return redirect()->route('file.info', ['id' => $comment->file_id])->with('message', 'El comentario ha sido añadido');
    }

    // acutaliza el comentario

    public function update($id){

        $comment = Comment::findOrFail($id);
        $comment->fill(Request::all());
        $comment->save();
        Session::flash('message', 'El comentario ha sido editado');
        return redirect()->route('file.info', ['id' => $comment->file_id]);

    }


}
