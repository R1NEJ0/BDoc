@extends('layouts.loged')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Buscar fichero</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="search" method="GET" action="/search">

                            <div class="form-group">

                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" class="form-control" autofocus>
                                </div>
                                <div class="col-md-2">
                                    <select name="type" id="type">
                                        <option value="name" selected>Nombre</option>
                                        <option value="description">Descripción</option>
                                        <option value="tag">Etiqueta</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Buscar
                                    </button>
                                </div>

                            </div>

                        </form>



                    </div>




                <table class="table table-striped">
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Extensión</th>
                        <th>Tamaño</th>

                        <th>Likes</th>
                        <th>Dislikes</th>
                        <th>Acción</th>

                    </tr>


                    @foreach($files as $file)
                        <tr>

                            <td>{{ $file->created_at }}</td>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->fileExtension }}</td>
                            <td>{{ $file->size }}</td>

                            <td>{{ $file->likes }} </td>
                            <td> {{ $file->dislikes }} </td>

                            <td><a href="/file/{{ $file->id }}" class="btn btn-success">Ver</a></td>

                        </tr>
                    @endforeach

                </table>

            </div>
                <div class="text-center">{{ $files->appends($request->only(['name', 'type']))->render() }}</div>

                @if(count($files)==0)
                    <div class="alert alert-danger">
                        No se han encontrado resultados
                    </div>
                @endif

        </div>
    </div>
    </div>
@endsection