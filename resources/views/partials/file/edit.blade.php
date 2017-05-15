@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar fichero {{ $file->name }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="PUT" action="/file/update/{{ $file->id }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="thumbnail" class="col-md-4 control-label">Imagen</label>
                                <div class="col-md-6">
                                    <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nombre fichero</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $file->name }}" required autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Tags</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="text" class="form-control" name="keywords" value="{{ $file->keywords }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Descripción</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control" rows="5">{{ $file->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="/file/delete/{{ $file->id }}" class="btn btn-danger">Eliminar</a>
                                    <a href="/file/{{ $file->id }}" class="btn btn-success">Ir a la página del fichero</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection