@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar comentario del fichero {{ $comment->file->name }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="PUT" action="/file/comment/update/{{ $comment->id }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="comment" class="col-md-4 control-label">Comentario: </label>
                                <div class="col-md-6">
                                    <textarea name="comment" id="comment" class="form-control" rows="5">{{ $comment->comment }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="/file/comment/delete={{$comment->id}}" class="btn btn-danger">Eliminar</a>

                                    <a href="/file/{{ $comment->file_id }}" class="btn btn-success">Regresar</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection