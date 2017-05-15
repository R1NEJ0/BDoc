@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Crear comentario en {{ $file->name }}</div>
                <div class="panel-body">

                    <form action="/file/comment/store={{ $file->id }}" method="POST" role="form" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="comment" class="col-md-4 control-label">Comentario:</label>
                            <div class="col-md-6">
                                <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                                <a href="/file/{{ $file->id }}" class="btn btn-success">Ir a la página del fichero</a>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

@endsection

