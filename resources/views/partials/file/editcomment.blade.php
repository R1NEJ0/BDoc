@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar comentario en NOMBRE DE FICHERO</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('#') }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Comentario: </label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="/file" class="btn btn-success">Regresar</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection